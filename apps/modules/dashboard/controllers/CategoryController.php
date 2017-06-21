<?php
namespace Modules\Dashboard\Controllers;

use Modules\Models\CdCategory;
use Modules\Models\CdSubcategory;

class CategoryController extends ControllerBase{
    public function indexAction(){
        $category = new CdCategory();
        $this->view->setVar("categories",$category->find());
    }
    public function newAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            $name_category = $request->getPost("name_category");
            $category = new CdCategory();
            $category->setNameCategory(ucfirst($name_category));
            if($category->save()){
                $this->categoryJson();
                $result = array("id"=>$category->getCgid(),"name"=>$category->getNameCategory());
                $this->response(array("message"=>"SUCCESS","code"=>200,"result"=>$result),200);
            }else{
                $this->response(array("message"=>"error try again","code"=>"404"),200);
            }
        }else{exit();}
    }
    public function editAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            $name_category = $request->getPost("name_category");
            $id = $request->getPost("id");
            $category = CdCategory::findFirst($id);
            $category->setNameCategory(ucfirst($name_category));
            if($category->update()){
                $this->categoryJson();
                $result = array("id"=>$category->getCgid(),"name"=>$category->getNameCategory());
                $this->response(array("message"=>"SUCCESS","code"=>200,"result"=>$result),200);
            }else{
                $this->response(array("message"=>"error try again","code"=>"404"),200);
            }
        }else{exit();}
    }
    public function deleteAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth){
            $id = $request->getPost("id");
            $category = CdCategory::findFirst($id);
            if($category->delete()){
                $this->categoryJson();
                $this->response(array("message"=>"SUCCESS","code"=>200),200);
            }else{
                $this->response(array("message"=>"Error","code"=>404),200);
            }
        }else{
            $this->response(array("message"=>"Error","code"=>404),200);
        }
    }
    public function subcategoryAction(){
        $auth = $this->auth();
        if($auth){
            $request = $this->request;
            $cgid =$request->get("id");
            $category = $request->get("ctg");
            $sub = CdSubcategory::find("cgid=$cgid");
            $this->view->setVar("subcategories",$sub);
            $this->view->setVar("params",array($cgid,$category));
        }else{
            exit();
        }
    }
    public function newSubcategoryAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            $subcategory = $request->getPost("subcategoryname");
            $cgid = $request->getPost("cgid");
            $category = new CdSubcategory();
            $category->setSubcategoryname(ucfirst($subcategory))->setCgid($cgid);
            if($category->save()){
                $this->subCategoryJson();
                $result = array("id"=>$category->getScid(),"name"=>$category->getSubcategoryname());
                $this->response(array("message"=>"SUCCESS","code"=>200,"result"=>$result),200);
            }else{
                $this->response(array("message"=>"error try again","code"=>"404"),200);
            }
        }else{exit();}
    }
    public function editSubcategoryAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth ){
            $name_category = $request->getPost("subcategoryname");
            $id = $request->getPost("id");
            $category = CdSubcategory::findFirst($id);
            $category->setSubcategoryname(ucfirst($name_category));
            if($category->update()){
                $this->subCategoryJson();
                $result = array("id"=>$category->getScid(),"name"=>$category->getSubcategoryname());
                $this->response(array("message"=>"SUCCESS","code"=>200,"result"=>$result),200);
            }else{
                $this->response(array("message"=>"error try again","code"=>"404"),200);
            }
        }else{exit();}
    }
    public function deleteSubcategoryAction(){
        $auth = $this->auth();
        $request = $this->request;
        if($request->isPost() && $request->isAjax() && $auth){
            $id = $request->getPost("id");
            $subcategory = CdSubcategory::findFirst($id);
            if($subcategory->delete()){
                $this->subCategoryJson();
                $this->response(array("message"=>"SUCCESS","code"=>200),200);
            }else{
                $this->response(array("message"=>"Error","code"=>404),200);
            }
        }else{
            $this->response(array("message"=>"Error","code"=>404),200);
        }
    }
    public function validateCategoryAction(){
        $request = $this->request;
        if($request->isPost() && $request->isAjax()){
            $name_category = $this->request->getPost("name_category");
            $category = CdCategory::findFirst("name_category='$name_category'");
            if($category==null){
                $this->response(array('valid' => true),200);
            }
            elseif($category!=null){
                $this->response(array('valid' => false),200);
            }
            else{
                $this->response(array("message"=>"error try again","code"=>"404"),404);
            }
        }
    }
    public function validateSubcategoryAction(){
        $request = $this->request;
        if($request->isPost() && $request->isAjax()){
            $subcategoryname = $this->request->getPost("subcategoryname");
            $cgid = $this->request->getPost("id");
            $category = CdSubcategory::findFirst("subcategoryname='$subcategoryname' and cgid=$cgid");
            if($category==null){
                $this->response(array('valid' => true),200);
            }
            elseif($category!=null){
                $this->response(array('valid' => false),200);
            }
            else{
                $this->response(array("message"=>"error try again","code"=>"404"),404);
            }
        }
    }
    private function categoryJson(){
        $json = dirname(dirname(dirname(dirname(__DIR__))))."/public/json/category.json";
        $file = fopen($json,"wb");
        $category = new CdCategory();
        $find = $category->find();
        $content = array();
        foreach($find as  $values){
            $content[$values->getCgid()]=$values->getNameCategory();
        }
        $category_json = json_encode($content);
        fwrite($file,$category_json);
        fclose($file);
    }
    private function subCategoryJson(){
        $json = dirname(dirname(dirname(dirname(__DIR__))))."/public/json/subCategory.json";
        $file = fopen($json,"wb");
        $subCategory = new CdSubcategory();
        $find = $subCategory->find();
        $content = array();
        foreach($find as $values){
            $content[$values->getScid()][$values->getCgid()]=$values->getSubcategoryname();
        }
        $subCategory_json = json_encode($content);
        fwrite($file,$subCategory_json);
        fclose($file);
    }
}
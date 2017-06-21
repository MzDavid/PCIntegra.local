<?php
namespace Modules\Models;
class CdCareers extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $crid;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $permalink;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    protected $code;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $information;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $question;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $plan;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    protected $video;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    protected $image;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $date_creation;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $uid;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $status;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $type;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    protected $order_crid;

    /**
     *
     * @var integer
     * @Column(type="string", nullable=false)
     */
    protected $category;

    /**
     * Method to set the value of field crid
     *
     * @param integer $crid
     * @return $this
     */
    public function setCrid($crid)
    {
        $this->crid = $crid;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field permalink
     *
     * @param string $permalink
     * @return $this
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;

        return $this;
    }

    /**
     * Method to set the value of field code
     *
     * @param string $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Method to set the value of field information
     *
     * @param string $information
     * @return $this
     */
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Method to set the value of field question
     *
     * @param string $question
     * @return $this
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Method to set the value of field plan
     *
     * @param string $plan
     * @return $this
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Method to set the value of field video
     *
     * @param string $video
     * @return $this
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Method to set the value of field image
     *
     * @param string $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Method to set the value of field date_creation
     *
     * @param string $date_creation
     * @return $this
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    /**
     * Method to set the value of field uid
     *
     * @param integer $uid
     * @return $this
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Method to set the value of field type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Method to set the value of field order_crid
     *
     * @param integer $order_crid
     * @return $this
     */
    public function setOrderCrid($order_crid)
    {
        $this->order_crid = $order_crid;

        return $this;
    }

    /**
     * Method to set the value of field category
     *
     * @param integer $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Returns the value of field crid
     *
     * @return integer
     */
    public function getCrid()
    {
        return $this->crid;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field permalink
     *
     * @return string
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * Returns the value of field code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Returns the value of field information
     *
     * @return string
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * Returns the value of field question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Returns the value of field plan
     *
     * @return string
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Returns the value of field video
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Returns the value of field image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Returns the value of field date_creation
     *
     * @return string
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * Returns the value of field uid
     *
     * @return integer
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Returns the value of field status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the value of field type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the value of field order_crid
     *
     * @return integer
     */
    public function getOrderCrid()
    {
        return $this->order_crid;
    }

    /**
     * Returns the value of field category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('crid', 'CdClients', 'crid', ['alias' => 'CdClients']);
        $this->hasMany('crid', 'CdStudent', 'crid', ['alias' => 'CdStudent']);
        $this->belongsTo('uid', 'CdUser', 'uid', ['alias' => 'CdUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_careers';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdCareers[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdCareers
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

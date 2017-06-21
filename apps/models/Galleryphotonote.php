<?php
namespace Modules\Models;
class Galleryphotonote extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $pnid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $imgid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    protected $order_image;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    protected $description;

    /**
     * Method to set the value of field pnid
     *
     * @param integer $pnid
     * @return $this
     */
    public function setPnid($pnid)
    {
        $this->pnid = $pnid;

        return $this;
    }

    /**
     * Method to set the value of field imgid
     *
     * @param integer $imgid
     * @return $this
     */
    public function setImgid($imgid)
    {
        $this->imgid = $imgid;

        return $this;
    }

    /**
     * Method to set the value of field order_image
     *
     * @param integer $order_image
     * @return $this
     */
    public function setOrderImage($order_image)
    {
        $this->order_image = $order_image;

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
     * Method to set the value of field description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Returns the value of field pnid
     *
     * @return integer
     */
    public function getPnid()
    {
        return $this->pnid;
    }

    /**
     * Returns the value of field imgid
     *
     * @return integer
     */
    public function getImgid()
    {
        return $this->imgid;
    }

    /**
     * Returns the value of field order_image
     *
     * @return integer
     */
    public function getOrderImage()
    {
        return $this->order_image;
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
     * Returns the value of field description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'galleryphotonote';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Galleryphotonote[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Galleryphotonote
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

<?php
namespace Modules\Models;
class CdSlider extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $slid;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=false)
     */
    protected $image;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $status;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $order_slider;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $date_creation;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $uid;

    /**
     *
     * @var string
     * @Column(type="string", length=12, nullable=true)
     */
    protected $title;

    /**
     *
     * @var string
     * @Column(type="string", length=80, nullable=true)
     */
    protected $subtitle;

    /**
     * Method to set the value of field slid
     *
     * @param integer $slid
     * @return $this
     */
    public function setSlid($slid)
    {
        $this->slid = $slid;

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
     * Method to set the value of field order_slider
     *
     * @param integer $order_slider
     * @return $this
     */
    public function setOrderSlider($order_slider)
    {
        $this->order_slider = $order_slider;

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
     * Method to set the value of field title
     *
<<<<<<< HEAD
     * @param integer $title
=======
     * @param string $title
>>>>>>> da41a03ae5ae0612bce8394f27ca855df61c462e
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Method to set the value of field subtitle
     *
<<<<<<< HEAD
     * @param integer $subtitle
=======
     * @param string $subtitle
>>>>>>> da41a03ae5ae0612bce8394f27ca855df61c462e
     * @return $this
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Returns the value of field slid
     *
     * @return integer
     */
    public function getSlid()
    {
        return $this->slid;
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
     * Returns the value of field status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the value of field order_slider
     *
     * @return integer
     */
    public function getOrderSlider()
    {
        return $this->order_slider;
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
     * Returns the value of field title
     *
<<<<<<< HEAD
     * @return integer
=======
     * @return string
>>>>>>> da41a03ae5ae0612bce8394f27ca855df61c462e
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Returns the value of field subtitle
     *
<<<<<<< HEAD
     * @return integer
=======
     * @return string
>>>>>>> da41a03ae5ae0612bce8394f27ca855df61c462e
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_slider';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdSlider[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdSlider
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

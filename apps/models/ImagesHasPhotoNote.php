<?php
namespace Modules\Models;
class ImagesHasPhotoNote extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $ipnid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $imgid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $pnid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    protected $order_image;

    /**
     * Method to set the value of field ipnid
     *
     * @param integer $ipnid
     * @return $this
     */
    public function setIpnid($ipnid)
    {
        $this->ipnid = $ipnid;

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
     * Returns the value of field ipnid
     *
     * @return integer
     */
    public function getIpnid()
    {
        return $this->ipnid;
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
     * Returns the value of field pnid
     *
     * @return integer
     */
    public function getPnid()
    {
        return $this->pnid;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('imgid', 'CdImages', 'imgid', ['alias' => 'CdImages']);
        $this->belongsTo('pnid', 'CdPhotoNote', 'pnid', ['alias' => 'CdPhotoNote']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'images_has_photo_note';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ImagesHasPhotoNote[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ImagesHasPhotoNote
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

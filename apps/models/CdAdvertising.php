<?php
namespace Modules\Models;
class CdAdvertising extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $adid;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $name_image;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    protected $order_adv;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $ubication;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    protected $url;

    /**
     * Method to set the value of field adid
     *
     * @param integer $adid
     * @return $this
     */
    public function setAdid($adid)
    {
        $this->adid = $adid;

        return $this;
    }

    /**
     * Method to set the value of field name_image
     *
     * @param string $name_image
     * @return $this
     */
    public function setNameImage($name_image)
    {
        $this->name_image = $name_image;

        return $this;
    }

    /**
     * Method to set the value of field order_adv
     *
     * @param integer $order_adv
     * @return $this
     */
    public function setOrderAdv($order_adv)
    {
        $this->order_adv = $order_adv;

        return $this;
    }

    /**
     * Method to set the value of field ubication
     *
     * @param string $ubication
     * @return $this
     */
    public function setUbication($ubication)
    {
        $this->ubication = $ubication;

        return $this;
    }

    /**
     * Method to set the value of field url
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Returns the value of field adid
     *
     * @return integer
     */
    public function getAdid()
    {
        return $this->adid;
    }

    /**
     * Returns the value of field name_image
     *
     * @return string
     */
    public function getNameImage()
    {
        return $this->name_image;
    }

    /**
     * Returns the value of field order_adv
     *
     * @return integer
     */
    public function getOrderAdv()
    {
        return $this->order_adv;
    }

    /**
     * Returns the value of field ubication
     *
     * @return string
     */
    public function getUbication()
    {
        return $this->ubication;
    }

    /**
     * Returns the value of field url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_advertising';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdAdvertising[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdAdvertising
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

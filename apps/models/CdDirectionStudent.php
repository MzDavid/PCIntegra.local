<?php
namespace Modules\Models;
class CdDirectionStudent extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $did;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=false)
     */
    protected $street;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $colony;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $town;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $mpid;

    /**
     *
     * @var string
     * @Column(type="string", length=15, nullable=false)
     */
    protected $cp;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=true)
     */
    protected $references;

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
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $stid;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $type;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $refid;

    /**
     * Method to set the value of field did
     *
     * @param integer $did
     * @return $this
     */
    public function setDid($did)
    {
        $this->did = $did;

        return $this;
    }

    /**
     * Method to set the value of field street
     *
     * @param string $street
     * @return $this
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Method to set the value of field colony
     *
     * @param string $colony
     * @return $this
     */
    public function setColony($colony)
    {
        $this->colony = $colony;

        return $this;
    }

    /**
     * Method to set the value of field town
     *
     * @param string $town
     * @return $this
     */
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }

    /**
     * Method to set the value of field mpid
     *
     * @param integer $mpid
     * @return $this
     */
    public function setMpid($mpid)
    {
        $this->mpid = $mpid;

        return $this;
    }

    /**
     * Method to set the value of field cp
     *
     * @param string $cp
     * @return $this
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Method to set the value of field references
     *
     * @param string $references
     * @return $this
     */
    public function setReferences($references)
    {
        $this->references = $references;

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
     * Method to set the value of field stid
     *
     * @param integer $stid
     * @return $this
     */
    public function setStid($stid)
    {
        $this->stid = $stid;

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
     * Method to set the value of field refid
     *
     * @param integer $refid
     * @return $this
     */
    public function setRefid($refid)
    {
        $this->refid = $refid;

        return $this;
    }

    /**
     * Returns the value of field did
     *
     * @return integer
     */
    public function getDid()
    {
        return $this->did;
    }

    /**
     * Returns the value of field street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Returns the value of field colony
     *
     * @return string
     */
    public function getColony()
    {
        return $this->colony;
    }

    /**
     * Returns the value of field town
     *
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Returns the value of field mpid
     *
     * @return integer
     */
    public function getMpid()
    {
        return $this->mpid;
    }

    /**
     * Returns the value of field cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Returns the value of field references
     *
     * @return string
     */
    public function getReferences()
    {
        return $this->references;
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
     * Returns the value of field stid
     *
     * @return integer
     */
    public function getStid()
    {
        return $this->stid;
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
     * Returns the value of field refid
     *
     * @return integer
     */
    public function getRefid()
    {
        return $this->refid;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('mpid', 'CdMunicipios', 'mpid', ['alias' => 'CdMunicipios']);
        $this->belongsTo('refid', 'CdReferences', 'refid', ['alias' => 'CdReferences']);
        $this->belongsTo('stid', 'CdStudent', 'stid', ['alias' => 'CdStudent']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_direction_student';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdDirectionStudent[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdDirectionStudent
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

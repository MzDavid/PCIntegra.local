<?php
namespace Modules\Models;
class CdMunicipios extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $mpid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $eid;

    /**
     *
     * @var string
     * @Column(type="string", length=3, nullable=false)
     */
    protected $clave;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $nombre;

    /**
     *
     * @var string
     * @Column(type="string", length=4, nullable=false)
     */
    protected $sigla;

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
     * Method to set the value of field eid
     *
     * @param integer $eid
     * @return $this
     */
    public function setEid($eid)
    {
        $this->eid = $eid;

        return $this;
    }

    /**
     * Method to set the value of field clave
     *
     * @param string $clave
     * @return $this
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * Method to set the value of field nombre
     *
     * @param string $nombre
     * @return $this
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Method to set the value of field sigla
     *
     * @param string $sigla
     * @return $this
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;

        return $this;
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
     * Returns the value of field eid
     *
     * @return integer
     */
    public function getEid()
    {
        return $this->eid;
    }

    /**
     * Returns the value of field clave
     *
     * @return string
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Returns the value of field nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Returns the value of field sigla
     *
     * @return string
     */
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('mpid', 'CdDirectionStudent', 'mpid', ['alias' => 'CdDirectionStudent']);
        $this->belongsTo('eid', 'CdEstados', 'eid', ['alias' => 'CdEstados']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_municipios';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdMunicipios[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdMunicipios
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}

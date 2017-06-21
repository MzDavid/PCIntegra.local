<?php
namespace Modules\Models;

class CdStudent extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $stid;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $name;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $last_name;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $second_name;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $age;

    /**
     *
     * @var string
     * @Column(type="string", length=1, nullable=false)
     */
    protected $sex;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $date_birth;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=false)
     */
    protected $email;

    /**
     *
     * @var string
     * @Column(type="string", length=15, nullable=false)
     */
    protected $phone;

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
    protected $crid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $cyid;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $date_certificate;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $scid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $uid;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    protected $photo;

    /**
     *
     * @var integer
     */
    protected $datePre;

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
     * Method to set the value of field last_name
     *
     * @param string $last_name
     * @return $this
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Method to set the value of field second_name
     *
     * @param string $second_name
     * @return $this
     */
    public function setSecondName($second_name)
    {
        $this->second_name = $second_name;

        return $this;
    }

    /**
     * Method to set the value of field age
     *
     * @param integer $age
     * @return $this
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Method to set the value of field sex
     *
     * @param string $sex
     * @return $this
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Method to set the value of field date_birth
     *
     * @param string $date_birth
     * @return $this
     */
    public function setDateBirth($date_birth)
    {
        $this->date_birth = $date_birth;

        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Method to set the value of field phone
     *
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

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
     * Method to set the value of field cyid
     *
     * @param integer $cyid
     * @return $this
     */
    public function setCyid($cyid)
    {
        $this->cyid = $cyid;

        return $this;
    }

    /**
     * Method to set the value of field date_certificate
     *
     * @param string $date_certificate
     * @return $this
     */
    public function setDateCertificate($date_certificate)
    {
        $this->date_certificate = $date_certificate;

        return $this;
    }

    /**
     * Method to set the value of field scid
     *
     * @param integer $scid
     * @return $this
     */
    public function setScid($scid)
    {
        $this->scid = $scid;

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
     * Method to set the value of field photo
     *
     * @param string $photo
     * @return $this
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Method to set the value of field datePre
     *
     * @param string $datePre
     * @return $this
     */

    public function setDatePre($datePre)
    {
        $this->datePre = $datePre;

        return $this;
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
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field last_name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Returns the value of field second_name
     *
     * @return string
     */
    public function getSecondName()
    {
        return $this->second_name;
    }

    /**
     * Returns the value of field age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Returns the value of field sex
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Returns the value of field date_birth
     *
     * @return string
     */
    public function getDateBirth()
    {
        return $this->date_birth;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
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
     * Returns the value of field crid
     *
     * @return integer
     */
    public function getCrid()
    {
        return $this->crid;
    }

    /**
     * Returns the value of field cyid
     *
     * @return integer
     */
    public function getCyid()
    {
        return $this->cyid;
    }

    /**
     * Returns the value of field date_certificate
     *
     * @return string
     */
    public function getDateCertificate()
    {
        return $this->date_certificate;
    }

    /**
     * Returns the value of field scid
     *
     * @return integer
     */
    public function getScid()
    {
        return $this->scid;
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
     * Returns the value of field photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Validations and business logic
     *
     * @return boolean
     */

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('stid', 'CdDirectionStudent', 'stid', ['alias' => 'CdDirectionStudent']);
        $this->hasMany('stid', 'CdDocument', 'stid', ['alias' => 'CdDocument']);
        $this->hasMany('stid', 'CdPayments', 'stid', ['alias' => 'CdPayments']);
        $this->hasMany('stid', 'CdReferences', 'stid', ['alias' => 'CdReferences']);
        $this->belongsTo('cyid', 'CdCycle', 'cyid', ['alias' => 'CdCycle']);
        $this->belongsTo('scid', 'CdSchool', 'scid', ['alias' => 'CdSchool']);
        $this->belongsTo('crid', 'CdCareers', 'crid', ['alias' => 'CdCareers']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_student';
    }

    /**
     * Returns the value of field datePre
     *
     * @return integer
     */
    public function getDatePre()
    {
        return $this->datePre;
    }

    /**
     * Independent Column Mapping.
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdStudent[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdStudent
     *
     */
    public static function findFirst($parameters = null)
    {
        return array(
            'stid' => 'stid',
            'name' => 'name',
            'last_name' => 'last_name',
            'age' => 'age',
            'sex' => 'sex',
            'date_birth' => 'date_birth',
            'street' => 'street',
            'colony' => 'colony',
            'city' => 'city',
            'municipality' => 'municipality',
            'cp' => 'cp',
            'email' => 'email',
            'phone' => 'phone',
            'status' => 'status',
            'crid' => 'crid',
            'datePre' => 'datePre'
        );
        return parent::findFirst($parameters);
    }

}
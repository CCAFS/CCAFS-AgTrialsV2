<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('TbContactperson', 'doctrine');

/**
 * BaseTbContactperson
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_contactperson
 * @property string $cnprfirstname
 * @property string $cnprmiddlename
 * @property string $cnprlastname
 * @property integer $id_institution
 * @property string $cnpremail
 * @property string $cnprtelephone
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $id_user
 * @property integer $id_user_update
 * @property TbInstitution $TbInstitution
 * @property Doctrine_Collection $TbProject
 * @property Doctrine_Collection $TbTrial
 * 
 * @method integer             getIdContactperson()  Returns the current record's "id_contactperson" value
 * @method string              getCnprfirstname()    Returns the current record's "cnprfirstname" value
 * @method string              getCnprmiddlename()   Returns the current record's "cnprmiddlename" value
 * @method string              getCnprlastname()     Returns the current record's "cnprlastname" value
 * @method integer             getIdInstitution()    Returns the current record's "id_institution" value
 * @method string              getCnpremail()        Returns the current record's "cnpremail" value
 * @method string              getCnprtelephone()    Returns the current record's "cnprtelephone" value
 * @method timestamp           getCreatedAt()        Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()        Returns the current record's "updated_at" value
 * @method integer             getIdUser()           Returns the current record's "id_user" value
 * @method integer             getIdUserUpdate()     Returns the current record's "id_user_update" value
 * @method TbInstitution       getTbInstitution()    Returns the current record's "TbInstitution" value
 * @method Doctrine_Collection getTbProject()        Returns the current record's "TbProject" collection
 * @method Doctrine_Collection getTbTrial()          Returns the current record's "TbTrial" collection
 * @method TbContactperson     setIdContactperson()  Sets the current record's "id_contactperson" value
 * @method TbContactperson     setCnprfirstname()    Sets the current record's "cnprfirstname" value
 * @method TbContactperson     setCnprmiddlename()   Sets the current record's "cnprmiddlename" value
 * @method TbContactperson     setCnprlastname()     Sets the current record's "cnprlastname" value
 * @method TbContactperson     setIdInstitution()    Sets the current record's "id_institution" value
 * @method TbContactperson     setCnpremail()        Sets the current record's "cnpremail" value
 * @method TbContactperson     setCnprtelephone()    Sets the current record's "cnprtelephone" value
 * @method TbContactperson     setCreatedAt()        Sets the current record's "created_at" value
 * @method TbContactperson     setUpdatedAt()        Sets the current record's "updated_at" value
 * @method TbContactperson     setIdUser()           Sets the current record's "id_user" value
 * @method TbContactperson     setIdUserUpdate()     Sets the current record's "id_user_update" value
 * @method TbContactperson     setTbInstitution()    Sets the current record's "TbInstitution" value
 * @method TbContactperson     setTbProject()        Sets the current record's "TbProject" collection
 * @method TbContactperson     setTbTrial()          Sets the current record's "TbTrial" collection
 * 
 * @package    AgTrials
 * @subpackage model
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbContactperson extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_contactperson');
        $this->hasColumn('id_contactperson', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'tb_contactperson_id_contactperson',
             'length' => 8,
             ));
        $this->hasColumn('cnprfirstname', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('cnprmiddlename', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('cnprlastname', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('id_institution', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('cnpremail', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('cnprtelephone', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('id_user', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('id_user_update', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('TbInstitution', array(
             'local' => 'id_institution',
             'foreign' => 'id_institution'));

        $this->hasMany('TbProject', array(
             'local' => 'id_contactperson',
             'foreign' => 'id_leadofproject'));

        $this->hasMany('TbTrial', array(
             'local' => 'id_contactperson',
             'foreign' => 'id_contactperson'));
    }
}
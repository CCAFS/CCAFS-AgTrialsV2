<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('TbTrial', 'doctrine');

/**
 * BaseTbTrial
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_trial
 * @property integer $id_project
 * @property integer $id_contactperson
 * @property integer $id_rolecontactperson
 * @property date $trlimplementingperiodstartdate
 * @property date $trlimplementingperiodenddate
 * @property integer $id_triallocation
 * @property string $trltrialname
 * @property string $trltrialobjectives
 * @property string $trltriallicense
 * @property string $trltrialpermissions
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $id_user
 * @property integer $id_user_update
 * @property TbContactperson $TbContactperson
 * @property TbProject $TbProject
 * @property TbRolecontactperson $TbRolecontactperson
 * @property TbTriallocation $TbTriallocation
 * @property Doctrine_Collection $TbTrialinfo
 * @property Doctrine_Collection $TbTrialpermissiongroup
 * @property Doctrine_Collection $TbTrialpermissionuser
 * @property Doctrine_Collection $sfGuardUserDownloads
 * 
 * @method integer             getIdTrial()                        Returns the current record's "id_trial" value
 * @method integer             getIdProject()                      Returns the current record's "id_project" value
 * @method integer             getIdContactperson()                Returns the current record's "id_contactperson" value
 * @method integer             getIdRolecontactperson()            Returns the current record's "id_rolecontactperson" value
 * @method date                getTrlimplementingperiodstartdate() Returns the current record's "trlimplementingperiodstartdate" value
 * @method date                getTrlimplementingperiodenddate()   Returns the current record's "trlimplementingperiodenddate" value
 * @method integer             getIdTriallocation()                Returns the current record's "id_triallocation" value
 * @method string              getTrltrialname()                   Returns the current record's "trltrialname" value
 * @method string              getTrltrialobjectives()             Returns the current record's "trltrialobjectives" value
 * @method string              getTrltriallicense()                Returns the current record's "trltriallicense" value
 * @method string              getTrltrialpermissions()            Returns the current record's "trltrialpermissions" value
 * @method timestamp           getCreatedAt()                      Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()                      Returns the current record's "updated_at" value
 * @method integer             getIdUser()                         Returns the current record's "id_user" value
 * @method integer             getIdUserUpdate()                   Returns the current record's "id_user_update" value
 * @method TbContactperson     getTbContactperson()                Returns the current record's "TbContactperson" value
 * @method TbProject           getTbProject()                      Returns the current record's "TbProject" value
 * @method TbRolecontactperson getTbRolecontactperson()            Returns the current record's "TbRolecontactperson" value
 * @method TbTriallocation     getTbTriallocation()                Returns the current record's "TbTriallocation" value
 * @method Doctrine_Collection getTbTrialinfo()                    Returns the current record's "TbTrialinfo" collection
 * @method Doctrine_Collection getTbTrialpermissiongroup()         Returns the current record's "TbTrialpermissiongroup" collection
 * @method Doctrine_Collection getTbTrialpermissionuser()          Returns the current record's "TbTrialpermissionuser" collection
 * @method Doctrine_Collection getSfGuardUserDownloads()           Returns the current record's "sfGuardUserDownloads" collection
 * @method TbTrial             setIdTrial()                        Sets the current record's "id_trial" value
 * @method TbTrial             setIdProject()                      Sets the current record's "id_project" value
 * @method TbTrial             setIdContactperson()                Sets the current record's "id_contactperson" value
 * @method TbTrial             setIdRolecontactperson()            Sets the current record's "id_rolecontactperson" value
 * @method TbTrial             setTrlimplementingperiodstartdate() Sets the current record's "trlimplementingperiodstartdate" value
 * @method TbTrial             setTrlimplementingperiodenddate()   Sets the current record's "trlimplementingperiodenddate" value
 * @method TbTrial             setIdTriallocation()                Sets the current record's "id_triallocation" value
 * @method TbTrial             setTrltrialname()                   Sets the current record's "trltrialname" value
 * @method TbTrial             setTrltrialobjectives()             Sets the current record's "trltrialobjectives" value
 * @method TbTrial             setTrltriallicense()                Sets the current record's "trltriallicense" value
 * @method TbTrial             setTrltrialpermissions()            Sets the current record's "trltrialpermissions" value
 * @method TbTrial             setCreatedAt()                      Sets the current record's "created_at" value
 * @method TbTrial             setUpdatedAt()                      Sets the current record's "updated_at" value
 * @method TbTrial             setIdUser()                         Sets the current record's "id_user" value
 * @method TbTrial             setIdUserUpdate()                   Sets the current record's "id_user_update" value
 * @method TbTrial             setTbContactperson()                Sets the current record's "TbContactperson" value
 * @method TbTrial             setTbProject()                      Sets the current record's "TbProject" value
 * @method TbTrial             setTbRolecontactperson()            Sets the current record's "TbRolecontactperson" value
 * @method TbTrial             setTbTriallocation()                Sets the current record's "TbTriallocation" value
 * @method TbTrial             setTbTrialinfo()                    Sets the current record's "TbTrialinfo" collection
 * @method TbTrial             setTbTrialpermissiongroup()         Sets the current record's "TbTrialpermissiongroup" collection
 * @method TbTrial             setTbTrialpermissionuser()          Sets the current record's "TbTrialpermissionuser" collection
 * @method TbTrial             setSfGuardUserDownloads()           Sets the current record's "sfGuardUserDownloads" collection
 * 
 * @package    AgTrials
 * @subpackage model
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbTrial extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_trial');
        $this->hasColumn('id_trial', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'tb_trial_id_trial',
             'length' => 8,
             ));
        $this->hasColumn('id_project', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('id_contactperson', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('id_rolecontactperson', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('trlimplementingperiodstartdate', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('trlimplementingperiodenddate', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('id_triallocation', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('trltrialname', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('trltrialobjectives', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('trltriallicense', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('trltrialpermissions', 'string', null, array(
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
        $this->hasOne('TbContactperson', array(
             'local' => 'id_contactperson',
             'foreign' => 'id_contactperson'));

        $this->hasOne('TbProject', array(
             'local' => 'id_project',
             'foreign' => 'id_project'));

        $this->hasOne('TbRolecontactperson', array(
             'local' => 'id_rolecontactperson',
             'foreign' => 'id_rolecontactperson'));

        $this->hasOne('TbTriallocation', array(
             'local' => 'id_triallocation',
             'foreign' => 'id_triallocation'));

        $this->hasMany('TbTrialinfo', array(
             'local' => 'id_trial',
             'foreign' => 'id_trial'));

        $this->hasMany('TbTrialpermissiongroup', array(
             'local' => 'id_trial',
             'foreign' => 'id_trial'));

        $this->hasMany('TbTrialpermissionuser', array(
             'local' => 'id_trial',
             'foreign' => 'id_trial'));

        $this->hasMany('sfGuardUserDownloads', array(
             'local' => 'id_trial',
             'foreign' => 'id_trial'));
    }
}
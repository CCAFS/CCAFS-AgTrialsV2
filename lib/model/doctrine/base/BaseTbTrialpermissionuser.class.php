<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('TbTrialpermissionuser', 'doctrine');

/**
 * BaseTbTrialpermissionuser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_trialpermissionuser
 * @property integer $id_trial
 * @property integer $id_userpermission
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $id_user
 * @property integer $id_user_update
 * @property TbTrial $TbTrial
 * 
 * @method integer               getIdTrialpermissionuser()  Returns the current record's "id_trialpermissionuser" value
 * @method integer               getIdTrial()                Returns the current record's "id_trial" value
 * @method integer               getIdUserpermission()       Returns the current record's "id_userpermission" value
 * @method timestamp             getCreatedAt()              Returns the current record's "created_at" value
 * @method timestamp             getUpdatedAt()              Returns the current record's "updated_at" value
 * @method integer               getIdUser()                 Returns the current record's "id_user" value
 * @method integer               getIdUserUpdate()           Returns the current record's "id_user_update" value
 * @method TbTrial               getTbTrial()                Returns the current record's "TbTrial" value
 * @method TbTrialpermissionuser setIdTrialpermissionuser()  Sets the current record's "id_trialpermissionuser" value
 * @method TbTrialpermissionuser setIdTrial()                Sets the current record's "id_trial" value
 * @method TbTrialpermissionuser setIdUserpermission()       Sets the current record's "id_userpermission" value
 * @method TbTrialpermissionuser setCreatedAt()              Sets the current record's "created_at" value
 * @method TbTrialpermissionuser setUpdatedAt()              Sets the current record's "updated_at" value
 * @method TbTrialpermissionuser setIdUser()                 Sets the current record's "id_user" value
 * @method TbTrialpermissionuser setIdUserUpdate()           Sets the current record's "id_user_update" value
 * @method TbTrialpermissionuser setTbTrial()                Sets the current record's "TbTrial" value
 * 
 * @package    AgTrials
 * @subpackage model
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbTrialpermissionuser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_trialpermissionuser');
        $this->hasColumn('id_trialpermissionuser', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'tb_trialpermissionuser_id_trialpermissionuser',
             'length' => 8,
             ));
        $this->hasColumn('id_trial', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('id_userpermission', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
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
        $this->hasOne('TbTrial', array(
             'local' => 'id_trial',
             'foreign' => 'id_trial'));
    }
}
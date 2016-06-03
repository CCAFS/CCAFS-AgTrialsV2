<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('TbExperimentaldesign', 'doctrine');

/**
 * BaseTbExperimentaldesign
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_experimentaldesign
 * @property string $xpdsname
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $id_user
 * @property integer $id_user_update
 * @property Doctrine_Collection $TbTrialinfo
 * 
 * @method integer              getIdExperimentaldesign()  Returns the current record's "id_experimentaldesign" value
 * @method string               getXpdsname()              Returns the current record's "xpdsname" value
 * @method timestamp            getCreatedAt()             Returns the current record's "created_at" value
 * @method timestamp            getUpdatedAt()             Returns the current record's "updated_at" value
 * @method integer              getIdUser()                Returns the current record's "id_user" value
 * @method integer              getIdUserUpdate()          Returns the current record's "id_user_update" value
 * @method Doctrine_Collection  getTbTrialinfo()           Returns the current record's "TbTrialinfo" collection
 * @method TbExperimentaldesign setIdExperimentaldesign()  Sets the current record's "id_experimentaldesign" value
 * @method TbExperimentaldesign setXpdsname()              Sets the current record's "xpdsname" value
 * @method TbExperimentaldesign setCreatedAt()             Sets the current record's "created_at" value
 * @method TbExperimentaldesign setUpdatedAt()             Sets the current record's "updated_at" value
 * @method TbExperimentaldesign setIdUser()                Sets the current record's "id_user" value
 * @method TbExperimentaldesign setIdUserUpdate()          Sets the current record's "id_user_update" value
 * @method TbExperimentaldesign setTbTrialinfo()           Sets the current record's "TbTrialinfo" collection
 * 
 * @package    AgTrials
 * @subpackage model
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbExperimentaldesign extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_experimentaldesign');
        $this->hasColumn('id_experimentaldesign', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'tb_experimentaldesign_id_experimentaldesign',
             'length' => 8,
             ));
        $this->hasColumn('xpdsname', 'string', null, array(
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
        $this->hasMany('TbTrialinfo', array(
             'local' => 'id_experimentaldesign',
             'foreign' => 'id_experimentaldesign'));
    }
}
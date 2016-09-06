<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('sfGuardUserApilog', 'doctrine');

/**
 * BasesfGuardUserApilog
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property string $api
 * @property string $apiurl
 * @property timestamp $created_at
 * 
 * @method integer           getId()         Returns the current record's "id" value
 * @method integer           getUserId()     Returns the current record's "user_id" value
 * @method string            getApi()        Returns the current record's "api" value
 * @method string            getApiurl()     Returns the current record's "apiurl" value
 * @method timestamp         getCreatedAt()  Returns the current record's "created_at" value
 * @method sfGuardUserApilog setId()         Sets the current record's "id" value
 * @method sfGuardUserApilog setUserId()     Sets the current record's "user_id" value
 * @method sfGuardUserApilog setApi()        Sets the current record's "api" value
 * @method sfGuardUserApilog setApiurl()     Sets the current record's "apiurl" value
 * @method sfGuardUserApilog setCreatedAt()  Sets the current record's "created_at" value
 * @property  $
 * 
 * @package    AgTrials
 * @subpackage model
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardUserApilog extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user_apilog');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'sf_guard_user_apilog_id',
             'length' => 8,
             ));
        $this->hasColumn('user_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('api', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('apiurl', 'string', null, array(
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('SfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}
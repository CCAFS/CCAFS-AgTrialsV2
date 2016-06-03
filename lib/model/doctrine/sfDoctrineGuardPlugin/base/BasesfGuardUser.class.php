<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('sfGuardUser', 'doctrine');

/**
 * BasesfGuardUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $first_name
 * @property string $last_name
 * @property string $email_address
 * @property string $username
 * @property string $algorithm
 * @property string $salt
 * @property string $password
 * @property boolean $is_active
 * @property boolean $is_super_admin
 * @property timestamp $last_login
 * @property integer $id
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Doctrine_Collection $Groups
 * @property Doctrine_Collection $Permissions
 * @property Doctrine_Collection $SfGuardUserInformation
 * @property Doctrine_Collection $sfGuardUserPermission
 * @property Doctrine_Collection $sfGuardUserGroup
 * @property sfGuardRememberKey $RememberKeys
 * @property sfGuardForgotPassword $ForgotPassword
 * 
 * @method string                getFirstName()              Returns the current record's "first_name" value
 * @method string                getLastName()               Returns the current record's "last_name" value
 * @method string                getEmailAddress()           Returns the current record's "email_address" value
 * @method string                getUsername()               Returns the current record's "username" value
 * @method string                getAlgorithm()              Returns the current record's "algorithm" value
 * @method string                getSalt()                   Returns the current record's "salt" value
 * @method string                getPassword()               Returns the current record's "password" value
 * @method boolean               getIsActive()               Returns the current record's "is_active" value
 * @method boolean               getIsSuperAdmin()           Returns the current record's "is_super_admin" value
 * @method timestamp             getLastLogin()              Returns the current record's "last_login" value
 * @method integer               getId()                     Returns the current record's "id" value
 * @method timestamp             getCreatedAt()              Returns the current record's "created_at" value
 * @method timestamp             getUpdatedAt()              Returns the current record's "updated_at" value
 * @method Doctrine_Collection   getGroups()                 Returns the current record's "Groups" collection
 * @method Doctrine_Collection   getPermissions()            Returns the current record's "Permissions" collection
 * @method Doctrine_Collection   getSfGuardUserInformation() Returns the current record's "SfGuardUserInformation" collection
 * @method Doctrine_Collection   getSfGuardUserPermission()  Returns the current record's "sfGuardUserPermission" collection
 * @method Doctrine_Collection   getSfGuardUserGroup()       Returns the current record's "sfGuardUserGroup" collection
 * @method sfGuardRememberKey    getRememberKeys()           Returns the current record's "RememberKeys" value
 * @method sfGuardForgotPassword getForgotPassword()         Returns the current record's "ForgotPassword" value
 * @method sfGuardUser           setFirstName()              Sets the current record's "first_name" value
 * @method sfGuardUser           setLastName()               Sets the current record's "last_name" value
 * @method sfGuardUser           setEmailAddress()           Sets the current record's "email_address" value
 * @method sfGuardUser           setUsername()               Sets the current record's "username" value
 * @method sfGuardUser           setAlgorithm()              Sets the current record's "algorithm" value
 * @method sfGuardUser           setSalt()                   Sets the current record's "salt" value
 * @method sfGuardUser           setPassword()               Sets the current record's "password" value
 * @method sfGuardUser           setIsActive()               Sets the current record's "is_active" value
 * @method sfGuardUser           setIsSuperAdmin()           Sets the current record's "is_super_admin" value
 * @method sfGuardUser           setLastLogin()              Sets the current record's "last_login" value
 * @method sfGuardUser           setId()                     Sets the current record's "id" value
 * @method sfGuardUser           setCreatedAt()              Sets the current record's "created_at" value
 * @method sfGuardUser           setUpdatedAt()              Sets the current record's "updated_at" value
 * @method sfGuardUser           setGroups()                 Sets the current record's "Groups" collection
 * @method sfGuardUser           setPermissions()            Sets the current record's "Permissions" collection
 * @method sfGuardUser           setSfGuardUserInformation() Sets the current record's "SfGuardUserInformation" collection
 * @method sfGuardUser           setSfGuardUserPermission()  Sets the current record's "sfGuardUserPermission" collection
 * @method sfGuardUser           setSfGuardUserGroup()       Sets the current record's "sfGuardUserGroup" collection
 * @method sfGuardUser           setRememberKeys()           Sets the current record's "RememberKeys" value
 * @method sfGuardUser           setForgotPassword()         Sets the current record's "ForgotPassword" value
 * 
 * @package    AgTrials
 * @subpackage model
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasesfGuardUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user');
        $this->hasColumn('first_name', 'string', null, array(
             'type' => 'string',
             'length' => '',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('last_name', 'string', null, array(
             'type' => 'string',
             'length' => '',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('email_address', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => '',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             ));
        $this->hasColumn('username', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => '',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             ));
        $this->hasColumn('algorithm', 'string', null, array(
             'type' => 'string',
             'default' => 'sha1',
             'notnull' => true,
             'length' => '',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             ));
        $this->hasColumn('salt', 'string', null, array(
             'type' => 'string',
             'length' => '',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('password', 'string', null, array(
             'type' => 'string',
             'length' => '',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             ));
        $this->hasColumn('is_active', 'boolean', 1, array(
             'type' => 'boolean',
             'default' => 'true',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 1,
             ));
        $this->hasColumn('is_super_admin', 'boolean', 1, array(
             'type' => 'boolean',
             'default' => 'false',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 1,
             ));
        $this->hasColumn('last_login', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'sf_guard_user_id',
             'length' => 8,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 25,
             ));


        $this->index('is_active_idx', array(
             'fields' => 
             array(
              0 => 'is_active',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('sfGuardGroup as Groups', array(
             'refClass' => 'sfGuardUserGroup',
             'local' => 'user_id',
             'foreign' => 'group_id'));

        $this->hasMany('sfGuardPermission as Permissions', array(
             'refClass' => 'sfGuardUserPermission',
             'local' => 'user_id',
             'foreign' => 'permission_id'));

        $this->hasMany('SfGuardUserInformation', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('sfGuardUserPermission', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasMany('sfGuardUserGroup', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('sfGuardRememberKey as RememberKeys', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $this->hasOne('sfGuardForgotPassword as ForgotPassword', array(
             'local' => 'id',
             'foreign' => 'user_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             ));
        $this->actAs($timestampable0);
    }
}
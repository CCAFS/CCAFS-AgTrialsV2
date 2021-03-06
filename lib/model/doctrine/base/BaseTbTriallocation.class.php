<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('TbTriallocation', 'doctrine');

/**
 * BaseTbTriallocation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_triallocation
 * @property string $trlcname
 * @property float $trlclatitude
 * @property float $trlclongitude
 * @property float $trlcaltitude
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $id_user
 * @property integer $id_user_update
 * @property Doctrine_Collection $TbTrial
 * 
 * @method integer             getIdTriallocation()                       Returns the current record's "id_triallocation" value
 * @method string              getTrlcname()                              Returns the current record's "trlcname" value
 * @method float               getTrlclatitude()                          Returns the current record's "trlclatitude" value
 * @method float               getTrlclongitude()                         Returns the current record's "trlclongitude" value
 * @method float               getTrlcaltitude()                          Returns the current record's "trlcaltitude" value
 * @method timestamp           getCreatedAt()                             Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()                             Returns the current record's "updated_at" value
 * @method integer             getIdUser()                                Returns the current record's "id_user" value
 * @method integer             getIdUserUpdate()                          Returns the current record's "id_user_update" value
 * @method Doctrine_Collection getTbTriallocationadministrativedivision() Returns the current record's "TbTriallocationadministrativedivision" collection
 * @method Doctrine_Collection getTbTrial()                               Returns the current record's "TbTrial" collection
 * @method TbTriallocation     setIdTriallocation()                       Sets the current record's "id_triallocation" value
 * @method TbTriallocation     setTrlcname()                              Sets the current record's "trlcname" value
 * @method TbTriallocation     setTrlclatitude()                          Sets the current record's "trlclatitude" value
 * @method TbTriallocation     setTrlclongitude()                         Sets the current record's "trlclongitude" value
 * @method TbTriallocation     setTrlcaltitude()                          Sets the current record's "trlcaltitude" value
 * @method TbTriallocation     setCreatedAt()                             Sets the current record's "created_at" value
 * @method TbTriallocation     setUpdatedAt()                             Sets the current record's "updated_at" value
 * @method TbTriallocation     setIdUser()                                Sets the current record's "id_user" value
 * @method TbTriallocation     setIdUserUpdate()                          Sets the current record's "id_user_update" value
 * @method TbTriallocation     setTbTriallocationadministrativedivision() Sets the current record's "TbTriallocationadministrativedivision" collection
 * @method TbTriallocation     setTbTrial()                               Sets the current record's "TbTrial" collectionlocationadministrativedivision
 * @property Doctrine_Collection $TbTrial
 * 
 * @method integer             getIdTriallocation()                       Returns the current record's "id_triallocation" value
 * @method string              getTrlcname()                              Returns the current record's "trlcname" value
 * @method float               getTrlclatitude()                          Returns the current record's "trlclatitude" value
 * @method float               getTrlclongitude()                         Returns the current record's "trlclongitude" value
 * @method float               getTrlcaltitude()                          Returns the current record's "trlcaltitude" value
 * @method timestamp           getCreatedAt()                             Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()                             Returns the current record's "updated_at" value
 * @method integer             getIdUser()                                Returns the current record's "id_user" value
 * @method integer             getIdUserUpdate()                          Returns the current record's "id_user_update" value
 * @method Doctrine_Collection getTbTriallocationadministrativedivision() Returns the current record's "TbTriallocationadministrativedivision" collection
 * @method Doctrine_Collection getTbTrial()                               Returns the current record's "TbTrial" collection
 * @method TbTriallocation     setIdTriallocation()                       Sets the current record's "id_triallocation" value
 * @method TbTriallocation     setTrlcname()                              Sets the current record's "trlcname" value
 * @method TbTriallocation     setTrlclatitude()                          Sets the current record's "trlclatitude" value
 * @method TbTriallocation     setTrlclongitude()                         Sets the current record's "trlclongitude" value
 * @method TbTriallocation     setTrlcaltitude()                          Sets the current record's "trlcaltitude" value
 * @method TbTriallocation     setCreatedAt()                             Sets the current record's "created_at" value
 * @method TbTriallocation     setUpdatedAt()                             Sets the current record's "updated_at" value
 * @method TbTriallocation     setIdUser()                                Sets the current record's "id_user" value
 * @method TbTriallocation     setIdUserUpdate()                          Sets the current record's "id_user_update" value
 * @method TbTriallocation     setTbTriallocationadministrativedivision() Sets the current record's "TbTriallocationadministrativedivision" collection
 * @method TbTriallocation     setTbTrial()                               Sets the current record's "TbTrial" collection
 * 
 * @package    AgTrials
 * @subpackage model
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbTriallocation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_triallocation');
        $this->hasColumn('id_triallocation', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'tb_triallocation_id_triallocation',
             'length' => 8,
             ));
        $this->hasColumn('trlcname', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('trlclatitude', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('trlclongitude', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('trlcaltitude', 'float', null, array(
             'type' => 'float',
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
        $this->hasMany('TbTriallocationadministrativedivision', array(
             'local' => 'id_triallocation',
             'foreign' => 'id_triallocation'));

        $this->hasMany('TbTrial', array(
             'local' => 'id_triallocation',
             'foreign' => 'id_triallocation'));
    }
}
<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('TbTriallocationadministrativedivision', 'doctrine');

/**
 * BaseTbTriallocationadministrativedivision
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_triallocationadministrativedivision
 * @property integer $id_triallocation
 * @property integer $id_administrativedivision
 * @property TbAdministrativedivision $TbAdministrativedivision
 * @property TbTriallocation $TbTriallocation
 * 
 * @method integer                               getIdTriallocationadministrativedivision()  Returns the current record's "id_triallocationadministrativedivision" value
 * @method integer                               getIdTriallocation()                        Returns the current record's "id_triallocation" value
 * @method integer                               getIdAdministrativedivision()               Returns the current record's "id_administrativedivision" value
 * @method TbAdministrativedivision              getTbAdministrativedivision()               Returns the current record's "TbAdministrativedivision" value
 * @method TbTriallocation                       getTbTriallocation()                        Returns the current record's "TbTriallocation" value
 * @method TbTriallocationadministrativedivision setIdTriallocationadministrativedivision()  Sets the current record's "id_triallocationadministrativedivision" value
 * @method TbTriallocationadministrativedivision setIdTriallocation()                        Sets the current record's "id_triallocation" value
 * @method TbTriallocationadministrativedivision setIdAdministrativedivision()               Sets the current record's "id_administrativedivision" value
 * @method TbTriallocationadministrativedivision setTbAdministrativedivision()               Sets the current record's "TbAdministrativedivision" value
 * @method TbTriallocationadministrativedivision setTbTriallocation()                        Sets the current record's "TbTriallocation" value
 * 
 * @package    AgTrials
 * @subpackage model
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbTriallocationadministrativedivision extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_triallocationadministrativedivision');
        $this->hasColumn('id_triallocationadministrativedivision', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'tb_triallocationadministrativ_id_triallocationadministrativ',
             'length' => 8,
             ));
        $this->hasColumn('id_triallocation', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('id_administrativedivision', 'integer', 8, array(
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
        $this->hasOne('TbAdministrativedivision', array(
             'local' => 'id_administrativedivision',
             'foreign' => 'id_administrativedivision'));

        $this->hasOne('TbTriallocation', array(
             'local' => 'id_triallocation',
             'foreign' => 'id_triallocation'));
    }
}
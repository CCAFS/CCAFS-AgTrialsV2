<?php

/**
 * TbTriallocationadministrativedivision filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbTriallocationadministrativedivisionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_triallocation'                       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTriallocation'), 'add_empty' => true)),
      'id_administrativedivision'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbAdministrativedivision'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_triallocation'                       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbTriallocation'), 'column' => 'id_triallocation')),
      'id_administrativedivision'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbAdministrativedivision'), 'column' => 'id_administrativedivision')),
    ));

    $this->widgetSchema->setNameFormat('tb_triallocationadministrativedivision_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbTriallocationadministrativedivision';
  }

  public function getFields()
  {
    return array(
      'id_triallocationadministrativedivision' => 'Number',
      'id_triallocation'                       => 'ForeignKey',
      'id_administrativedivision'              => 'ForeignKey',
    );
  }
}

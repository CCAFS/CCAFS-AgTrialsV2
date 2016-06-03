<?php

/**
 * TbTriallocationadministrativedivision form base class.
 *
 * @method TbTriallocationadministrativedivision getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbTriallocationadministrativedivisionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_triallocationadministrativedivision' => new sfWidgetFormInputHidden(),
      'id_triallocation'                       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTriallocation'), 'add_empty' => true)),
      'id_administrativedivision'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbAdministrativedivision'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_triallocationadministrativedivision' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_triallocationadministrativedivision')), 'empty_value' => $this->getObject()->get('id_triallocationadministrativedivision'), 'required' => false)),
      'id_triallocation'                       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbTriallocation'), 'required' => false)),
      'id_administrativedivision'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbAdministrativedivision'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_triallocationadministrativedivision[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbTriallocationadministrativedivision';
  }

}

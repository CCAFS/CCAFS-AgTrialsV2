<?php

/**
 * TbAdministrativedivisiontype form base class.
 *
 * @method TbAdministrativedivisiontype getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbAdministrativedivisiontypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_administrativedivisiontype' => new sfWidgetFormInputHidden(),
      'dmdvtpnombre'                  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_administrativedivisiontype' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_administrativedivisiontype')), 'empty_value' => $this->getObject()->get('id_administrativedivisiontype'), 'required' => false)),
      'dmdvtpnombre'                  => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('tb_administrativedivisiontype[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbAdministrativedivisiontype';
  }

}

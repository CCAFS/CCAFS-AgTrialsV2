<?php

/**
 * TbInstitution form base class.
 *
 * @method TbInstitution getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbInstitutionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_institution' => new sfWidgetFormInputHidden(),
      'insname'        => new sfWidgetFormTextarea(),
      'id_country'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbAdministrativedivision'), 'add_empty' => true)),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'id_user'        => new sfWidgetFormInputText(),
      'id_user_update' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_institution' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_institution')), 'empty_value' => $this->getObject()->get('id_institution'), 'required' => false)),
      'insname'        => new sfValidatorString(array('required' => false)),
      'id_country'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbAdministrativedivision'), 'required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
      'id_user'        => new sfValidatorInteger(array('required' => false)),
      'id_user_update' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_institution[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbInstitution';
  }

}

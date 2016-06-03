<?php

/**
 * SfGuardUserInformation form base class.
 *
 * @method SfGuardUserInformation getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSfGuardUserInformationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'id_institution' => new sfWidgetFormInputText(),
      'id_country'     => new sfWidgetFormInputText(),
      'city'           => new sfWidgetFormTextarea(),
      'state'          => new sfWidgetFormTextarea(),
      'address'        => new sfWidgetFormTextarea(),
      'telephone'      => new sfWidgetFormTextarea(),
      'motivation'     => new sfWidgetFormTextarea(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'key'            => new sfWidgetFormTextarea(),
      'visits'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'id_institution' => new sfValidatorInteger(array('required' => false)),
      'id_country'     => new sfValidatorInteger(array('required' => false)),
      'city'           => new sfValidatorString(array('required' => false)),
      'state'          => new sfValidatorString(array('required' => false)),
      'address'        => new sfValidatorString(array('required' => false)),
      'telephone'      => new sfValidatorString(array('required' => false)),
      'motivation'     => new sfValidatorString(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
      'key'            => new sfValidatorString(array('required' => false)),
      'visits'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_information[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardUserInformation';
  }

}

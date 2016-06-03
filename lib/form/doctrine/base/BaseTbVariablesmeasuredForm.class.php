<?php

/**
 * TbVariablesmeasured form base class.
 *
 * @method TbVariablesmeasured getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbVariablesmeasuredForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_variablesmeasured' => new sfWidgetFormInputHidden(),
      'id_crop'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCrop'), 'add_empty' => false)),
      'id_traitclass'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTraitclass'), 'add_empty' => false)),
      'vrmsname'             => new sfWidgetFormTextarea(),
      'vrmsshortname'        => new sfWidgetFormTextarea(),
      'vrmsdefinition'       => new sfWidgetFormTextarea(),
      'vrmnmethod'           => new sfWidgetFormTextarea(),
      'vrmsunit'             => new sfWidgetFormTextarea(),
      'id_ontology'          => new sfWidgetFormTextarea(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'id_user'              => new sfWidgetFormInputText(),
      'id_user_update'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_variablesmeasured' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_variablesmeasured')), 'empty_value' => $this->getObject()->get('id_variablesmeasured'), 'required' => false)),
      'id_crop'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCrop'))),
      'id_traitclass'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbTraitclass'))),
      'vrmsname'             => new sfValidatorString(),
      'vrmsshortname'        => new sfValidatorString(array('required' => false)),
      'vrmsdefinition'       => new sfValidatorString(array('required' => false)),
      'vrmnmethod'           => new sfValidatorString(array('required' => false)),
      'vrmsunit'             => new sfValidatorString(array('required' => false)),
      'id_ontology'          => new sfValidatorString(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(array('required' => false)),
      'updated_at'           => new sfValidatorDateTime(array('required' => false)),
      'id_user'              => new sfValidatorInteger(array('required' => false)),
      'id_user_update'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_variablesmeasured[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbVariablesmeasured';
  }

}

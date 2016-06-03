<?php

/**
 * TbTrialpermissionuser form base class.
 *
 * @method TbTrialpermissionuser getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbTrialpermissionuserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_trialpermissionuser' => new sfWidgetFormInputHidden(),
      'id_trial'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTrial'), 'add_empty' => true)),
      'id_userpermission'      => new sfWidgetFormInputText(),
      'created_at'             => new sfWidgetFormDateTime(),
      'updated_at'             => new sfWidgetFormDateTime(),
      'id_user'                => new sfWidgetFormInputText(),
      'id_user_update'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_trialpermissionuser' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_trialpermissionuser')), 'empty_value' => $this->getObject()->get('id_trialpermissionuser'), 'required' => false)),
      'id_trial'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbTrial'), 'required' => false)),
      'id_userpermission'      => new sfValidatorInteger(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(array('required' => false)),
      'updated_at'             => new sfValidatorDateTime(array('required' => false)),
      'id_user'                => new sfValidatorInteger(array('required' => false)),
      'id_user_update'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_trialpermissionuser[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbTrialpermissionuser';
  }

}

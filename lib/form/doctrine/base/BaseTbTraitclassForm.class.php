<?php

/**
 * TbTraitclass form base class.
 *
 * @method TbTraitclass getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbTraitclassForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_traitclass'  => new sfWidgetFormInputHidden(),
      'trclname'       => new sfWidgetFormTextarea(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'id_user'        => new sfWidgetFormInputText(),
      'id_user_update' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_traitclass'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_traitclass')), 'empty_value' => $this->getObject()->get('id_traitclass'), 'required' => false)),
      'trclname'       => new sfValidatorString(),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
      'id_user'        => new sfValidatorInteger(array('required' => false)),
      'id_user_update' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_traitclass[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbTraitclass';
  }

}

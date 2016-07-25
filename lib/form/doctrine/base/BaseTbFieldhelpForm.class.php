<?php

/**
 * TbFieldhelp form base class.
 *
 * @method TbFieldhelp getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbFieldhelpForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_fieldhelp'   => new sfWidgetFormInputHidden(),
      'flhlmodule'     => new sfWidgetFormTextarea(),
      'flhlsession'    => new sfWidgetFormTextarea(),
      'flhlfield'      => new sfWidgetFormTextarea(),
      'flhltexthelp'   => new sfWidgetFormTextarea(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'id_user'        => new sfWidgetFormInputText(),
      'id_user_update' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_fieldhelp'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_fieldhelp')), 'empty_value' => $this->getObject()->get('id_fieldhelp'), 'required' => false)),
      'flhlmodule'     => new sfValidatorString(array('required' => false)),
      'flhlsession'    => new sfValidatorString(array('required' => false)),
      'flhlfield'      => new sfValidatorString(array('required' => false)),
      'flhltexthelp'   => new sfValidatorString(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
      'id_user'        => new sfValidatorInteger(array('required' => false)),
      'id_user_update' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_fieldhelp[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbFieldhelp';
  }

}

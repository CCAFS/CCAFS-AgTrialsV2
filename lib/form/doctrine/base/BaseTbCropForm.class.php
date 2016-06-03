<?php

/**
 * TbCrop form base class.
 *
 * @method TbCrop getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbCropForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_crop'           => new sfWidgetFormInputHidden(),
      'crpname'           => new sfWidgetFormTextarea(),
      'crpscientificname' => new sfWidgetFormTextarea(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'id_user'           => new sfWidgetFormInputText(),
      'id_user_update'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_crop'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_crop')), 'empty_value' => $this->getObject()->get('id_crop'), 'required' => false)),
      'crpname'           => new sfValidatorString(),
      'crpscientificname' => new sfValidatorString(),
      'created_at'        => new sfValidatorDateTime(array('required' => false)),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
      'id_user'           => new sfValidatorInteger(array('required' => false)),
      'id_user_update'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_crop[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbCrop';
  }

}

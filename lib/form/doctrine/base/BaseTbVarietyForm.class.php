<?php

/**
 * TbVariety form base class.
 *
 * @method TbVariety getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbVarietyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_variety'     => new sfWidgetFormInputHidden(),
      'id_crop'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCrop'), 'add_empty' => false)),
      'vrtorigin'      => new sfWidgetFormTextarea(),
      'vrtname'        => new sfWidgetFormTextarea(),
      'vrtsynonymous'  => new sfWidgetFormTextarea(),
      'vrtdescription' => new sfWidgetFormTextarea(),
      'id_genebank'    => new sfWidgetFormTextarea(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'id_user'        => new sfWidgetFormInputText(),
      'id_user_update' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_variety'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_variety')), 'empty_value' => $this->getObject()->get('id_variety'), 'required' => false)),
      'id_crop'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCrop'))),
      'vrtorigin'      => new sfValidatorString(array('required' => false)),
      'vrtname'        => new sfValidatorString(),
      'vrtsynonymous'  => new sfValidatorString(array('required' => false)),
      'vrtdescription' => new sfValidatorString(array('required' => false)),
      'id_genebank'    => new sfValidatorString(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
      'id_user'        => new sfValidatorInteger(array('required' => false)),
      'id_user_update' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_variety[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbVariety';
  }

}

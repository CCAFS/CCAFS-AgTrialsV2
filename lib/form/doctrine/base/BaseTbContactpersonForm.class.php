<?php

/**
 * TbContactperson form base class.
 *
 * @method TbContactperson getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbContactpersonForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_contactperson' => new sfWidgetFormInputHidden(),
      'cnprfirstname'    => new sfWidgetFormTextarea(),
      'cnprmiddlename'   => new sfWidgetFormTextarea(),
      'cnprlastname'     => new sfWidgetFormTextarea(),
      'id_institution'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbInstitution'), 'add_empty' => true)),
      'cnpremail'        => new sfWidgetFormTextarea(),
      'cnprtelephone'    => new sfWidgetFormTextarea(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'id_user'          => new sfWidgetFormInputText(),
      'id_user_update'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_contactperson' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_contactperson')), 'empty_value' => $this->getObject()->get('id_contactperson'), 'required' => false)),
      'cnprfirstname'    => new sfValidatorString(array('required' => false)),
      'cnprmiddlename'   => new sfValidatorString(array('required' => false)),
      'cnprlastname'     => new sfValidatorString(array('required' => false)),
      'id_institution'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbInstitution'), 'required' => false)),
      'cnpremail'        => new sfValidatorString(array('required' => false)),
      'cnprtelephone'    => new sfValidatorString(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
      'id_user'          => new sfValidatorInteger(array('required' => false)),
      'id_user_update'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_contactperson[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbContactperson';
  }

}

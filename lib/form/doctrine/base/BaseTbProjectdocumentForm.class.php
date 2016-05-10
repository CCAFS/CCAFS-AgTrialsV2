<?php

/**
 * TbProjectdocument form base class.
 *
 * @method TbProjectdocument getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbProjectdocumentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_projectdocument' => new sfWidgetFormInputHidden(),
      'id_project'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbProject'), 'add_empty' => false)),
      'prdcfile'           => new sfWidgetFormTextarea(),
      'prdcdescription'    => new sfWidgetFormTextarea(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
      'id_user'            => new sfWidgetFormInputText(),
      'id_user_update'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_projectdocument' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_projectdocument')), 'empty_value' => $this->getObject()->get('id_projectdocument'), 'required' => false)),
      'id_project'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbProject'))),
      'prdcfile'           => new sfValidatorString(array('required' => false)),
      'prdcdescription'    => new sfValidatorString(array('required' => false)),
      'created_at'         => new sfValidatorDateTime(array('required' => false)),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
      'id_user'            => new sfValidatorInteger(array('required' => false)),
      'id_user_update'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_projectdocument[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbProjectdocument';
  }

}

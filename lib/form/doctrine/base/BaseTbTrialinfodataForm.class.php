<?php

/**
 * TbTrialinfodata form base class.
 *
 * @method TbTrialinfodata getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbTrialinfodataForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_trialinfodata'     => new sfWidgetFormInputHidden(),
      'id_trialinfo'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTrialinfo'), 'add_empty' => false)),
      'trnfdtreplication'    => new sfWidgetFormInputText(),
      'id_variety'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbVariety'), 'add_empty' => true)),
      'id_variablesmeasured' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbVariablesmeasured'), 'add_empty' => true)),
      'trnfdtvalue'          => new sfWidgetFormTextarea(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'id_user'              => new sfWidgetFormInputText(),
      'id_user_update'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_trialinfodata'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_trialinfodata')), 'empty_value' => $this->getObject()->get('id_trialinfodata'), 'required' => false)),
      'id_trialinfo'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbTrialinfo'))),
      'trnfdtreplication'    => new sfValidatorInteger(),
      'id_variety'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbVariety'), 'required' => false)),
      'id_variablesmeasured' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbVariablesmeasured'), 'required' => false)),
      'trnfdtvalue'          => new sfValidatorString(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(array('required' => false)),
      'updated_at'           => new sfValidatorDateTime(array('required' => false)),
      'id_user'              => new sfValidatorInteger(array('required' => false)),
      'id_user_update'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_trialinfodata[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbTrialinfodata';
  }

}

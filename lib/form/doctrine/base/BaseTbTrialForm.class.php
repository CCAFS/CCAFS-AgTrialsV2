<?php

/**
 * TbTrial form base class.
 *
 * @method TbTrial getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbTrialForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_trial'                       => new sfWidgetFormInputHidden(),
      'id_project'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbProject'), 'add_empty' => true)),
      'id_contactperson'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbContactperson'), 'add_empty' => true)),
      'id_rolecontactperson'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbRolecontactperson'), 'add_empty' => true)),
      'trlimplementingperiodstartdate' => new sfWidgetFormDate(),
      'trlimplementingperiodenddate'   => new sfWidgetFormDate(),
      'id_triallocation'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTriallocation'), 'add_empty' => true)),
      'trltrialname'                   => new sfWidgetFormTextarea(),
      'trltrialobjectives'             => new sfWidgetFormTextarea(),
      'trltriallicense'                => new sfWidgetFormTextarea(),
      'trltrialpermissions'            => new sfWidgetFormTextarea(),
      'created_at'                     => new sfWidgetFormDateTime(),
      'updated_at'                     => new sfWidgetFormDateTime(),
      'id_user'                        => new sfWidgetFormInputText(),
      'id_user_update'                 => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_trial'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_trial')), 'empty_value' => $this->getObject()->get('id_trial'), 'required' => false)),
      'id_project'                     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbProject'), 'required' => false)),
      'id_contactperson'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbContactperson'), 'required' => false)),
      'id_rolecontactperson'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbRolecontactperson'), 'required' => false)),
      'trlimplementingperiodstartdate' => new sfValidatorDate(array('required' => false)),
      'trlimplementingperiodenddate'   => new sfValidatorDate(array('required' => false)),
      'id_triallocation'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbTriallocation'), 'required' => false)),
      'trltrialname'                   => new sfValidatorString(array('required' => false)),
      'trltrialobjectives'             => new sfValidatorString(array('required' => false)),
      'trltriallicense'                => new sfValidatorString(array('required' => false)),
      'trltrialpermissions'            => new sfValidatorString(array('required' => false)),
      'created_at'                     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                     => new sfValidatorDateTime(array('required' => false)),
      'id_user'                        => new sfValidatorInteger(array('required' => false)),
      'id_user_update'                 => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_trial[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbTrial';
  }

}

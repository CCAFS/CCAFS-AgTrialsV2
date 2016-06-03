<?php

/**
 * TbTrialinfo form base class.
 *
 * @method TbTrialinfo getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbTrialinfoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_trialinfo'                      => new sfWidgetFormInputHidden(),
      'id_trial'                          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTrial'), 'add_empty' => true)),
      'trnfnumberofreplicates'            => new sfWidgetFormInputText(),
      'id_experimentaldesign'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbExperimentaldesign'), 'add_empty' => true)),
      'trnftreatmentnumber'               => new sfWidgetFormInputText(),
      'trnftreatmentnameandcode'          => new sfWidgetFormTextarea(),
      'trnfplantingsowingstartdate'       => new sfWidgetFormDate(),
      'trnfplantingsowingenddate'         => new sfWidgetFormDate(),
      'trnfphysiologicalmaturitystardate' => new sfWidgetFormDate(),
      'trnfphysiologicalmaturityenddate'  => new sfWidgetFormDate(),
      'trnfharveststartdate'              => new sfWidgetFormDate(),
      'trnfharvestenddate'                => new sfWidgetFormDate(),
      'id_crop'                           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCrop'), 'add_empty' => true)),
      'trnfdatafile'                      => new sfWidgetFormTextarea(),
      'trnfdataorresultsfile'             => new sfWidgetFormTextarea(),
      'trnfsuppplementalinformationfile'  => new sfWidgetFormTextarea(),
      'trnfweatherdatafile'               => new sfWidgetFormTextarea(),
      'trnfsoildatafile'                  => new sfWidgetFormTextarea(),
      'created_at'                        => new sfWidgetFormDateTime(),
      'updated_at'                        => new sfWidgetFormDateTime(),
      'id_user'                           => new sfWidgetFormInputText(),
      'id_user_update'                    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_trialinfo'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_trialinfo')), 'empty_value' => $this->getObject()->get('id_trialinfo'), 'required' => false)),
      'id_trial'                          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbTrial'), 'required' => false)),
      'trnfnumberofreplicates'            => new sfValidatorInteger(array('required' => false)),
      'id_experimentaldesign'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbExperimentaldesign'), 'required' => false)),
      'trnftreatmentnumber'               => new sfValidatorInteger(array('required' => false)),
      'trnftreatmentnameandcode'          => new sfValidatorString(array('required' => false)),
      'trnfplantingsowingstartdate'       => new sfValidatorDate(array('required' => false)),
      'trnfplantingsowingenddate'         => new sfValidatorDate(array('required' => false)),
      'trnfphysiologicalmaturitystardate' => new sfValidatorDate(array('required' => false)),
      'trnfphysiologicalmaturityenddate'  => new sfValidatorDate(array('required' => false)),
      'trnfharveststartdate'              => new sfValidatorDate(array('required' => false)),
      'trnfharvestenddate'                => new sfValidatorDate(array('required' => false)),
      'id_crop'                           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCrop'), 'required' => false)),
      'trnfdatafile'                      => new sfValidatorString(array('required' => false)),
      'trnfdataorresultsfile'             => new sfValidatorString(array('required' => false)),
      'trnfsuppplementalinformationfile'  => new sfValidatorString(array('required' => false)),
      'trnfweatherdatafile'               => new sfValidatorString(array('required' => false)),
      'trnfsoildatafile'                  => new sfValidatorString(array('required' => false)),
      'created_at'                        => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                        => new sfValidatorDateTime(array('required' => false)),
      'id_user'                           => new sfValidatorInteger(array('required' => false)),
      'id_user_update'                    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_trialinfo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbTrialinfo';
  }

}

<?php

/**
 * TbTrialinfo filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbTrialinfoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_trial'                          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTrial'), 'add_empty' => true)),
      'trnfnumberofreplicates'            => new sfWidgetFormFilterInput(),
      'id_experimentaldesign'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbExperimentaldesign'), 'add_empty' => true)),
      'trnftreatmentnumber'               => new sfWidgetFormFilterInput(),
      'trnftreatmentnameandcode'          => new sfWidgetFormFilterInput(),
      'trnfplantingsowingstartdate'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'trnfplantingsowingenddate'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'trnfphysiologicalmaturitystardate' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'trnfphysiologicalmaturityenddate'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'trnfharveststartdate'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'trnfharvestenddate'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_crop'                           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCrop'), 'add_empty' => true)),
      'trnfdatafile'                      => new sfWidgetFormFilterInput(),
      'trnfdataorresultsfile'             => new sfWidgetFormFilterInput(),
      'trnfsuppplementalinformationfile'  => new sfWidgetFormFilterInput(),
      'trnfweatherdatafile'               => new sfWidgetFormFilterInput(),
      'trnfsoildatafile'                  => new sfWidgetFormFilterInput(),
      'created_at'                        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'                        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_user'                           => new sfWidgetFormFilterInput(),
      'id_user_update'                    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_trial'                          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbTrial'), 'column' => 'id_trial')),
      'trnfnumberofreplicates'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_experimentaldesign'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbExperimentaldesign'), 'column' => 'id_experimentaldesign')),
      'trnftreatmentnumber'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'trnftreatmentnameandcode'          => new sfValidatorPass(array('required' => false)),
      'trnfplantingsowingstartdate'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'trnfplantingsowingenddate'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'trnfphysiologicalmaturitystardate' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'trnfphysiologicalmaturityenddate'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'trnfharveststartdate'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'trnfharvestenddate'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'id_crop'                           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCrop'), 'column' => 'id_crop')),
      'trnfdatafile'                      => new sfValidatorPass(array('required' => false)),
      'trnfdataorresultsfile'             => new sfValidatorPass(array('required' => false)),
      'trnfsuppplementalinformationfile'  => new sfValidatorPass(array('required' => false)),
      'trnfweatherdatafile'               => new sfValidatorPass(array('required' => false)),
      'trnfsoildatafile'                  => new sfValidatorPass(array('required' => false)),
      'created_at'                        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_user'                           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_user_update'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tb_trialinfo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbTrialinfo';
  }

  public function getFields()
  {
    return array(
      'id_trialinfo'                      => 'Number',
      'id_trial'                          => 'ForeignKey',
      'trnfnumberofreplicates'            => 'Number',
      'id_experimentaldesign'             => 'ForeignKey',
      'trnftreatmentnumber'               => 'Number',
      'trnftreatmentnameandcode'          => 'Text',
      'trnfplantingsowingstartdate'       => 'Date',
      'trnfplantingsowingenddate'         => 'Date',
      'trnfphysiologicalmaturitystardate' => 'Date',
      'trnfphysiologicalmaturityenddate'  => 'Date',
      'trnfharveststartdate'              => 'Date',
      'trnfharvestenddate'                => 'Date',
      'id_crop'                           => 'ForeignKey',
      'trnfdatafile'                      => 'Text',
      'trnfdataorresultsfile'             => 'Text',
      'trnfsuppplementalinformationfile'  => 'Text',
      'trnfweatherdatafile'               => 'Text',
      'trnfsoildatafile'                  => 'Text',
      'created_at'                        => 'Date',
      'updated_at'                        => 'Date',
      'id_user'                           => 'Number',
      'id_user_update'                    => 'Number',
    );
  }
}

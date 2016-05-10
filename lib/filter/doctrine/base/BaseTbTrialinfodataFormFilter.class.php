<?php

/**
 * TbTrialinfodata filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbTrialinfodataFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_trialinfo'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTrialinfo'), 'add_empty' => true)),
      'trnfdtreplication'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_variety'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbVariety'), 'add_empty' => true)),
      'id_variablesmeasured' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbVariablesmeasured'), 'add_empty' => true)),
      'trnfdtvalue'          => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_user'              => new sfWidgetFormFilterInput(),
      'id_user_update'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_trialinfo'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbTrialinfo'), 'column' => 'id_trialinfo')),
      'trnfdtreplication'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_variety'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbVariety'), 'column' => 'id_variety')),
      'id_variablesmeasured' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbVariablesmeasured'), 'column' => 'id_variablesmeasured')),
      'trnfdtvalue'          => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_user'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_user_update'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tb_trialinfodata_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbTrialinfodata';
  }

  public function getFields()
  {
    return array(
      'id_trialinfodata'     => 'Number',
      'id_trialinfo'         => 'ForeignKey',
      'trnfdtreplication'    => 'Number',
      'id_variety'           => 'ForeignKey',
      'id_variablesmeasured' => 'ForeignKey',
      'trnfdtvalue'          => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'id_user'              => 'Number',
      'id_user_update'       => 'Number',
    );
  }
}

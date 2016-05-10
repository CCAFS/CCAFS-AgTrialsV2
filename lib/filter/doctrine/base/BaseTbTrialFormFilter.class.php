<?php

/**
 * TbTrial filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbTrialFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_project'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbProject'), 'add_empty' => true)),
      'id_contactperson'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbContactperson'), 'add_empty' => true)),
      'id_rolecontactperson'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbRolecontactperson'), 'add_empty' => true)),
      'trlimplementingperiodstartdate' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'trlimplementingperiodenddate'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_triallocation'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTriallocation'), 'add_empty' => true)),
      'trltrialname'                   => new sfWidgetFormFilterInput(),
      'trltrialobjectives'             => new sfWidgetFormFilterInput(),
      'trltriallicense'                => new sfWidgetFormFilterInput(),
      'trltrialpermissions'            => new sfWidgetFormFilterInput(),
      'created_at'                     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'                     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_user'                        => new sfWidgetFormFilterInput(),
      'id_user_update'                 => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_project'                     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbProject'), 'column' => 'id_project')),
      'id_contactperson'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbContactperson'), 'column' => 'id_contactperson')),
      'id_rolecontactperson'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbRolecontactperson'), 'column' => 'id_rolecontactperson')),
      'trlimplementingperiodstartdate' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'trlimplementingperiodenddate'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'id_triallocation'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbTriallocation'), 'column' => 'id_triallocation')),
      'trltrialname'                   => new sfValidatorPass(array('required' => false)),
      'trltrialobjectives'             => new sfValidatorPass(array('required' => false)),
      'trltriallicense'                => new sfValidatorPass(array('required' => false)),
      'trltrialpermissions'            => new sfValidatorPass(array('required' => false)),
      'created_at'                     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_user'                        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_user_update'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tb_trial_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbTrial';
  }

  public function getFields()
  {
    return array(
      'id_trial'                       => 'Number',
      'id_project'                     => 'ForeignKey',
      'id_contactperson'               => 'ForeignKey',
      'id_rolecontactperson'           => 'ForeignKey',
      'trlimplementingperiodstartdate' => 'Date',
      'trlimplementingperiodenddate'   => 'Date',
      'id_triallocation'               => 'ForeignKey',
      'trltrialname'                   => 'Text',
      'trltrialobjectives'             => 'Text',
      'trltriallicense'                => 'Text',
      'trltrialpermissions'            => 'Text',
      'created_at'                     => 'Date',
      'updated_at'                     => 'Date',
      'id_user'                        => 'Number',
      'id_user_update'                 => 'Number',
    );
  }
}

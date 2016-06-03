<?php

/**
 * TbProject filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbProjectFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'prjname'                               => new sfWidgetFormFilterInput(),
      'id_leadofproject'                      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbContactperson'), 'add_empty' => true)),
      'id_projectimplementinginstitutions'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbInstitution'), 'add_empty' => true)),
      'prjprojectimplementingperiodstartdate' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'prjprojectimplementingperiodenddate'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_donor'                              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbDonor'), 'add_empty' => true)),
      'prjabstract'                           => new sfWidgetFormFilterInput(),
      'prjkeywords'                           => new sfWidgetFormFilterInput(),
      'created_at'                            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'                            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_user'                               => new sfWidgetFormFilterInput(),
      'id_user_update'                        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'prjname'                               => new sfValidatorPass(array('required' => false)),
      'id_leadofproject'                      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbContactperson'), 'column' => 'id_contactperson')),
      'id_projectimplementinginstitutions'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbInstitution'), 'column' => 'id_institution')),
      'prjprojectimplementingperiodstartdate' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'prjprojectimplementingperiodenddate'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'id_donor'                              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbDonor'), 'column' => 'id_donor')),
      'prjabstract'                           => new sfValidatorPass(array('required' => false)),
      'prjkeywords'                           => new sfValidatorPass(array('required' => false)),
      'created_at'                            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_user'                               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_user_update'                        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tb_project_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbProject';
  }

  public function getFields()
  {
    return array(
      'id_project'                            => 'Number',
      'prjname'                               => 'Text',
      'id_leadofproject'                      => 'ForeignKey',
      'id_projectimplementinginstitutions'    => 'ForeignKey',
      'prjprojectimplementingperiodstartdate' => 'Date',
      'prjprojectimplementingperiodenddate'   => 'Date',
      'id_donor'                              => 'ForeignKey',
      'prjabstract'                           => 'Text',
      'prjkeywords'                           => 'Text',
      'created_at'                            => 'Date',
      'updated_at'                            => 'Date',
      'id_user'                               => 'Number',
      'id_user_update'                        => 'Number',
    );
  }
}

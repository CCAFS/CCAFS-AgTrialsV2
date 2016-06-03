<?php

/**
 * TbInstitution filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbInstitutionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'insname'        => new sfWidgetFormFilterInput(),
      'id_country'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbAdministrativedivision'), 'add_empty' => true)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_user'        => new sfWidgetFormFilterInput(),
      'id_user_update' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'insname'        => new sfValidatorPass(array('required' => false)),
      'id_country'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbAdministrativedivision'), 'column' => 'id_administrativedivision')),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_user'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_user_update' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tb_institution_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbInstitution';
  }

  public function getFields()
  {
    return array(
      'id_institution' => 'Number',
      'insname'        => 'Text',
      'id_country'     => 'ForeignKey',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'id_user'        => 'Number',
      'id_user_update' => 'Number',
    );
  }
}

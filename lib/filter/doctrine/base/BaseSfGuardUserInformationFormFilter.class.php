<?php

/**
 * SfGuardUserInformation filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSfGuardUserInformationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'id_institution' => new sfWidgetFormFilterInput(),
      'id_country'     => new sfWidgetFormFilterInput(),
      'city'           => new sfWidgetFormFilterInput(),
      'state'          => new sfWidgetFormFilterInput(),
      'address'        => new sfWidgetFormFilterInput(),
      'telephone'      => new sfWidgetFormFilterInput(),
      'motivation'     => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'key'            => new sfWidgetFormFilterInput(),
      'visits'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'id_institution' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_country'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'city'           => new sfValidatorPass(array('required' => false)),
      'state'          => new sfValidatorPass(array('required' => false)),
      'address'        => new sfValidatorPass(array('required' => false)),
      'telephone'      => new sfValidatorPass(array('required' => false)),
      'motivation'     => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'key'            => new sfValidatorPass(array('required' => false)),
      'visits'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_information_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardUserInformation';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'user_id'        => 'ForeignKey',
      'id_institution' => 'Number',
      'id_country'     => 'Number',
      'city'           => 'Text',
      'state'          => 'Text',
      'address'        => 'Text',
      'telephone'      => 'Text',
      'motivation'     => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'key'            => 'Text',
      'visits'         => 'Number',
    );
  }
}

<?php

/**
 * SfGuardUserLog filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSfGuardUserLogFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormFilterInput(),
      'operation'      => new sfWidgetFormFilterInput(),
      'date'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'first_name'     => new sfWidgetFormFilterInput(),
      'last_name'      => new sfWidgetFormFilterInput(),
      'email_address'  => new sfWidgetFormFilterInput(),
      'username'       => new sfWidgetFormFilterInput(),
      'algorithm'      => new sfWidgetFormFilterInput(),
      'salt'           => new sfWidgetFormFilterInput(),
      'password'       => new sfWidgetFormFilterInput(),
      'is_active'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_super_admin' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'last_login'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_user'        => new sfWidgetFormFilterInput(),
      'id_user_update' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'operation'      => new sfValidatorPass(array('required' => false)),
      'date'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'first_name'     => new sfValidatorPass(array('required' => false)),
      'last_name'      => new sfValidatorPass(array('required' => false)),
      'email_address'  => new sfValidatorPass(array('required' => false)),
      'username'       => new sfValidatorPass(array('required' => false)),
      'algorithm'      => new sfValidatorPass(array('required' => false)),
      'salt'           => new sfValidatorPass(array('required' => false)),
      'password'       => new sfValidatorPass(array('required' => false)),
      'is_active'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_super_admin' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'last_login'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_user'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_user_update' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardUserLog';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'operation'      => 'Text',
      'date'           => 'Date',
      'first_name'     => 'Text',
      'last_name'      => 'Text',
      'email_address'  => 'Text',
      'username'       => 'Text',
      'algorithm'      => 'Text',
      'salt'           => 'Text',
      'password'       => 'Text',
      'is_active'      => 'Boolean',
      'is_super_admin' => 'Boolean',
      'last_login'     => 'Date',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'id_user'        => 'Number',
      'id_user_update' => 'Number',
    );
  }
}

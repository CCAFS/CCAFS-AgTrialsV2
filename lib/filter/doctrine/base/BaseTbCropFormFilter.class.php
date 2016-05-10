<?php

/**
 * TbCrop filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbCropFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'crpname'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'crpscientificname' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_user'           => new sfWidgetFormFilterInput(),
      'id_user_update'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'crpname'           => new sfValidatorPass(array('required' => false)),
      'crpscientificname' => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_user'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_user_update'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tb_crop_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbCrop';
  }

  public function getFields()
  {
    return array(
      'id_crop'           => 'Number',
      'crpname'           => 'Text',
      'crpscientificname' => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'id_user'           => 'Number',
      'id_user_update'    => 'Number',
    );
  }
}

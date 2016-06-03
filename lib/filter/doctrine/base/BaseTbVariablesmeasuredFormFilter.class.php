<?php

/**
 * TbVariablesmeasured filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbVariablesmeasuredFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_crop'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCrop'), 'add_empty' => true)),
      'id_traitclass'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTraitclass'), 'add_empty' => true)),
      'vrmsname'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vrmsshortname'        => new sfWidgetFormFilterInput(),
      'vrmsdefinition'       => new sfWidgetFormFilterInput(),
      'vrmnmethod'           => new sfWidgetFormFilterInput(),
      'vrmsunit'             => new sfWidgetFormFilterInput(),
      'id_ontology'          => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_user'              => new sfWidgetFormFilterInput(),
      'id_user_update'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_crop'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCrop'), 'column' => 'id_crop')),
      'id_traitclass'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbTraitclass'), 'column' => 'id_traitclass')),
      'vrmsname'             => new sfValidatorPass(array('required' => false)),
      'vrmsshortname'        => new sfValidatorPass(array('required' => false)),
      'vrmsdefinition'       => new sfValidatorPass(array('required' => false)),
      'vrmnmethod'           => new sfValidatorPass(array('required' => false)),
      'vrmsunit'             => new sfValidatorPass(array('required' => false)),
      'id_ontology'          => new sfValidatorPass(array('required' => false)),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_user'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_user_update'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tb_variablesmeasured_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbVariablesmeasured';
  }

  public function getFields()
  {
    return array(
      'id_variablesmeasured' => 'Number',
      'id_crop'              => 'ForeignKey',
      'id_traitclass'        => 'ForeignKey',
      'vrmsname'             => 'Text',
      'vrmsshortname'        => 'Text',
      'vrmsdefinition'       => 'Text',
      'vrmnmethod'           => 'Text',
      'vrmsunit'             => 'Text',
      'id_ontology'          => 'Text',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
      'id_user'              => 'Number',
      'id_user_update'       => 'Number',
    );
  }
}

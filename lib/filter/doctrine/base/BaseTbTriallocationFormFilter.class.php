<?php

/**
 * TbTriallocation filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbTriallocationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'trlcname'         => new sfWidgetFormFilterInput(),
      'trlclatitude'     => new sfWidgetFormFilterInput(),
      'trlclongitude'    => new sfWidgetFormFilterInput(),
      'trlcaltitude'     => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_user'          => new sfWidgetFormFilterInput(),
      'id_user_update'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'trlcname'         => new sfValidatorPass(array('required' => false)),
      'trlclatitude'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'trlclongitude'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'trlcaltitude'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_user'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_user_update'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tb_triallocation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbTriallocation';
  }

  public function getFields()
  {
    return array(
      'id_triallocation' => 'Number',
      'trlcname'         => 'Text',
      'trlclatitude'     => 'Number',
      'trlclongitude'    => 'Number',
      'trlcaltitude'     => 'Number',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'id_user'          => 'Number',
      'id_user_update'   => 'Number',
    );
  }
}

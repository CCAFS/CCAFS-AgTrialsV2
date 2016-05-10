<?php

/**
 * sfGuardUserDownloads filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserDownloadsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'     => new sfWidgetFormFilterInput(),
      'id_trial'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTrial'), 'add_empty' => true)),
      'id_crop'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'usdwtype'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'usdwfile'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'usdwdate'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'usdwsize'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_trial'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbTrial'), 'column' => 'id_trial')),
      'id_crop'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'usdwtype'    => new sfValidatorPass(array('required' => false)),
      'usdwfile'    => new sfValidatorPass(array('required' => false)),
      'usdwdate'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'usdwsize'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_downloads_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserDownloads';
  }

  public function getFields()
  {
    return array(
      'id_download' => 'Number',
      'user_id'     => 'Number',
      'id_trial'    => 'ForeignKey',
      'id_crop'     => 'Number',
      'usdwtype'    => 'Text',
      'usdwfile'    => 'Text',
      'usdwdate'    => 'Date',
      'usdwsize'    => 'Number',
    );
  }
}

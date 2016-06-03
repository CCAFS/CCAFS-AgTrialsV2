<?php

/**
 * TbAdministrativedivisiontype filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbAdministrativedivisiontypeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'dmdvtpnombre'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'dmdvtpnombre'                  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_administrativedivisiontype_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbAdministrativedivisiontype';
  }

  public function getFields()
  {
    return array(
      'id_administrativedivisiontype' => 'Number',
      'dmdvtpnombre'                  => 'Text',
    );
  }
}

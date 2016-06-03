<?php

/**
 * TbAdministrativedivision filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbAdministrativedivisionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_administrativedivisiontype' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbAdministrativedivisiontype'), 'add_empty' => true)),
      'id_parent'                     => new sfWidgetFormFilterInput(),
      'dmdvname'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dmdviso'                       => new sfWidgetFormFilterInput(),
      'created_at'                    => new sfWidgetFormFilterInput(),
      'updated_at'                    => new sfWidgetFormFilterInput(),
      'id_user'                       => new sfWidgetFormFilterInput(),
      'id_user_update'                => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_administrativedivisiontype' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbAdministrativedivisiontype'), 'column' => 'id_administrativedivisiontype')),
      'id_parent'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dmdvname'                      => new sfValidatorPass(array('required' => false)),
      'dmdviso'                       => new sfValidatorPass(array('required' => false)),
      'created_at'                    => new sfValidatorPass(array('required' => false)),
      'updated_at'                    => new sfValidatorPass(array('required' => false)),
      'id_user'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_user_update'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tb_administrativedivision_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbAdministrativedivision';
  }

  public function getFields()
  {
    return array(
      'id_administrativedivision'     => 'Number',
      'id_administrativedivisiontype' => 'ForeignKey',
      'id_parent'                     => 'Number',
      'dmdvname'                      => 'Text',
      'dmdviso'                       => 'Text',
      'created_at'                    => 'Text',
      'updated_at'                    => 'Text',
      'id_user'                       => 'Number',
      'id_user_update'                => 'Number',
    );
  }
}

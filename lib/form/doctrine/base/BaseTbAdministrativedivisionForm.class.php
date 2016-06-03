<?php

/**
 * TbAdministrativedivision form base class.
 *
 * @method TbAdministrativedivision getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbAdministrativedivisionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_administrativedivision'     => new sfWidgetFormInputHidden(),
      'id_administrativedivisiontype' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbAdministrativedivisiontype'), 'add_empty' => false)),
      'id_parent'                     => new sfWidgetFormInputText(),
      'dmdvname'                      => new sfWidgetFormTextarea(),
      'dmdviso'                       => new sfWidgetFormTextarea(),
      'created_at'                    => new sfWidgetFormTime(),
      'updated_at'                    => new sfWidgetFormTime(),
      'id_user'                       => new sfWidgetFormInputText(),
      'id_user_update'                => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_administrativedivision'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_administrativedivision')), 'empty_value' => $this->getObject()->get('id_administrativedivision'), 'required' => false)),
      'id_administrativedivisiontype' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbAdministrativedivisiontype'))),
      'id_parent'                     => new sfValidatorInteger(array('required' => false)),
      'dmdvname'                      => new sfValidatorString(),
      'dmdviso'                       => new sfValidatorString(array('required' => false)),
      'created_at'                    => new sfValidatorTime(array('required' => false)),
      'updated_at'                    => new sfValidatorTime(array('required' => false)),
      'id_user'                       => new sfValidatorInteger(array('required' => false)),
      'id_user_update'                => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_administrativedivision[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbAdministrativedivision';
  }

}

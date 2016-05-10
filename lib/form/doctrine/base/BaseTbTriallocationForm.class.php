<?php

/**
 * TbTriallocation form base class.
 *
 * @method TbTriallocation getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbTriallocationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_triallocation' => new sfWidgetFormInputHidden(),
      'trlcname'         => new sfWidgetFormTextarea(),
      'trlclatitude'     => new sfWidgetFormInputText(),
      'trlclongitude'    => new sfWidgetFormInputText(),
      'trlcaltitude'     => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'id_user'          => new sfWidgetFormInputText(),
      'id_user_update'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_triallocation' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_triallocation')), 'empty_value' => $this->getObject()->get('id_triallocation'), 'required' => false)),
      'trlcname'         => new sfValidatorString(array('required' => false)),
      'trlclatitude'     => new sfValidatorNumber(array('required' => false)),
      'trlclongitude'    => new sfValidatorNumber(array('required' => false)),
      'trlcaltitude'     => new sfValidatorNumber(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(array('required' => false)),
      'updated_at'       => new sfValidatorDateTime(array('required' => false)),
      'id_user'          => new sfValidatorInteger(array('required' => false)),
      'id_user_update'   => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_triallocation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbTriallocation';
  }

}

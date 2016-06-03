<?php

/**
 * sfGuardUserDownloads form base class.
 *
 * @method sfGuardUserDownloads getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserDownloadsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_download' => new sfWidgetFormInputHidden(),
      'user_id'     => new sfWidgetFormInputText(),
      'id_trial'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTrial'), 'add_empty' => false)),
      'id_crop'     => new sfWidgetFormInputText(),
      'usdwtype'    => new sfWidgetFormTextarea(),
      'usdwfile'    => new sfWidgetFormTextarea(),
      'usdwdate'    => new sfWidgetFormDateTime(),
      'usdwsize'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_download' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_download')), 'empty_value' => $this->getObject()->get('id_download'), 'required' => false)),
      'user_id'     => new sfValidatorInteger(array('required' => false)),
      'id_trial'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbTrial'))),
      'id_crop'     => new sfValidatorInteger(),
      'usdwtype'    => new sfValidatorString(),
      'usdwfile'    => new sfValidatorString(),
      'usdwdate'    => new sfValidatorDateTime(),
      'usdwsize'    => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_downloads[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserDownloads';
  }

}

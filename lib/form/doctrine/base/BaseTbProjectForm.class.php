<?php

/**
 * TbProject form base class.
 *
 * @method TbProject getObject() Returns the current form's model object
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTbProjectForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_project'                            => new sfWidgetFormInputHidden(),
      'prjname'                               => new sfWidgetFormTextarea(),
      'id_leadofproject'                      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbContactperson'), 'add_empty' => true)),
      'id_projectimplementinginstitutions'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbInstitution'), 'add_empty' => true)),
      'prjprojectimplementingperiodstartdate' => new sfWidgetFormDate(),
      'prjprojectimplementingperiodenddate'   => new sfWidgetFormDate(),
      'id_donor'                              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbDonor'), 'add_empty' => true)),
      'prjabstract'                           => new sfWidgetFormTextarea(),
      'prjkeywords'                           => new sfWidgetFormTextarea(),
      'created_at'                            => new sfWidgetFormDateTime(),
      'updated_at'                            => new sfWidgetFormDateTime(),
      'id_user'                               => new sfWidgetFormInputText(),
      'id_user_update'                        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_project'                            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_project')), 'empty_value' => $this->getObject()->get('id_project'), 'required' => false)),
      'prjname'                               => new sfValidatorString(array('required' => false)),
      'id_leadofproject'                      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbContactperson'), 'required' => false)),
      'id_projectimplementinginstitutions'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbInstitution'), 'required' => false)),
      'prjprojectimplementingperiodstartdate' => new sfValidatorDate(array('required' => false)),
      'prjprojectimplementingperiodenddate'   => new sfValidatorDate(array('required' => false)),
      'id_donor'                              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbDonor'), 'required' => false)),
      'prjabstract'                           => new sfValidatorString(array('required' => false)),
      'prjkeywords'                           => new sfValidatorString(array('required' => false)),
      'created_at'                            => new sfValidatorDateTime(array('required' => false)),
      'updated_at'                            => new sfValidatorDateTime(array('required' => false)),
      'id_user'                               => new sfValidatorInteger(array('required' => false)),
      'id_user_update'                        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tb_project[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbProject';
  }

}

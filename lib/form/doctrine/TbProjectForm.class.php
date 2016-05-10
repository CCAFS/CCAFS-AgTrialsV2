<?php

/**
 * TbProject form.
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbProjectForm extends BaseTbProjectForm {

    public function configure() {
        $this->setWidgets(array(
            'id_project' => new sfWidgetFormInputHidden(),
            'prjname' => new sfWidgetFormInputText(),
            'id_leadofproject' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbContactperson'), 'add_empty' => true, 'order_by' => array('cnprfirstname', 'asc'))),
            'id_projectimplementinginstitutions' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbInstitution'), 'add_empty' => true, 'order_by' => array('insname', 'asc'))),
            'prjprojectimplementingperiodstartdate' => new sfWidgetFormInputText(),
            'prjprojectimplementingperiodenddate' => new sfWidgetFormInputText(),
            'id_donor' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbDonor'), 'add_empty' => true, 'order_by' => array('dnrname', 'asc'))),
            'prjabstract' => new sfWidgetFormTextarea(),
            'prjkeywords' => new sfWidgetFormTextarea(),
        ));

        $this->setValidators(array(
            'id_project' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_project')), 'empty_value' => $this->getObject()->get('id_project'), 'required' => false)),
            'prjname' => new sfValidatorString(array('required' => false)),
            'id_leadofproject' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbContactperson'), 'required' => false)),
            'id_projectimplementinginstitutions' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbInstitution'), 'required' => false)),
            'prjprojectimplementingperiodstartdate' => new sfValidatorString(array('required' => false)),
            'prjprojectimplementingperiodenddate' => new sfValidatorString(array('required' => false)),
            'id_donor' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbDonor'), 'required' => false)),
            'prjabstract' => new sfValidatorString(array('required' => false)),
            'prjkeywords' => new sfValidatorString(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('tb_project[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

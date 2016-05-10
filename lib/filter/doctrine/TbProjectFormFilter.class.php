<?php

/**
 * TbProject filter form.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbProjectFormFilter extends BaseTbProjectFormFilter {

    public function configure() {
        $this->setWidgets(array(
            'prjname' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'id_leadofproject' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbContactperson'), 'add_empty' => true)),
            'id_projectimplementinginstitutions' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbInstitution'), 'add_empty' => true)),
            'id_donor' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbDonor'), 'add_empty' => true)),
            'prjabstract' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'prjkeywords' => new sfWidgetFormFilterInput(array('with_empty' => false)),
        ));

        $this->setValidators(array(
            'prjname' => new sfValidatorPass(array('required' => false)),
            'id_leadofproject' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbContactperson'), 'column' => 'id_contactperson')),
            'id_projectimplementinginstitutions' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbInstitution'), 'column' => 'id_institution')),
            'id_donor' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbDonor'), 'column' => 'id_donor')),
            'prjabstract' => new sfValidatorPass(array('required' => false)),
            'prjkeywords' => new sfValidatorPass(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('tb_project_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

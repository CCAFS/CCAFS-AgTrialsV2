<?php

/**
 * TbContactperson filter form.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbContactpersonFormFilter extends BaseTbContactpersonFormFilter {

    public function configure() {
        $this->setWidgets(array(
            'cnprfirstname' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'cnprmiddlename' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'cnprlastname' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'id_institution' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbInstitution'), 'add_empty' => true)),
            'cnpremail' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'cnprtelephone' => new sfWidgetFormFilterInput(array('with_empty' => false)),
        ));

        $this->setValidators(array(
            'cnprfirstname' => new sfValidatorPass(array('required' => false)),
            'cnprmiddlename' => new sfValidatorPass(array('required' => false)),
            'cnprlastname' => new sfValidatorPass(array('required' => false)),
            'id_institution' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbInstitution'), 'column' => 'id_institution')),
            'cnpremail' => new sfValidatorPass(array('required' => false)),
            'cnprtelephone' => new sfValidatorPass(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('tb_contactperson_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

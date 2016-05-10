<?php

/**
 * TbInstitution form.
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbInstitutionForm extends BaseTbInstitutionForm {

    public function configure() {
        $this->setWidgets(array(
            'id_institution' => new sfWidgetFormInputHidden(),
            'insname' => new sfWidgetFormInputText(),
            'id_country' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'id_institution' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_institution')), 'empty_value' => $this->getObject()->get('id_institution'), 'required' => false)),
            'insname' => new sfValidatorString(array('required' => false)),
            'id_country' => new sfValidatorString(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('tb_institution[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

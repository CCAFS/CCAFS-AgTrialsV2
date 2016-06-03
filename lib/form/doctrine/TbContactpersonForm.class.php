<?php

/**
 * TbContactperson form.
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbContactpersonForm extends BaseTbContactpersonForm {

    public function configure() {
        $this->setWidgets(array(
            'id_contactperson' => new sfWidgetFormInputHidden(),
            'cnprfirstname' => new sfWidgetFormInputText(),
            'cnprmiddlename' => new sfWidgetFormInputText(),
            'cnprlastname' => new sfWidgetFormInputText(),
            'id_institution' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbInstitution'), 'add_empty' => true)),
            'cnpremail' => new sfWidgetFormInputText(),
            'cnprtelephone' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'id_contactperson' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_contactperson')), 'empty_value' => $this->getObject()->get('id_contactperson'), 'required' => false)),
            'cnprfirstname' => new sfValidatorString(array('required' => false)),
            'cnprmiddlename' => new sfValidatorString(array('required' => false)),
            'cnprlastname' => new sfValidatorString(array('required' => false)),
            'id_institution' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbInstitution'), 'required' => false)),
            'cnpremail' => new sfValidatorString(array('required' => false)),
            'cnprtelephone' => new sfValidatorString(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('tb_contactperson[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

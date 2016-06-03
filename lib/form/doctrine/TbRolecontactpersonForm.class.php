<?php

/**
 * TbRolecontactperson form.
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbRolecontactpersonForm extends BaseTbRolecontactpersonForm {

    public function configure() {
        $this->setWidgets(array(
            'id_rolecontactperson' => new sfWidgetFormInputHidden(),
            'rcpname' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'id_rolecontactperson' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_rolecontactperson')), 'empty_value' => $this->getObject()->get('id_rolecontactperson'), 'required' => false)),
            'rcpname' => new sfValidatorString(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('tb_rolecontactperson[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

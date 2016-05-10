<?php

/**
 * TbExperimentaldesign form.
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbExperimentaldesignForm extends BaseTbExperimentaldesignForm {

    public function configure() {
        $this->setWidgets(array(
            'id_experimentaldesign' => new sfWidgetFormInputHidden(),
            'xpdsname' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'id_experimentaldesign' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_experimentaldesign')), 'empty_value' => $this->getObject()->get('id_experimentaldesign'), 'required' => false)),
            'xpdsname' => new sfValidatorString(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('tb_experimentaldesign[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

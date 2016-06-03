<?php

/**
 * TbVariety form.
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbVarietyForm extends BaseTbVarietyForm {

    public function configure() {
        $this->setWidgets(array(
            'id_variety' => new sfWidgetFormInputHidden(),
            'id_crop' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCrop'), 'add_empty' => true, 'order_by' => array('crpname', 'asc'))),
            'vrtorigin' => new sfWidgetFormInputText(),
            'vrtname' => new sfWidgetFormInputText(),
            'vrtsynonymous' => new sfWidgetFormInputText(),
            'vrtdescription' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'id_variety' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_variety')), 'empty_value' => $this->getObject()->get('id_variety'), 'required' => false)),
            'id_crop' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCrop'))),
            'vrtorigin' => new sfValidatorString(array('required' => false)),
            'vrtname' => new sfValidatorString(),
            'vrtsynonymous' => new sfValidatorString(array('required' => false)),
            'vrtdescription' => new sfValidatorString(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('tb_variety[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

<?php

/**
 * TbVariablesmeasured form.
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbVariablesmeasuredForm extends BaseTbVariablesmeasuredForm {

    public function configure() {
        $this->setWidgets(array(
            'id_variablesmeasured' => new sfWidgetFormInputHidden(),
            'id_crop' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCrop'), 'add_empty' => true, 'order_by' => array('crpname', 'asc'))),
            'id_traitclass' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTraitclass'), 'add_empty' => true, 'order_by' => array('trclname', 'asc'))),
            'vrmsname' => new sfWidgetFormInputText(),
            'vrmsshortname' => new sfWidgetFormInputText(),
            'vrmsdefinition' => new sfWidgetFormInputText(),
            'vrmnmethod' => new sfWidgetFormInputText(),
            'vrmsunit' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'id_variablesmeasured' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_variablesmeasured')), 'empty_value' => $this->getObject()->get('id_variablesmeasured'), 'required' => false)),
            'id_crop' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbCrop'))),
            'id_traitclass' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbTraitclass'))),
            'vrmsname' => new sfValidatorString(),
            'vrmsshortname' => new sfValidatorString(array('required' => false)),
            'vrmsdefinition' => new sfValidatorString(array('required' => false)),
            'vrmnmethod' => new sfValidatorString(array('required' => false)),
            'vrmsunit' => new sfValidatorString(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('tb_variablesmeasured[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

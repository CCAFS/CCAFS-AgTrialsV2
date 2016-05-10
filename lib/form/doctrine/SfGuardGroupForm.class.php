<?php

/**
 * SfGuardGroup form.
 *
 * @package    trialsites
 * @subpackage form
 * @author     Herlin R. Espinosa G. - CIAT-DAPA
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SfGuardGroupForm extends BaseSfGuardGroupForm {

    public function configure() {
        $this->setWidgets(array(
            'id' => new sfWidgetFormInputHidden(),
            'name' => new sfWidgetFormInputText(),
            'description' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
            'name' => new sfValidatorString(array('required' => false)),
            'description' => new sfValidatorString(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('sf_guard_group[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

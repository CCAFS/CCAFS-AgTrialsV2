<?php

/**
 * TbDonor form.
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbDonorForm extends BaseTbDonorForm {

    public function configure() {
        $this->setWidgets(array(
            'id_donor' => new sfWidgetFormInputHidden(),
            'dnrname' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'id_donor' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_donor')), 'empty_value' => $this->getObject()->get('id_donor'), 'required' => false)),
            'dnrname' => new sfValidatorString(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('tb_donor[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

<?php

/**
 * TbTriallocation form.
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbTriallocationForm extends BaseTbTriallocationForm {

    public function configure() {
        $this->setWidgets(array(
            'id_triallocation' => new sfWidgetFormInputHidden(),
            'trlcname' => new sfWidgetFormInputText(array(), array('size' => 48)),
            'trlclatitude' => new sfWidgetFormInputText(),
            'trlclongitude' => new sfWidgetFormInputText(),
            'trlcaltitude' => new sfWidgetFormInputText(),
            'location' => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
            'id_triallocation' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_triallocation')), 'empty_value' => $this->getObject()->get('id_triallocation'), 'required' => false)),
            'trlcname' => new sfValidatorString(array('required' => false)),
            'trlclatitude' => new sfValidatorNumber(array('required' => false)),
            'trlclongitude' => new sfValidatorNumber(array('required' => false)),
            'trlcaltitude' => new sfValidatorNumber(array('required' => false)),
            'location' => new sfValidatorNumber(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('tb_triallocation[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

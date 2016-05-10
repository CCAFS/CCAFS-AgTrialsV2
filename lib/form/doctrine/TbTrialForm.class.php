<?php

/**
 * TbTrial form.
 *
 * @package    AgTrials
 * @subpackage form
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbTrialForm extends BaseTbTrialForm {

    public function configure() {
        $this->setWidgets(array(
            'id_trial' => new sfWidgetFormInputHidden(),
            'id_project' => new sfWidgetFormTextarea(),
            'id_contactperson' => new sfWidgetFormTextarea(),
            'id_rolecontactperson' => new sfWidgetFormTextarea(),
            'trlimplementingperiodstartdate' => new sfWidgetFormDateTime(),
            'trlimplementingperiodenddate' => new sfWidgetFormDateTime(),
            'id_triallocation' => new sfWidgetFormTextarea(),
            'trltrialname' => new sfWidgetFormTextarea(),
            'trltrialobjectives' => new sfWidgetFormTextarea(),
            'trltriallicense' => new sfWidgetFormTextarea(),
            'trltrialpermissions' => new sfWidgetFormTextarea(),
        ));

        $this->setValidators(array(
            'id_trial' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_trial')), 'empty_value' => $this->getObject()->get('id_trial'), 'required' => false)),
            'id_project' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbProject'), 'required' => false)),
            'id_contactperson' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbContactperson'), 'required' => false)),
            'id_rolecontactperson' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbRolecontactperson'), 'required' => false)),
            'trlimplementingperiodstartdate' => new sfValidatorDateTime(array('required' => false)),
            'trlimplementingperiodenddate' => new sfValidatorDateTime(array('required' => false)),
            'id_triallocation' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TbTriallocation'), 'required' => false)),
            'trltrialname' => new sfValidatorString(array('required' => false)),
            'trltrialobjectives' => new sfValidatorString(array('required' => false)),
            'trltriallicense' => new sfValidatorString(array('required' => false)),
            'trltrialpermissions' => new sfValidatorString(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('tb_trial[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

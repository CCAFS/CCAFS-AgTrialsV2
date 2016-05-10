<?php

/**
 * TbVariablesmeasured filter form.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbVariablesmeasuredFormFilter extends BaseTbVariablesmeasuredFormFilter {

    public function configure() {
        $this->setWidgets(array(
            'id_crop' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCrop'), 'add_empty' => true)),
            'id_traitclass' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbTraitclass'), 'add_empty' => true)),
            'vrmsname' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'vrmsshortname' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'vrmsdefinition' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'vrmnmethod' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'vrmsunit' => new sfWidgetFormFilterInput(array('with_empty' => false)),
        ));

        $this->setValidators(array(
            'id_crop' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCrop'), 'column' => 'id_crop')),
            'id_traitclass' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbTraitclass'), 'column' => 'id_traitclass')),
            'vrmsname' => new sfValidatorPass(array('required' => false)),
            'vrmsshortname' => new sfValidatorPass(array('required' => false)),
            'vrmsdefinition' => new sfValidatorPass(array('required' => false)),
            'vrmnmethod' => new sfValidatorPass(array('required' => false)),
            'vrmsunit' => new sfValidatorPass(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('tb_variablesmeasured_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

<?php

/**
 * TbVariety filter form.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbVarietyFormFilter extends BaseTbVarietyFormFilter {

    public function configure() {
        $this->setWidgets(array(
            'id_crop' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCrop'), 'add_empty' => true)),
            'vrtorigin' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'vrtname' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'vrtsynonymous' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'vrtdescription' => new sfWidgetFormFilterInput(array('with_empty' => false)),
        ));

        $this->setValidators(array(
            'id_crop' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCrop'), 'column' => 'id_crop')),
            'vrtorigin' => new sfValidatorPass(array('required' => false)),
            'vrtname' => new sfValidatorPass(array('required' => false)),
            'vrtsynonymous' => new sfValidatorPass(array('required' => false)),
            'vrtdescription' => new sfValidatorPass(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('tb_variety_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

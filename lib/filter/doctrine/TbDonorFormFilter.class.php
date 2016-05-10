<?php

/**
 * TbDonor filter form.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbDonorFormFilter extends BaseTbDonorFormFilter {

    public function configure() {
        $this->setWidgets(array(
            'dnrname' => new sfWidgetFormFilterInput(array('with_empty' => false)),
        ));

        $this->setValidators(array(
            'dnrname' => new sfValidatorPass(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('tb_donor_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

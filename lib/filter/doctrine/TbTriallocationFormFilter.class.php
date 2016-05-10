<?php

/**
 * TbTriallocation filter form.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TbTriallocationFormFilter extends BaseTbTriallocationFormFilter {

    public function configure() {
        $this->setWidgets(array(
            'trlcname' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'trlclatitude' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'trlclongitude' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'trlcaltitude' => new sfWidgetFormFilterInput(array('with_empty' => false)),
        ));

        $this->setValidators(array(
            'trlcname' => new sfValidatorPass(array('required' => false)),
            'trlclatitude' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
            'trlclongitude' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
            'trlcaltitude' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
        ));

        $this->widgetSchema->setNameFormat('tb_triallocation_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

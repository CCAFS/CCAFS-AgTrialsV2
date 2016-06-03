<?php

/**
 * sfGuardUser filter form.
 *
 * @package    trialsites
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - CIAT-DAPA
 * @version    SVN: $Id: sfDoctrinePluginFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserFormFilter extends PluginsfGuardUserFormFilter {

    public function configure() {
        $this->setWidgets(array(
            'first_name' => new sfWidgetFormFilterInput(),
            'last_name' => new sfWidgetFormFilterInput(),
            'email_address' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'username' => new sfWidgetFormFilterInput(array('with_empty' => false)),
            'is_active' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
            'permissions_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission')),
        ));

        $this->setValidators(array(
            'first_name' => new sfValidatorPass(array('required' => false)),
            'last_name' => new sfValidatorPass(array('required' => false)),
            'email_address' => new sfValidatorPass(array('required' => false)),
            'username' => new sfValidatorPass(array('required' => false)),
            'is_active' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
            'permissions_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission', 'required' => false)),
        ));

        $this->widgetSchema->setNameFormat('sf_guard_user_filters[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

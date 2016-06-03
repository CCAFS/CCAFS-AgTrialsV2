<?php

/**
 * sfGuardUser form.
 *
 * @package    trialsites
 * @subpackage form
 * @author     Herlin R. Espinosa G. - CIAT-DAPA
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm {

    public function configure() {
        $this->setWidgets(array(
            'first_name' => new sfWidgetFormInputText(),
            'last_name' => new sfWidgetFormInputText(),
            'email_address' => new sfWidgetFormTextarea(),
            'username' => new sfWidgetFormTextarea(),
            'algorithm' => new sfWidgetFormTextarea(),
            'salt' => new sfWidgetFormTextarea(),
            'password' => new sfWidgetFormTextarea(),
            'is_active' => new sfWidgetFormInputCheckbox(),
            'is_super_admin' => new sfWidgetFormInputCheckbox(),
            'last_login' => new sfWidgetFormDateTime(),
            'id' => new sfWidgetFormInputHidden(),
            'created_at' => new sfWidgetFormDateTime(),
            'updated_at' => new sfWidgetFormDateTime(),
            'groups_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardGroup')),
            'permissions_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission')),
        ));

        $this->setValidators(array(
            'first_name' => new sfValidatorString(array('required' => false)),
            'last_name' => new sfValidatorString(array('required' => false)),
            'email_address' => new sfValidatorString(),
            'username' => new sfValidatorString(),
            'algorithm' => new sfValidatorString(array('required' => false)),
            'salt' => new sfValidatorString(array('required' => false)),
            'password' => new sfValidatorString(array('required' => false)),
            'is_active' => new sfValidatorBoolean(array('required' => false)),
            'is_super_admin' => new sfValidatorBoolean(array('required' => false)),
            'last_login' => new sfValidatorDateTime(array('required' => false)),
            'id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
            'created_at' => new sfValidatorDateTime(),
            'updated_at' => new sfValidatorDateTime(),
            'groups_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardGroup', 'required' => false)),
            'permissions_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission', 'required' => false)),
        ));

        $this->validatorSchema->setPostValidator(
                new sfValidatorAnd(array(
            new sfValidatorDoctrineUnique(array('model' => 'sfGuardUser', 'column' => array('email_address'))),
            new sfValidatorDoctrineUnique(array('model' => 'sfGuardUser', 'column' => array('username'))),
                ))
        );

        $this->widgetSchema->setNameFormat('sf_guard_user[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        $this->setupInheritance();
    }

}

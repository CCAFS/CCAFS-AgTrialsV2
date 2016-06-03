<?php

/**
 * TbTrial
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    AgTrials
 * @subpackage model
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TbTrial extends BaseTbTrial {

    public function __toString() {
        return $this->getTrlname();
    }

    //INICIO FUNCION PARA GRABAR O ACTUALIZAR
    public function save(Doctrine_Connection $conn = null) {

        //REGISTRO DE USUARIO DE CREACION O ACTUALIZACION
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        $NowDate = date("Y-m-d") . " " . date("H:i:s");
        if ($this->isNew()) {
            $this->setIdUser($id_user);
            $this->setCreatedAt($NowDate);
        } else {
            $this->setIdUserUpdate($id_user);
            $this->setUpdatedAt($NowDate);
        }
        return parent::save($conn);
    }

//    //CONFIGURACION PARA GUARDAR CREATE AT Y UPDATE AT
//    public function setUp() {
//        parent::setUp();
//        $this->hasOne('TbFieldnamenumber', array(
//            'local' => 'id_fieldnamenumber',
//            'foreign' => 'id_fieldnamenumber'));
//
//        $this->hasOne('TbTrialsite', array(
//            'local' => 'id_trialsite',
//            'foreign' => 'id_trialsite'));
//
//        $this->hasOne('TbTrialgroup', array(
//            'local' => 'id_trialgroup',
//            'foreign' => 'id_trialgroup'));
//
//        $this->hasOne('TbCrop', array(
//            'local' => 'id_crop',
//            'foreign' => 'id_crop'));
//
//        $this->hasOne('TbCountry', array(
//            'local' => 'id_country',
//            'foreign' => 'id_country'));
//
//        $this->hasOne('TbContactperson', array(
//            'local' => 'id_contactperson',
//            'foreign' => 'id_contactperson'));
//
//        $this->hasMany('TbTrialvariablesmeasured', array(
//            'local' => 'id_trial',
//            'foreign' => 'id_trial'));
//
//        $this->hasMany('TbTrialvariety', array(
//            'local' => 'id_trial',
//            'foreign' => 'id_trial'));
//
//        $timestampable0 = new Doctrine_Template_Timestampable(array());
//        $this->actAs($timestampable0);
//    }
}

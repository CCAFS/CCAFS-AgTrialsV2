<?php

class TbTrialpermissionuserTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('TbTrialpermissionuser');
    }

    public static function addTrialpermissionuser($id_trial, $id_userpermission) {
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        $NowDate = date("Y-m-d") . " " . date("H:i:s");
        $QUERY00 = Doctrine_Query::create()
                ->from("TbTrialpermissionuser")
                ->where("id_trial = $id_trial AND id_userpermission = $id_userpermission");
        $Resultado00 = $QUERY00->execute();
        foreach ($Resultado00 AS $fila) {
            $id_trialpermissionuser = $fila['id_trialpermissionuser'];
            break;
        }
        if ($id_trialpermissionuser == '') {
            $TbTrialpermissionuser = new TbTrialpermissionuser();
            $TbTrialpermissionuser->setIdTrial($id_trial);
            $TbTrialpermissionuser->setIdUserpermission($id_userpermission);
            $TbTrialpermissionuser->setIdUser($id_user);
            $TbTrialpermissionuser->setCreatedAt($NowDate);
            $TbTrialpermissionuser->save();
        }
    }

    public static function delTrialpermissionuser($id_trial) {
        $q = Doctrine_Query::create()
                ->delete()
                ->from('TbTrialpermissionuser T')
                ->where('T.id_trial = ?', $id_trial);
        $q->execute();
    }

}

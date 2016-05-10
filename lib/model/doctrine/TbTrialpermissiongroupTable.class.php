<?php

class TbTrialpermissiongroupTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('TbTrialpermissiongroup');
    }

    public static function addTrialpermissiongroup($id_trial, $id_grouppermission) {
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        $NowDate = date("Y-m-d") . " " . date("H:i:s");
        $QUERY00 = Doctrine_Query::create()
                ->from("TbTrialpermissiongroup")
                ->where("id_trial = $id_trial AND id_grouppermission = $id_grouppermission");
        $Resultado00 = $QUERY00->execute();
        foreach ($Resultado00 AS $fila) {
            $id_trialpermissiongroup = $fila['id_trialpermissiongroup'];
            break;
        }
        if ($id_trialpermissiongroup == '') {
            $TbTrialpermissiongroup = new TbTrialpermissiongroup();
            $TbTrialpermissiongroup->setIdTrial($id_trial);
            $TbTrialpermissiongroup->setIdGrouppermission($id_grouppermission);
            $TbTrialpermissiongroup->setIdUser($id_user);
            $TbTrialpermissiongroup->setCreatedAt($NowDate);
            $TbTrialpermissiongroup->save();
        }
    }

    public static function delTrialpermissiongroup($id_trial) {
        $q = Doctrine_Query::create()
                ->delete()
                ->from('TbTrialpermissiongroup T')
                ->where('T.id_trial = ?', $id_trial);
        $q->execute();
    }

}

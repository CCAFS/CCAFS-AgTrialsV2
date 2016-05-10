<?php

class TbAdministrativedivisionTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('TbAdministrativedivision');
    }

    public static function addAdministrativedivision($id_administrativedivisiontype, $id_parent, $dmdvname, $dmdviso) {
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        $NowDate = date("Y-m-d") . " " . date("H:i:s");
        $QUERY00 = Doctrine_Query::create()
                ->from("TbAdministrativedivision")
                ->where("dmdvname = '$dmdvname' AND id_parent = $id_parent AND id_administrativedivisiontype = $id_administrativedivisiontype");
        $Resultado00 = $QUERY00->execute();
        foreach ($Resultado00 AS $fila) {
            $id_administrativedivision = $fila['id_administrativedivision'];
            break;
        }
        if ($id_administrativedivision == '') {
            $TbAdministrativedivision = new TbAdministrativedivision();
            $TbAdministrativedivision->setIdAdministrativedivisiontype($id_administrativedivisiontype);
            if ($id_parent != '')
                $TbAdministrativedivision->setIdParent($id_parent);
            $TbAdministrativedivision->setDmdvname($dmdvname);
            if ($dmdviso != '')
                $TbAdministrativedivision->setDmdviso($dmdviso);
            $TbAdministrativedivision->setIdUser($id_user);
            $TbAdministrativedivision->setCreatedAt($NowDate);
            $TbAdministrativedivision->save();

            $QUERY00 = Doctrine_Query::create()
                    ->from("TbAdministrativedivision")
                    ->where("dmdvname = '$dmdvname' AND id_parent = $id_parent AND id_administrativedivisiontype = $id_administrativedivisiontype");
            $Resultado00 = $QUERY00->execute();
            foreach ($Resultado00 AS $fila) {
                $id_administrativedivision = $fila['id_administrativedivision'];
                break;
            }
        }
        die($id_administrativedivision);
    }

}

<?php

class TbTriallocationadministrativedivisionTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('TbTriallocationadministrativedivision');
    }

    public static function addTriallocationadministrativedivision($id_triallocation, $id_administrativedivision) {
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        $NowDate = date("Y-m-d") . " " . date("H:i:s");
        $QUERY00 = Doctrine_Query::create()
                ->from("TbTriallocationadministrativedivision")
                ->where("id_triallocation = $id_triallocation AND id_administrativedivision = $id_administrativedivision");
        $Resultado00 = $QUERY00->execute();
        foreach ($Resultado00 AS $fila) {
            $id_triallocationadministrativedivision = $fila['id_triallocationadministrativedivision'];
            break;
        }
        if ($id_triallocationadministrativedivision == '') {
            $TbTriallocationadministrativedivision = new TbTriallocationadministrativedivision();
            $TbTriallocationadministrativedivision->setIdTriallocation($id_triallocation);
            $TbTriallocationadministrativedivision->setIdAdministrativedivision($id_administrativedivision);
            $TbTriallocationadministrativedivision->save();
            $id_triallocationadministrativedivision = $TbTriallocationadministrativedivision->getIdTriallocationadministrativedivision();
        }
        return $id_triallocationadministrativedivision;
    }

}

<?php

class TbTriallocationTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('TbTriallocation');
    }

    public static function addTriallocation($trlcname, $trlclatitude, $trlclongitude, $trlcaltitude) {
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        $NowDate = date("Y-m-d") . " " . date("H:i:s");
        $QUERY00 = Doctrine_Query::create()
                ->from("TbTriallocation")
                ->where("trlcname = '$trlcname' AND trlclatitude = '$trlclatitude' AND trlclongitude = '$trlclongitude' AND trlcaltitude = '$trlcaltitude'");
        $Resultado00 = $QUERY00->execute();
        foreach ($Resultado00 AS $fila) {
            $id_triallocation = $fila['id_triallocation'];
            break;
        }
        if ($id_triallocation == '') {
            $TbTriallocation = new TbTriallocation();
            $TbTriallocation->setTrlcname($trlcname);
            $TbTriallocation->setTrlclatitude($trlclatitude);
            $TbTriallocation->setTrlclongitude($trlclongitude);
            $TbTriallocation->setTrlcaltitude($trlcaltitude);
            $TbTriallocation->setIdUser($id_user);
            $TbTriallocation->setCreatedAt($NowDate);
            $TbTriallocation->save();
            $id_triallocation = $TbTriallocation->getIdTriallocation();
        }
        return $id_triallocation;
    }

}

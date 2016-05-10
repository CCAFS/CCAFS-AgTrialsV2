<?php

class TbDonorTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('TbDonor');
    }

    public static function addDonor($dnrname) {
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        $NowDate = date("Y-m-d") . " " . date("H:i:s");
        $QUERY00 = Doctrine_Query::create()
                ->from("TbDonor")
                ->where("dnrname = '$dnrname'");
        $Resultado00 = $QUERY00->execute();
        foreach ($Resultado00 AS $fila) {
            $id_donor = $fila['id_donor'];
            break;
        }
        if ($id_donor == '') {
            $TbDonor = new TbDonor();
            $TbDonor->setDnrname($dnrname);
            $TbDonor->setIdUser($id_user);
            $TbDonor->setCreatedAt($NowDate);
            $TbDonor->save();
            $id_donor = $TbDonor->getIdDonor();
        }
        return $id_donor;
    }

}

<?php

class TbInstitutionTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('TbInstitution');
    }

    public static function addInstitution($insname, $id_country) {
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        $NowDate = date("Y-m-d") . " " . date("H:i:s");
        $QUERY00 = Doctrine_Query::create()
                ->from("TbInstitution")
                ->where("insname = '$insname' AND id_country = $id_country");
        $Resultado00 = $QUERY00->execute();
        foreach ($Resultado00 AS $fila) {
            $id_institution = $fila['id_institution'];
            break;
        }
        if ($id_institution == '') {
            $TbInstitution = new TbInstitution();
            $TbInstitution->setInsname($insname);
            if ($id_country != '') {
                $TbInstitution->setIdCountry($id_country);
            }
            $TbInstitution->setIdUser($id_user);
            $TbInstitution->setCreatedAt($NowDate);
            $TbInstitution->save();
            $id_institution = $TbInstitution->getIdInstitution();
        }
        return $id_institution;
    }

}

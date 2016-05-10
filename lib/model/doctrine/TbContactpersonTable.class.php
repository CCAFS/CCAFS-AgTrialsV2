<?php

class TbContactpersonTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('TbContactperson');
    }

    public static function addContactperson($cnprfirstname, $cnprmiddlename, $cnprlastname, $id_institution, $cnpremail, $cnprtelephone) {
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        $NowDate = date("Y-m-d") . " " . date("H:i:s");
        $QUERY00 = Doctrine_Query::create()
                ->from("TbContactperson")
                ->where("cnprfirstname = '$cnprfirstname' AND cnprmiddlename = '$cnprmiddlename' AND cnprlastname = '$cnprlastname' AND id_institution = $id_institution AND cnpremail = '$cnpremail' AND cnprtelephone = '$cnprtelephone'");
        $Resultado00 = $QUERY00->execute();
        foreach ($Resultado00 AS $fila) {
            $id_contactperson = $fila['id_contactperson'];
            break;
        }
        if ($id_contactperson == '') {
            $TbContactperson = new TbContactperson();
            $TbContactperson->setCnprfirstname($cnprfirstname);
            $TbContactperson->setCnprmiddlename($cnprmiddlename);
            $TbContactperson->setCnprlastname($cnprlastname);
            $TbContactperson->setIdInstitution($id_institution);
            $TbContactperson->setCnpremail($cnpremail);
            $TbContactperson->setCnprtelephone($cnprtelephone);
            $TbContactperson->setIdUser($id_user);
            $TbContactperson->setCreatedAt($NowDate);
            $TbContactperson->save();
            $id_contactperson = $TbContactperson->getIdContactperson();
        }
        return $id_contactperson;
    }

}

<?php

class TbTrialinfodataTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('TbTrialinfodata');
    }

    public static function addTrialinfodata($id_trialinfo, $trnfdtreplication, $id_variety, $id_variablesmeasured, $trnfdtvalue) {
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        $NowDate = date("Y-m-d") . " " . date("H:i:s");

        $QUERY00 = Doctrine_Query::create()
                ->from("TbTrialinfodata")
                ->where("id_trialinfo = $id_trialinfo AND trnfdtreplication = $trnfdtreplication AND id_variety = $id_variety AND id_variablesmeasured = $id_variablesmeasured");
        $Resultado00 = $QUERY00->execute();
        foreach ($Resultado00 AS $fila) {
            $id_trialinfodata = $fila['id_trialinfodata'];
            break;
        }
        if ($id_trialinfodata == '') {
            $TbTrialinfodata = new TbTrialinfodata();
            $TbTrialinfodata->setIdTrialinfo($id_trialinfo);
            $TbTrialinfodata->setTrnfdtreplication($trnfdtreplication);
            if ($id_variety != '')
                $TbTrialinfodata->setIdVariety($id_variety);
            if ($id_variablesmeasured != '')
                $TbTrialinfodata->setIdVariablesmeasured($id_variablesmeasured);
            if ($trnfdtvalue != '')
                $TbTrialinfodata->setTrnfdtvalue($trnfdtvalue);
            $TbTrialinfodata->setIdUser($id_user);
            $TbTrialinfodata->setCreatedAt($NowDate);
            $TbTrialinfodata->save();
        }
    }

    public static function delTrialinfodata($id_trialinfo) {
        $q = Doctrine_Query::create()
                ->delete()
                ->from('TbTrialinfodata T')
                ->where('T.id_trialinfo = ?', $id_trialinfo);
        $q->execute();
    }

}

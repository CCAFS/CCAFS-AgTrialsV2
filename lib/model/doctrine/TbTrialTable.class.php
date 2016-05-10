<?php

class TbTrialTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('TbTrial');
    }

    public static function addTrial($id_project, $id_contactperson, $id_rolecontactperson, $trlimplementingperiodstartdate, $trlimplementingperiodenddate, $id_triallocation, $trltrialname, $trltrialobjectives, $trltriallicense, $trltrialpermissions) {
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        $NowDate = date("Y-m-d") . " " . date("H:i:s");
        //die("$id_project, $id_contactperson, $id_rolecontactperson, $trlimplementingperiodstartdate, $trlimplementingperiodenddate, $id_triallocation, $trltrialname, $trltrialobjectives, $trltriallicense, $trltrialpermissions");
        
        $TbTrial = new TbTrial();
        $TbTrial->setIdProject($id_project);
        $TbTrial->setIdContactperson($id_contactperson);
        $TbTrial->setIdRolecontactperson($id_rolecontactperson);
        $TbTrial->setTrlimplementingperiodstartdate($trlimplementingperiodstartdate);
        $TbTrial->setTrlimplementingperiodenddate($trlimplementingperiodenddate);
        $TbTrial->setIdTriallocation($id_triallocation);
        $TbTrial->setTrltrialname($trltrialname);
        $TbTrial->setTrltrialobjectives($trltrialobjectives);
        $TbTrial->setTrltriallicense($trltriallicense);
        $TbTrial->setTrltrialpermissions($trltrialpermissions);
        $TbTrial->setIdUser($id_user);
        $TbTrial->setCreatedAt($NowDate);
        $TbTrial->save();
        return $TbTrial->getIdTrial();
    }

}

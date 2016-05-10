<?php

class TbProjectTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('TbProject');
    }

    public static function addProject($prjname, $id_leadofproject, $id_projectimplementinginstitutions, $prjprojectimplementingperiodstartdate, $prjprojectimplementingperiodenddate, $id_donor, $prjabstract, $prjkeywords) {
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        $NowDate = date("Y-m-d") . " " . date("H:i:s");
        $QUERY00 = Doctrine_Query::create()
                ->from("TbProject")
                ->where("prjname = '$prjname' AND id_leadofproject = $id_leadofproject AND id_projectimplementinginstitutions = $id_projectimplementinginstitutions AND prjprojectimplementingperiodstartdate = '$prjprojectimplementingperiodstartdate' AND prjprojectimplementingperiodenddate = '$prjprojectimplementingperiodenddate' AND id_donor = $id_donor");
        //echo $QUERY00->getSqlQuery(); die();
        $Resultado00 = $QUERY00->execute();
        foreach ($Resultado00 AS $fila) {
            $id_project = $fila['id_project'];
            break;
        }
        if ($id_project == '') {
            $TbProject = new TbProject();
            $TbProject->setPrjname($prjname);
            $TbProject->setIdLeadofproject($id_leadofproject);
            $TbProject->setIdProjectimplementinginstitutions($id_projectimplementinginstitutions);
            $TbProject->setPrjprojectimplementingperiodstartdate($prjprojectimplementingperiodstartdate);
            $TbProject->setPrjprojectimplementingperiodenddate($prjprojectimplementingperiodenddate);
            $TbProject->setIdDonor($id_donor);
            $TbProject->setPrjabstract($prjabstract);
            $TbProject->setPrjkeywords($prjkeywords);
            $TbProject->setIdUser($id_user);
            $TbProject->setCreatedAt($NowDate);
            $TbProject->save();
            $id_project = $TbProject->getIdProject();
        }
        return $id_project;
    }

}

<?php

class TbTrialinfoTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('TbTrialinfo');
    }

    public static function addTrialinfo($id_trial, $trnfnumberofreplicates, $id_experimentaldesign, $trnftreatmentnumber, $trnftreatmentnameandcode, $trnfplantingsowingstartdate, $trnfplantingsowingenddate, $trnfphysiologicalmaturitystardate, $trnfphysiologicalmaturityenddate, $trnfharveststartdate, $trnfharvestenddate, $id_crop, $trnfdatafile, $trnfdataorresultsfile, $trnfsuppplementalinformationfile, $trnfweatherdatafile, $trnfsoildatafile) {
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        $NowDate = date("Y-m-d") . " " . date("H:i:s");

        $TbTrialinfo = new TbTrialinfo();
        $TbTrialinfo->setIdTrial($id_trial);
        $TbTrialinfo->setTrnfnumberofreplicates($trnfnumberofreplicates);
        if ($id_experimentaldesign != '')
            $TbTrialinfo->setIdExperimentaldesign($id_experimentaldesign);
        $TbTrialinfo->setTrnftreatmentnumber($trnftreatmentnumber);
        $TbTrialinfo->setTrnftreatmentnameandcode($trnftreatmentnameandcode);
        if ($trnfplantingsowingstartdate != '')
            $TbTrialinfo->setTrnfplantingsowingstartdate($trnfplantingsowingstartdate);
        if ($trnfplantingsowingenddate != '')
            $TbTrialinfo->setTrnfplantingsowingenddate($trnfplantingsowingenddate);
        if ($trnfphysiologicalmaturitystardate != '')
            $TbTrialinfo->setTrnfphysiologicalmaturitystardate($trnfphysiologicalmaturitystardate);
        if ($trnfphysiologicalmaturityenddate != '')
            $TbTrialinfo->setTrnfphysiologicalmaturityenddate($trnfphysiologicalmaturityenddate);
        if ($trnfharveststartdate != '')
            $TbTrialinfo->setTrnfharveststartdate($trnfharveststartdate);
        if ($trnfharvestenddate != '')
            $TbTrialinfo->setTrnfharvestenddate($trnfharvestenddate);
        $TbTrialinfo->setIdCrop($id_crop);
        $TbTrialinfo->setTrnfdatafile($trnfdatafile);
        $TbTrialinfo->setTrnfdataorresultsfile($trnfdataorresultsfile);
        $TbTrialinfo->setTrnfsuppplementalinformationfile($trnfsuppplementalinformationfile);
        $TbTrialinfo->setTrnfweatherdatafile($trnfweatherdatafile);
        $TbTrialinfo->setTrnfsoildatafile($trnfsoildatafile);
        $TbTrialinfo->setIdUser($id_user);
        $TbTrialinfo->setCreatedAt($NowDate);
        $TbTrialinfo->save();
        $id_trialinfo = $TbTrialinfo->getIdTrialinfo();
        return $id_trialinfo;
    }

}

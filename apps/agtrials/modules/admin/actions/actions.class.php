<?php

/*
 *  This file is part of AgTrials
 *
 *  AgTrials is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  at your option) any later version.
 *
 *  AgTrials is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with DMSP.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Copyright 2012 (C) Climate Change, Agriculture and Food Security (CCAFS)
 * 
 * Created on : OCT - 2014
 * @author    :  Herlin R. Espinosa G. - herlin25@gmail.com
 * @version   :  ~
 */

include("../lib/functions/function.php");
include("../lib/PHPMailer/PHPMailer.php");

/**
 * home actions.
 *
 * @package    trialsites
 * @subpackage home
 * @author     Herlin R. Espinosa G. - CIAT-DAPA
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminActions extends sfActions {

    /**
     * Executes Batchuploadanother action
     *
     * @param sfRequest $request A request object
     */
    public function executeBatchuploadanother(sfWebRequest $request) {
        if (isset($_POST['Form'])) {
            $id_user = $this->getUser()->getGuardUser()->getId();
            $TemplateFile = $request->getFiles('TemplateFile');
            $SelectTemplate = $request->getParameter('SelectTemplate');
            if ($SelectTemplate == 'Trial Project Template') {
                UploadTrialProjectTemplate($TemplateFile, $id_user);
            }
            if ($SelectTemplate == 'Trial Location Template') {
                UploadTrialLocationTemplate($TemplateFile, $id_user);
            }
            if ($SelectTemplate == 'Trial Varieties Template') {
                UploadTrialVarietiesTemplate($TemplateFile, $id_user);
            }
            if ($SelectTemplate == 'Trial Variables Measured Template') {
                UploadTrialVariablesMeasuredTemplate($TemplateFile, $id_user);
            }
        }
    }

    public function executeByTechnology(sfWebRequest $request) {
        $connection = Doctrine_Manager::getInstance()->connection();
        $QUERY = "SELECT UPPER(C.crpname) AS label, COUNT(T.id_trial) AS data FROM tb_trial T INNER JOIN tb_trialinfo TI ON T.id_trial = TI.id_trial INNER JOIN tb_crop C ON C.id_crop = TI.id_crop GROUP BY C.crpname ORDER BY 2 DESC LIMIT 10 ";
        $st = $connection->execute($QUERY);
        $Results = $st->fetchAll(PDO::FETCH_ASSOC);
        $ArrLabel = null;
        $ArrData = null;
        $ArrLabel[0] = "";
        $a = 1;
        $b = 0;
        foreach ($Results AS $Valor) {
            $ArrLabel[$a] = $Valor['label'];
            $ArrData[$b] = $Valor['data'];
            $a++;
            $b++;
        }
        $Technology['label'] = $ArrLabel;
        $Technology['data'] = $ArrData;
        $JSONByTechnology = json_encode($Technology);
        die($JSONByTechnology);
    }

    public function executeByCountry(sfWebRequest $request) {
        $connection = Doctrine_Manager::getInstance()->connection();
        $QUERY = "SELECT UPPER(fc_triallocationadministrativedivisionname(TL.id_triallocation ,1)) AS label, COUNT(*) AS data ";
        $QUERY .= "FROM tb_trial T ";
        $QUERY .= "INNER JOIN tb_triallocation TL ON T.id_triallocation = TL.id_triallocation ";
        $QUERY .= "GROUP BY 1 ";
        $QUERY .= "ORDER BY 2 DESC ";
        $QUERY .= "LIMIT 10 ";

        $st = $connection->execute($QUERY);
        $Results = $st->fetchAll(PDO::FETCH_ASSOC);
        $ArrLabel = null;
        $ArrData = null;
        $ArrLabel[0] = "";
        $a = 1;
        $b = 0;
        foreach ($Results AS $Valor) {
            $ArrLabel[$a] = $Valor['label'];
            $ArrData[$b] = $Valor['data'];
            $a++;
            $b++;
        }
        $Country['label'] = $ArrLabel;
        $Country['data'] = $ArrData;
        $JSONByCountry = json_encode($Country);
        die($JSONByCountry);
    }

    public function executeByInstitution(sfWebRequest $request) {
        $connection = Doctrine_Manager::getInstance()->connection();

        $QUERY = "SELECT UPPER(I.insname) AS label, COUNT(*) AS data ";
        $QUERY .= "FROM tb_trial T ";
        $QUERY .= "INNER JOIN tb_project P ON T.id_project = P.id_project ";
        $QUERY .= "INNER JOIN tb_institution I ON P.id_projectimplementinginstitutions = I.id_institution ";
        $QUERY .= "GROUP BY 1 ";
        $QUERY .= "ORDER BY 2 DESC ";
        $QUERY .= "LIMIT 10 ";

        $st = $connection->execute($QUERY);
        $Results = $st->fetchAll(PDO::FETCH_ASSOC);
        $ArrLabel = null;
        $ArrData = null;
        $ArrLabel[0] = "";
        $a = 1;
        $b = 0;
        foreach ($Results AS $Valor) {
            $ArrLabel[$a] = CutString($Valor['label'], 45);
            $ArrData[$b] = $Valor['data'];
            $a++;
            $b++;
        }
        $Institution['label'] = $ArrLabel;
        $Institution['data'] = $ArrData;
        $JSONByInstitution = json_encode($Institution);
        die($JSONByInstitution);
    }

    public function executeByProject(sfWebRequest $request) {
        $connection = Doctrine_Manager::getInstance()->connection();

        $QUERY = "SELECT UPPER(P.prjname) AS label, COUNT(*) AS data ";
        $QUERY .= "FROM tb_trial T ";
        $QUERY .= "INNER JOIN tb_project P ON T.id_project = P.id_project ";
        $QUERY .= "GROUP BY 1 ";
        $QUERY .= "ORDER BY 2 DESC ";
        $QUERY .= "LIMIT 10 ";

        $st = $connection->execute($QUERY);
        $Results = $st->fetchAll(PDO::FETCH_ASSOC);
        $ArrLabel = null;
        $ArrData = null;
        $ArrLabel[0] = "";
        $a = 1;
        $b = 0;
        foreach ($Results AS $Valor) {
            $ArrLabel[$a] = CutString($Valor['label'], 43);
            $ArrData[$b] = $Valor['data'];
            $a++;
            $b++;
        }
        $Project['label'] = $ArrLabel;
        $Project['data'] = $ArrData;
        $JSONByProject = json_encode($Project);
        die($JSONByProject);
    }

    public function executeByTrialLocation(sfWebRequest $request) {
        $connection = Doctrine_Manager::getInstance()->connection();

        $QUERY = "SELECT UPPER((coalesce(fc_triallocationadministrativedivisionname(T.id_triallocation, 1), '')||', '||coalesce( fc_triallocationadministrativedivisionname(T.id_triallocation, 2), '')||', '||TL.trlcname)) AS label, COUNT(*) AS data ";
        $QUERY .= "FROM tb_trial T ";
        $QUERY .= "INNER JOIN tb_triallocation TL ON T.id_triallocation = TL.id_triallocation ";
        $QUERY .= "GROUP BY 1 ";
        $QUERY .= "ORDER BY 2 DESC ";
        $QUERY .= "LIMIT 10 ";

        $st = $connection->execute($QUERY);
        $Results = $st->fetchAll(PDO::FETCH_ASSOC);
        $ArrLabel = null;
        $ArrData = null;
        $ArrLabel[0] = "";
        $a = 1;
        $b = 0;
        foreach ($Results AS $Valor) {
            $ArrLabel[$a] = CutString($Valor['label'], 43);
            $ArrData[$b] = $Valor['data'];
            $a++;
            $b++;
        }
        $TrialLocation['label'] = $ArrLabel;
        $TrialLocation['data'] = $ArrData;
        $JSONByTrialLocation = json_encode($TrialLocation);
        die($JSONByTrialLocation);
    }

    public function executeInfoModuleHelp(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $HelpModule = $request->getParameter('HelpModule');

        $QUERY00 = "SELECT 'Help'||T.flhlmodule||T.id_fieldhelp AS IdHelp, T.flhltexthelp AS TextHelp ";
        $QUERY00 .= "FROM tb_fieldhelp T ";
        $QUERY00 .= "WHERE T.flhlmodule = '$HelpModule' ";
        $QUERY00 .= "AND T.flhltexthelp IS NOT NULL ";
        $st = $connection->execute($QUERY00);
        $Results = $st->fetchAll(PDO::FETCH_ASSOC);
        $JSONByTrialLocation = json_encode($Results);
        die($JSONByTrialLocation);
    }

    public function executeFieldhelp(sfWebRequest $request) {
        
    }

    public function executeLoadFieldsModule(sfWebRequest $request) {
        $connection = Doctrine_Manager::getInstance()->connection();
        $ModuleHelp = $request->getParameter('ModuleHelp');
        $HTML = "";
        if ($ModuleHelp == 'Trial') {

            $INFO = "<thead id='HeadTableResult'>";
            $INFO .= "<tr>";
            $INFO .= "<th class='col-sm-1'>Module</th>";
            $INFO .= "<th class='col-sm-3'>Section</th>";
            $INFO .= "<th class='col-sm-3'>Field</th>";
            $INFO .= "<th style='width: 300px;'>Help text</th>";
            $INFO .= "</tr>";
            $INFO .= "</thead>";

            $QUERY00 = "SELECT  T.id_fieldhelp,T.flhlmodule,T.flhlsession,T.flhlfield,T.flhltexthelp ";
            $QUERY00 .= "FROM tb_fieldhelp T ";
            $QUERY00 .= "WHERE T.flhlmodule = '$ModuleHelp' ";
            $QUERY00 .= "ORDER BY T.id_fieldhelp ";
            $st = $connection->execute($QUERY00);
            $Results = $st->fetchAll(PDO::FETCH_ASSOC);
            $INFO .= "<tbody id='DataResult'>";
            foreach ($Results AS $Valor) {
                $INFO .= "<tr>";
                $INFO .= "<td class='col-sm-1'>{$Valor['flhlmodule']}</td>";
                $INFO .= "<td class='col-sm-3'>{$Valor['flhlsession']}</td>";
                $INFO .= "<td class='col-sm-3'>{$Valor['flhlfield']}</td>";
                $INFO .= "<td style='width: 300px;'><div><textarea rows='1' onfocus='ClearAction({$Valor['id_fieldhelp']});' onchange='SaveFieldHelp({$Valor['id_fieldhelp']});' cols='36' id='texthelp{$Valor['id_fieldhelp']}' class='form-control' type='text'>{$Valor['flhltexthelp']}</textarea></div><div style='color: #2a9a60;' id='Action{$Valor['id_fieldhelp']}'></div></td>";
                $INFO .= "</tr>";
            }
            $INFO .= "</tbody>";
            $HTML = $INFO;
        }

        die($HTML);
    }

    public function executeSaveFieldsModule(sfWebRequest $request) {
        $connection = Doctrine_Manager::getInstance()->connection();
        $id_user = $this->getUser()->getGuardUser()->getId();
        $DateNow = date("Y-m-d") . " " . date("H:i:s");
        $id = $request->getParameter('id');
        $texthelp = $request->getParameter('texthelp');

        $texthelp = str_replace("'", "''", $texthelp);
        $texthelp = trim($texthelp);

        $QUERY00 = "UPDATE tb_fieldhelp SET flhltexthelp = '$texthelp', id_user_update = $id_user, updated_at = '$DateNow' WHERE id_fieldhelp = $id";
        $connection->execute($QUERY00);
        die();
    }

    public function executeModulehelp(sfWebRequest $request) {
        
    }

    public function executeLoadHelpModule(sfWebRequest $request) {
        $connection = Doctrine_Manager::getInstance()->connection();
        $ModuleHelp = $request->getParameter('ModuleHelp');

        $HTML = "<thead id='HeadTableResult'>";
        $HTML .= "<tr>";
        $HTML .= "<th class='col-sm-12'>Help text</th>";
        $HTML .= "</tr>";
        $HTML .= "</thead>";

        $QUERY00 = "SELECT  T.id_modulehelp,T.mdhlmodule,T.mdhltexthelp ";
        $QUERY00 .= "FROM tb_modulehelp T ";
        $QUERY00 .= "WHERE T.mdhlmodule = '$ModuleHelp' ";
        $QUERY00 .= "ORDER BY T.id_modulehelp ";
        $st = $connection->execute($QUERY00);
        $Results = $st->fetchAll(PDO::FETCH_ASSOC);
        $HTML .= "<tbody id='DataResult'>";
        foreach ($Results AS $Valor) {
            $HTML .= "<tr>";
            $HTML .= "<td class='col-sm-12'><div><textarea rows='1' onfocus='ClearAction({$Valor['id_modulehelp']});' onchange='SaveModuleHelp({$Valor['id_modulehelp']});' cols='36' id='texthelp_{$Valor['id_modulehelp']}' class='form-control' type='text'>{$Valor['mdhltexthelp']}</textarea></div><div style='color: #2a9a60;' id='Action{$Valor['id_modulehelp']}'></div></td>";
            $HTML .= "</tr>";
        }
        $HTML .= "</tbody>";

        die($HTML);
    }

    public function executeSaveModuleHelp(sfWebRequest $request) {
        $connection = Doctrine_Manager::getInstance()->connection();
        $id_user = $this->getUser()->getGuardUser()->getId();
        $DateNow = date("Y-m-d") . " " . date("H:i:s");
        $id = $request->getParameter('id');
        $texthelp = $request->getParameter('texthelp');

        $texthelp = str_replace("'", "''", $texthelp);
        $texthelp = trim($texthelp);

        $QUERY00 = "UPDATE tb_modulehelp SET mdhltexthelp = '$texthelp', id_user_update = $id_user, updated_at = '$DateNow' WHERE id_modulehelp = $id";
        $connection->execute($QUERY00);
        die();
    }

    public function executeAgMIP(sfWebRequest $request) {
        //API Url
        $url = 'https://api.agmip.org/cropsitedb/2/query/bulk';

        //Initiate cURL.
        $ch = curl_init($url);

        //The JSON data.
        $jsonData = array('key' => 'CtOqX3NIbBjaD7bt_jGVYk3YUKz3lSJ2kZ50SdnkVM3');

        //Encode the array into JSON.
        $jsonDataEncoded = json_encode($jsonData);

        //Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_POST, 1);

        //Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

        //Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        //Execute the request
        $result = curl_exec($ch);
        
        $arr = json_decode($result);
        print_r($result);

        die("\n\n Hola...");
    }

}

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
        $QUERY = "SELECT C.crpname AS label, COUNT(T.id_trial) AS data FROM tb_trial T INNER JOIN tb_trialinfo TI ON T.id_trial = TI.id_trial INNER JOIN tb_crop C ON C.id_crop = TI.id_crop GROUP BY C.crpname ORDER BY 2 DESC LIMIT 10 ";
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
        $QUERY = "SELECT fc_triallocationadministrativedivisionname(TL.id_triallocation ,1) AS label, COUNT(*) AS data ";
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

}

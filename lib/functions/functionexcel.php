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

//inicio: CREACION DE PLANTILLA DE TRIAL
function CreateTemplateTrial() {
    $connection = Doctrine_Manager::getInstance()->connection();
    $user = sfContext::getInstance()->getUser();
    $id_user = sfContext::getInstance()->getUser()->getGuardUser()->getId();
    $UploadDir = sfConfig::get("sf_upload_dir");
    $tmp_download = $UploadDir . "/tmp$id_user";
    if (!is_dir($tmp_download)) {
        mkdir($tmp_download, 0777);
    }

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()->setCreator("AgTrials")
            ->setLastModifiedBy("AgTrials")
            ->setTitle("AgTrials")
            ->setSubject("AgTrials")
            ->setDescription("AgTrials")
            ->setKeywords("AgTrials")
            ->setCategory("AgTrials");
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Code Trial')
            ->setCellValue('B1', 'Id Project')
            ->setCellValue('C1', 'Id Trial Manager')
            ->setCellValue('D1', 'Id Role Contact Person')
            ->setCellValue('E1', 'Implementing period start date (yyyy-mm-dd)')
            ->setCellValue('F1', 'Implementing periodend date (yyyy-mm-dd)')
            ->setCellValue('G1', 'Id Trial Location')
            ->setCellValue('H1', 'Trial Name')
            ->setCellValue('I1', 'Trial Objectives')
            ->setCellValue('J1', 'Trial License')
            ->setCellValue('K1', 'Access to Information')
            ->setCellValue('L1', 'User or Group Permissions List');

    //DEFINIMOS LA COLUMNA E Y F COMO TEXT
    $objPHPExcel->getActiveSheet()->getStyle('E1:E1000')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
    $objPHPExcel->getActiveSheet()->getStyle('F1:F1000')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

    $objPHPExcel->getActiveSheet()->getStyle('A1:L1')->getFont()->setBold(true);
    for ($col = 'A'; $col != 'M'; $col++) {
        $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
    }
    $objPHPExcel->getActiveSheet()->getTabColor()->setRGB('FF0000');
    $objPHPExcel->getActiveSheet(0)->setTitle('Trial');

    //inicio: GENERAMOS LIBRO DE PROJECT
    $objPHPExcel->createSheet();
    $objPHPExcel->setActiveSheetIndex(1);
    $objPHPExcel->getActiveSheet(1)->setTitle('Projects-Trial Groups');
    $objPHPExcel->getActiveSheet()->getTabColor()->setRGB('A3B629');
    $i = 2;
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id Project');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Name');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Lead of Project');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Project Implementing Institutions');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Project Implementing Period');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Funding for Project');

    $QUERY00 = "SELECT P.id_project,P.prjname,(coalesce(CP.cnprfirstname, '')||' '||coalesce(CP.cnprmiddlename, '')||' '||coalesce(CP.cnprlastname, '')) AS contactperson, ";
    $QUERY00 .= "INS.insname AS institution,(P.prjprojectimplementingperiodstartdate||' to '||P.prjprojectimplementingperiodenddate) AS implementingperiod,D.dnrname ";
    $QUERY00 .= "FROM tb_project P ";
    $QUERY00 .= "INNER JOIN tb_contactperson CP ON P.id_leadofproject = CP.id_contactperson ";
    $QUERY00 .= "INNER JOIN tb_institution INS ON P.id_projectimplementinginstitutions = INS.id_institution ";
    $QUERY00 .= "INNER JOIN tb_donor D ON P.id_donor = D.id_donor ";
    $QUERY00 .= "ORDER BY P.prjname ";
    $st00 = $connection->execute($QUERY00);
    $Resultado00 = $st00->fetchAll();
    foreach ($Resultado00 AS $fila) {
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila['id_project']);
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila['prjname']);
        $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $fila['contactperson']);
        $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $fila['institution']);
        $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $fila['implementingperiod']);
        $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $fila['dnrname']);
        $i++;
    }
    $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
    //fin: GENERAMOS LIBRO DE PROJECT
    //inicio: GENERAMOS LIBRO DE CONTACT PERSON
    $objPHPExcel->createSheet();
    $objPHPExcel->setActiveSheetIndex(2);
    $objPHPExcel->getActiveSheet(2)->setTitle('Trial Manager');
    $objPHPExcel->getActiveSheet()->getTabColor()->setRGB('A3B629');
    $i = 2;
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id Trial Manager');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Name');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Institution');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Country');

    $QUERY01 = "SELECT CP.id_contactperson,(coalesce(CP.cnprfirstname, '')||' '||coalesce(CP.cnprmiddlename, '')||' '||coalesce(CP.cnprlastname, '')) AS contactperson, ";
    $QUERY01 .= "INS.insname,DA.dmdvname ";
    $QUERY01 .= "FROM tb_contactperson CP ";
    $QUERY01 .= "INNER JOIN tb_institution INS ON CP.id_institution = INS.id_institution ";
    $QUERY01 .= "INNER JOIN tb_administrativedivision DA ON INS.id_country = DA.id_administrativedivision ";
    $QUERY01 .= "ORDER BY contactperson ";
    $st01 = $connection->execute($QUERY01);
    $Resultado01 = $st01->fetchAll();
    foreach ($Resultado01 AS $fila) {
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila['id_contactperson']);
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila['contactperson']);
        $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $fila['insname']);
        $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $fila['dmdvname']);
        $i++;
    }
    $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    //fin: GENERAMOS LIBRO DE CONTACT PERSON
    //inicio: GENERAMOS LIBRO DE ROLE CONTACT PERSON
    $objPHPExcel->createSheet();
    $objPHPExcel->setActiveSheetIndex(3);
    $objPHPExcel->getActiveSheet(3)->setTitle('Role Contact Person');
    $objPHPExcel->getActiveSheet()->getTabColor()->setRGB('A3B629');
    $i = 2;
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id Role Contact Person');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Name');

    $QUERY02 = "SELECT RCP.id_rolecontactperson,RCP.rcpname ";
    $QUERY02 .= "FROM tb_rolecontactperson RCP ";
    $QUERY02 .= "ORDER BY RCP.rcpname ";
    $st02 = $connection->execute($QUERY02);
    $Resultado02 = $st02->fetchAll();
    foreach ($Resultado02 AS $fila) {
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila['id_rolecontactperson']);
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila['rcpname']);
        $i++;
    }
    $objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    //fin: GENERAMOS LIBRO DE ROLE CONTACT PERSON
    //inicio: GENERAMOS LIBRO DE TRIAL LOCATION
    $objPHPExcel->createSheet();
    $objPHPExcel->setActiveSheetIndex(4);
    $objPHPExcel->getActiveSheet(4)->setTitle('Trial Location');
    $objPHPExcel->getActiveSheet()->getTabColor()->setRGB('A3B629');
    $i = 2;
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id Trial Location');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Name');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Country');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'District/Satate/Province Level');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Sub-district/Division Level');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Village Level');
    $objPHPExcel->getActiveSheet()->setCellValue('G1', 'Latitude');
    $objPHPExcel->getActiveSheet()->setCellValue('H1', 'Longitude');
    $objPHPExcel->getActiveSheet()->setCellValue('I1', 'Altitude');

    $QUERY03 = "SELECT TL.id_triallocation,TL.trlcname, ";
    $QUERY03 .= "fc_Triallocationadministrativedivision(TL.id_triallocation, 1) AS country, ";
    $QUERY03 .= "fc_Triallocationadministrativedivision(TL.id_triallocation, 2) AS district, ";
    $QUERY03 .= "fc_Triallocationadministrativedivision(TL.id_triallocation, 3) AS subdistrict, ";
    $QUERY03 .= "fc_Triallocationadministrativedivision(TL.id_triallocation, 4) AS village, ";
    $QUERY03 .= "TL.trlclatitude,TL.trlclongitude,TL.trlcaltitude ";
    $QUERY03 .= "FROM tb_triallocation TL ";
    $QUERY03 .= "ORDER BY TL.trlcname ";
    $st03 = $connection->execute($QUERY03);
    $Resultado03 = $st03->fetchAll();
    foreach ($Resultado03 AS $fila) {
        $PartCountry = explode(",", $fila['country']);
        unset($PartCountry[0]);
        $Country = implode(null, $PartCountry);

        $PartDistrict = explode(",", $fila['district']);
        unset($PartDistrict[0]);
        $District = implode(null, $PartDistrict);

        $PartSubdistrict = explode(",", $fila['subdistrict']);
        unset($PartSubdistrict[0]);
        $Subdistrict = implode(null, $PartSubdistrict);

        $PartVillage = explode(",", $fila['village']);
        unset($PartVillage[0]);
        $Village = implode(null, $PartVillage);

        $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila['id_triallocation']);
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila['trlcname']);
        $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $Country);
        $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $District);
        $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $Subdistrict);
        $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $Village);
        $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $fila['trlclatitude']);
        $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $fila['trlclongitude']);
        $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $fila['trlcaltitude']);
        $i++;
    }
    $objPHPExcel->getActiveSheet()->getStyle('A1:I1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
    //fin: GENERAMOS LIBRO DE TRIAL LOCATION
    //inicio: GENERAMOS LIBRO DE ACCESS INFORMATION
    $objPHPExcel->createSheet();
    $objPHPExcel->setActiveSheetIndex(5);
    $objPHPExcel->getActiveSheet(5)->setTitle('Access to Information');
    $objPHPExcel->getActiveSheet()->getTabColor()->setRGB('A3B629');
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Permitted Values');
    $objPHPExcel->getActiveSheet()->setCellValue('A2', 'All Users');
    $objPHPExcel->getActiveSheet()->setCellValue('A3', 'Specified Users');
    $objPHPExcel->getActiveSheet()->setCellValue('A4', 'Specified Groups');
    $objPHPExcel->getActiveSheet()->setCellValue('A5', 'Public Domain');
    $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    //fin: GENERAMOS LIBRO DE ACCESS INFORMATION
    //inicio: GENERAMOS LIBRO DE USERS
    $objPHPExcel->createSheet();
    $objPHPExcel->setActiveSheetIndex(6);
    $objPHPExcel->getActiveSheet(6)->setTitle('Users');
    $objPHPExcel->getActiveSheet()->getTabColor()->setRGB('A3B629');
    $i = 2;
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id User');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Name');

    $QUERY04 = "SELECT U.id, (coalesce(U.first_name, '')||' '||coalesce(U.last_name, '')) AS name ";
    $QUERY04 .= "FROM sf_guard_user U ";
    $QUERY04 .= "ORDER BY name ";
    $st04 = $connection->execute($QUERY04);
    $Resultado04 = $st04->fetchAll();
    foreach ($Resultado04 AS $fila) {
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila['id']);
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila['name']);
        $i++;
    }
    $objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    //fin: GENERAMOS LIBRO DE USERS
    //inicio: GENERAMOS LIBRO DE GROUPS
    $objPHPExcel->createSheet();
    $objPHPExcel->setActiveSheetIndex(7);
    $objPHPExcel->getActiveSheet(7)->setTitle('Groups');
    $objPHPExcel->getActiveSheet()->getTabColor()->setRGB('A3B629');
    $i = 2;
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id Group');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Name');

    $QUERY05 = "SELECT G.id, G.name ";
    $QUERY05 .= "FROM sf_guard_group G ";
    $QUERY05 .= "ORDER BY G.name ";
    $st05 = $connection->execute($QUERY05);
    $Resultado05 = $st05->fetchAll();
    foreach ($Resultado05 AS $fila) {
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila['id']);
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila['name']);
        $i++;
    }
    $objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    //fin: GENERAMOS LIBRO DE GROUPS

    $objPHPExcel->setActiveSheetIndex(0);
    $TrialTemplate = "1.TrialTemplate.xls";
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save("$tmp_download/$TrialTemplate");

    return $TrialTemplate;
}

//FIN: CREACION DE PLANTILLA DE TRIAL
//inicio: CREACION DE PLANTILLA DE TRIAL INFO
function CreateTemplateTrialInfo() {
    $connection = Doctrine_Manager::getInstance()->connection();
    $user = sfContext::getInstance()->getUser();
    $id_user = sfContext::getInstance()->getUser()->getGuardUser()->getId();
    $UploadDir = sfConfig::get("sf_upload_dir");
    $tmp_download = $UploadDir . "/tmp$id_user";
    if (!is_dir($tmp_download)) {
        mkdir($tmp_download, 0777);
    }

    $ArrTemplateFiles = null;
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->getProperties()->setCreator("AgTrials")
            ->setLastModifiedBy("AgTrials")
            ->setTitle("AgTrials")
            ->setSubject("AgTrials")
            ->setDescription("AgTrials")
            ->setKeywords("AgTrials")
            ->setCategory("AgTrials");
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Code Trial')
            ->setCellValue('B1', 'Number of replicates')
            ->setCellValue('C1', 'Id Experimental design')
            ->setCellValue('D1', 'Treatment number')
            ->setCellValue('E1', 'Treatment name and code')
            ->setCellValue('F1', 'Planting sowing start date (yyyy-mm-dd)')
            ->setCellValue('G1', 'Planting sowing end date (yyyy-mm-dd)')
            ->setCellValue('H1', 'Physiological maturity star date (yyyy-mm-dd)')
            ->setCellValue('I1', 'Physiological maturity end date (yyyy-mm-dd)')
            ->setCellValue('J1', 'Harvest start date (yyyy-mm-dd)')
            ->setCellValue('K1', 'Harvest end date (yyyy-mm-dd)')
            ->setCellValue('L1', 'Id Crop')
            ->setCellValue('M1', 'Trial info template data')
            ->setCellValue('N1', 'Results file')
            ->setCellValue('O1', 'Suppplemental information file')
            ->setCellValue('P1', 'Weather data file')
            ->setCellValue('Q1', 'Soil data file');

    //DEFINIMOS LA COLUMNA F,G,H,I,J,K COMO TEXT
    $objPHPExcel->getActiveSheet()->getStyle('F1:F100')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
    $objPHPExcel->getActiveSheet()->getStyle('G1:G100')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
    $objPHPExcel->getActiveSheet()->getStyle('H1:H100')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
    $objPHPExcel->getActiveSheet()->getStyle('I1:I100')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
    $objPHPExcel->getActiveSheet()->getStyle('J1:J100')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
    $objPHPExcel->getActiveSheet()->getStyle('K1:K100')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

    $objPHPExcel->getActiveSheet()->getStyle('A1:Q1')->getFont()->setBold(true);
    for ($col = 'A'; $col != 'R'; $col++) {
        $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
    }
    $objPHPExcel->getActiveSheet(0)->setTitle('Trial Info');
    $objPHPExcel->getActiveSheet()->getTabColor()->setRGB('FF0000');

    //inicio: GENERAMOS LIBRO DE Experimental design
    $objPHPExcel->createSheet();
    $objPHPExcel->setActiveSheetIndex(1);
    $objPHPExcel->getActiveSheet(1)->setTitle('Experimental design');
    $objPHPExcel->getActiveSheet()->getTabColor()->setRGB('A3B629');
    $i = 2;
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id Experimental design');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Name');

    $QUERY01 = "SELECT ED.id_experimentaldesign, ED.xpdsname ";
    $QUERY01 .= "FROM tb_experimentaldesign ED ";
    $QUERY01 .= "ORDER BY ED.xpdsname ";
    $st01 = $connection->execute($QUERY01);
    $Resultado01 = $st01->fetchAll();
    foreach ($Resultado01 AS $fila) {
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila['id_experimentaldesign']);
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila['xpdsname']);
        $i++;
    }
    $objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    //fin: GENERAMOS LIBRO DE Experimental design
    //inicio: GENERAMOS LIBRO DE Crop
    $objPHPExcel->createSheet();
    $objPHPExcel->setActiveSheetIndex(2);
    $objPHPExcel->getActiveSheet(2)->setTitle('Crop');
    $objPHPExcel->getActiveSheet()->getTabColor()->setRGB('A3B629');
    $i = 2;
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id Crop');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Name');

    $QUERY02 = "SELECT C.id_crop, C.crpname ";
    $QUERY02 .= "FROM tb_crop C ";
    $QUERY02 .= "ORDER BY C.crpname ";
    $st02 = $connection->execute($QUERY02);
    $Resultado02 = $st02->fetchAll();
    foreach ($Resultado02 AS $fila) {
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila['id_crop']);
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila['crpname']);
        $i++;
    }
    $objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
    //fin: GENERAMOS LIBRO DE Crop

    $objPHPExcel->setActiveSheetIndex(0);
    $TrialInfoTemplate = "2.TrialInfoTemplate.xls";
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save("$tmp_download/$TrialInfoTemplate");

    return $TrialInfoTemplate;
}

//fin: CREACION DE PLANTILLA DE TRIAL INFO
//inicio: CREACION DE PLANTILLA DE TRIAL INFO DATA
function CreateTemplateTrialInfoData() {
    $connection = Doctrine_Manager::getInstance()->connection();
    $user = sfContext::getInstance()->getUser();
    $id_user = sfContext::getInstance()->getUser()->getGuardUser()->getId();
    $UploadDir = sfConfig::get("sf_upload_dir");
    $tmp_download = $UploadDir . "/tmp$id_user";
    if (!is_dir($tmp_download)) {
        mkdir($tmp_download, 0777);
    }

    $ArrTemplateFiles = null;
    $replication = 1;
    $ArrVarietyAll = $user->getAttribute('ArrVariety');
    $ArrVariablesMeasuredAll = $user->getAttribute('ArrVariablesMeasured');
    $CountVariety = count($ArrVarietyAll);
    if ($CountVariety > 0) {
        $Ind = 3;
        foreach ($ArrVarietyAll AS $key => $ArrVariety) {
            $ArrVariablesMeasured = $ArrVariablesMeasuredAll[$key];
            $TmpIdVariety = current($ArrVariety);
            if ($TmpIdVariety) {
                $TbVariety = Doctrine::getTable('TbVariety')->findOneByIdVariety($TmpIdVariety);
                $TbCrop = Doctrine::getTable('TbCrop')->findOneByIdCrop($TbVariety->getIdCrop());
                $Crpname = $TbCrop->getCrpname();
            }

            $objPHPExcel = new PHPExcel();
            // Set properties
            $objPHPExcel->getProperties()->setCreator("AgTrials")
                    ->setLastModifiedBy("AgTrials")
                    ->setTitle("AgTrials")
                    ->setSubject("AgTrials")
                    ->setDescription("AgTrials")
                    ->setKeywords("AgTrials")
                    ->setCategory("AgTrials");

            // Add some data
            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->getActiveSheet(0)->setTitle('Template Trial Data');
            $objPHPExcel->getActiveSheet()->getTabColor()->setRGB('FF0000');

            $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Replication');
            $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Varieties');
            $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
            $objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);

            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

            //AQUI GENERAMOS LAS FILA DE VARIABLES MEDIDAS
            $letter = "B";
            foreach ($ArrVariablesMeasured AS $variablesmeasured_id) {
                if ($variablesmeasured_id != '') {
                    $TbVariablesmeasured = Doctrine::getTable('TbVariablesmeasured')->findOneByIdVariablesmeasured($variablesmeasured_id);
                    $Vrmsname = $TbVariablesmeasured->getVrmsname();
                    $letter = NextLetter($letter);
                    $objPHPExcel->getActiveSheet()->setCellValue($letter . '1', $Vrmsname);
                    $objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
                    $objPHPExcel->getActiveSheet()->getStyle($letter . '1')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet()->getStyle($letter . '1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
                }
            }

            $objPHPExcel->getActiveSheet()->protectCells("A1:" . $letter . "1");

            //AQUI GENERAMOS LAS COLUMNAS DE REPLICACION Y VARIEDADES
            $i = 2;
            for ($a = 1; $a <= $replication; $a++) {
                foreach ($ArrVariety AS $varieties_id) {
                    if ($variablesmeasured_id != '') {
                        $TbVariety = Doctrine::getTable('TbVariety')->findOneByIdVariety($varieties_id);
                        $Vrtname = $TbVariety->getVrtname();
                        $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $a);
                        $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $Vrtname);
                        $objPHPExcel->getActiveSheet()->getStyle('A' . $i)->getFont()->setBold(true);
                        $objPHPExcel->getActiveSheet()->getStyle('B' . $i)->getFont()->setBold(true);
                        $objPHPExcel->getActiveSheet()->getStyle('C' . $i)->getFont()->setBold(true);
                        $i++;
                    }
                }
            }

            //APLICAMOS NEGRILLA AL TITULO
            $objPHPExcel->getActiveSheet()->getStyle('A1:' . $letter . '1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('A1')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
            $objPHPExcel->getActiveSheet()->getStyle('B1')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);

            //APLICAMOS COLOR ROJO A COLUMNAS OBLIGATORIAS
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

            //RENOMBRAMOS EL LIBO
            $objPHPExcel->getActiveSheet(0)->setTitle('Template Trial Data');

            //inicio: GENERAMOS EL LIBRO DE VARIEDADES
            $objPHPExcel->createSheet();
            $objPHPExcel->setActiveSheetIndex(1);
            $objPHPExcel->getActiveSheet(1)->setTitle('Varieties');
            $objPHPExcel->getActiveSheet()->getTabColor()->setRGB('A3B629');
            $i = 2;
            $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Name');
            $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Origin');
            $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Synonymous');
            $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Description');
            foreach ($ArrVariety AS $varieties_id) {
                $QUERY00 = "SELECT V.vrtname,V.vrtorigin,V.vrtsynonymous,V.vrtdescription ";
                $QUERY00 .= "FROM tb_variety V ";
                $QUERY00 .= "WHERE V.id_variety = $varieties_id ";
                $st = $connection->execute($QUERY00);
                $Resultado02 = $st->fetchAll();
                foreach ($Resultado02 AS $fila) {
                    $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila['vrtname']);
                    $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila['vrtorigin']);
                    $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $fila['vrtsynonymous']);
                    $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $fila['vrtdescription']);
                    $i++;
                }
            }
            $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            //fin: GENERAMOS EL LIBRO DE VARIEDADES
            //
        //inicio: GENERAMOS EL LIBRO DE VARIABLES MEDIDAS
            $objPHPExcel->createSheet();
            $objPHPExcel->setActiveSheetIndex(2);
            $objPHPExcel->getActiveSheet(2)->setTitle('Variables Measured');
            $objPHPExcel->getActiveSheet()->getTabColor()->setRGB('A3B629');
            $i = 2;
            $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Name');
            $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Trait Class');
            $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Short Name');
            $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Definition');
            $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Unit');
            foreach ($ArrVariablesMeasured AS $variablesmeasured_id) {
                $QUERY01 = "SELECT T.vrmsname,T2.trclname,T.vrmsshortname,T.vrmsdefinition,T.vrmsunit ";
                $QUERY01 .= "FROM tb_variablesmeasured T ";
                $QUERY01 .= "INNER JOIN tb_traitclass T2 ON T.id_traitclass = T2.id_traitclass ";
                $QUERY01 .= "WHERE T.id_variablesmeasured = $variablesmeasured_id ";
                $st = $connection->execute($QUERY01);
                $Resultado01 = $st->fetchAll();
                foreach ($Resultado01 AS $fila) {
                    $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila['vrmsname']);
                    $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila['trclname']);
                    $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $fila['vrmsshortname']);
                    $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $fila['vrmsdefinition']);
                    $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $fila['vrmsunit']);
                    $i++;
                }
            }
            $objPHPExcel->getActiveSheet()->getStyle('A1:E1')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            //fin: GENERAMOS EL LIBRO DE VARIABLES MEDIDAS

            $objPHPExcel->setActiveSheetIndex(0);
            $CrpnameFile = str_replace(" ", "", $Crpname);
            $TrialInfoDataTemplate = "$Ind.TrialInfoTemplateData$CrpnameFile.xls";
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save("$tmp_download/$TrialInfoDataTemplate");
            $ArrTemplateFiles[] = $TrialInfoDataTemplate;
            $Ind++;
        }
    }

    return $ArrTemplateFiles;
}

//fin: CREACION DE PLANTILLA DE TRIAL INFO DATA

function DecompressFile($CompressedFile) {
    $id_user = sfContext::getInstance()->getUser()->getGuardUser()->getId();
    $UploadDir = sfConfig::get("sf_upload_dir");
    $TmpUploadDir = $UploadDir . "/tmp$id_user";
    $MaxSizeFileZip = 25;

    $CompressedFileSize = $CompressedFile['size'];
    $CompressedFileType = $CompressedFile['type'];
    $CompressedFileName = $CompressedFile['name'];
    $CompressedFileTmpName = $CompressedFile['tmp_name'];
    $CompressedFileSizeMB = round(($CompressedFileSize / 1048576), 2);

    //INICIO: AQUI SUBIMOS Y DESCOMPRIMIMOS LOS ARCHIVOS
    if ($CompressedFileName != '') {
        $extension = explode(".", $CompressedFileName);
        $lenght = count($extension);
        $CompressedFileExt = strtoupper($extension[$lenght - 1]);
        if ((!($CompressedFileExt == "ZIP")) || ($CompressedFileSizeMB > $MaxSizeFileZip)) {
            $Forma = "TrialFileErrorZip";
            die(include("../lib/html/HTML.php"));
        } else {
            move_uploaded_file($CompressedFileTmpName, "$TmpUploadDir/$CompressedFileName");
            $archive = new PclZip("$TmpUploadDir/$CompressedFileName");
            if ($archive->extract(PCLZIP_OPT_PATH, $TmpUploadDir) == 0) {
                unlink("$TmpUploadDir/$CompressedFileName");
                $ErrorInfo = $archive->errorInfo(true);
                $Forma = "TrialFileErrorZipUncompress";
                die(include("../lib/html/HTML.php"));
            }
            unlink("$TmpUploadDir/$CompressedFileName");
        }
    }
}

function ReadTrialTemplate($TrialTemplateFile) {
    $user = sfContext::getInstance()->getUser();
    $connection = Doctrine_Manager::getInstance()->connection();
    $id_user = sfContext::getInstance()->getUser()->getGuardUser()->getId();
    $NowDate = date("Y-m-d") . " " . date("H:i:s");

    $TrialTemplateFileSize = $TrialTemplateFile['size'];
    $TrialTemplateFileType = $TrialTemplateFile['type'];
    $TrialTemplateFileName = $TrialTemplateFile['name'];
    $TrialTemplateFileTmpName = $TrialTemplateFile['tmp_name'];
    $TrialTemplateFileSizeMB = round(($TrialTemplateFileSize / 1048576), 2);
    if ($TrialTemplateFile != '') {
        $extension = explode(".", $TrialTemplateFileName);
        $lenght = count($extension);
        $TrialTemplateFileExt = strtoupper($extension[$lenght - 1]);
        if ((!($TrialTemplateFileExt == "XLS")) || ($TrialTemplateFileSizeMB < 0) || ($TrialTemplateFileSizeMB > 5) || ($TrialTemplateFileSizeMB > 5)) {
            $Forma = "TrialFileErrorTemplates";
            die(include("../lib/html/HTML.php"));
        }

        $InputFileTrial = $TrialTemplateFileTmpName;
        $ExcelFileTrial = new Spreadsheet_Excel_Reader();
        $ExcelFileTrial->setOutputEncoding('UTF-8');
        $ExcelFileTrial->read($InputFileTrial);
        error_reporting(E_ALL ^ E_NOTICE);
        $NumRows = $ExcelFileTrial->sheets[0]['numRows'];
        $NumCols = $ExcelFileTrial->sheets[0]['numCols'];
        $TotalRecord = $NumRows;


        if (($TotalRecord > 1000) && ($TrialTemplateFileName != '')) {
            $Forma = "TrialFileErrorTemplatesRecord";
            $MaxRecord = 1000;
            die(include("../lib/html/HTML.php"));
        }

        if (($TotalRecord > 1000) && ($TrialTemplateFileName == '')) {
            $Forma = "TrialFileErrorTemplatesRecord";
            $MaxRecord = 1000;
            die(include("../lib/html/HTML.php"));
        }

        $Forma = "TrialBody";
        include("../lib/html/HTML.php");
        $ErrorresFilas = "";
        $Grabados = 0;
        $Errores = 0;
        $ArrTrial = null;
        for ($row = 2; $row <= ($TotalRecord + 1); ++$row) {
            $banderaerrorfila = false;
            $ExpCode = trim($ExcelFileTrial->sheets[0]['cells'][$row][1]);
            $IdProject = trim($ExcelFileTrial->sheets[0]['cells'][$row][2]);
            $IdTrialManager = trim($ExcelFileTrial->sheets[0]['cells'][$row][3]);
            $IdRoleContactPerson = trim($ExcelFileTrial->sheets[0]['cells'][$row][4]);
            $ImplementingPeriodStartDate = trim($ExcelFileTrial->sheets[0]['cells'][$row][5]);
            $ImplementingPeriodEndDate = trim($ExcelFileTrial->sheets[0]['cells'][$row][6]);
            $IdTrialLocation = trim($ExcelFileTrial->sheets[0]['cells'][$row][7]);
            $TrialName = trim($ExcelFileTrial->sheets[0]['cells'][$row][8]);
            $TrialObjectives = trim($ExcelFileTrial->sheets[0]['cells'][$row][9]);
            $TrialLicense = trim($ExcelFileTrial->sheets[0]['cells'][$row][10]);
            $AccessInformation = trim($ExcelFileTrial->sheets[0]['cells'][$row][11]);
            $UserGroupPermissionsList = trim($ExcelFileTrial->sheets[0]['cells'][$row][12]);

            //VALIDACIONES DE TIPO DE DATO
            if (!(is_numeric($IdProject))) {
                $IdProject = "";
            }
            if (!(is_numeric($IdTrialManager))) {
                $IdTrialManager = "";
            }
            if (!(is_numeric($IdRoleContactPerson))) {
                $IdRoleContactPerson = "";
            }
            if (!(is_numeric($IdTrialLocation))) {
                $IdTrialLocation = "";
            }
            if (!(ValidaFecha($ImplementingPeriodStartDate))) {
                $ImplementingPeriodStartDate = "";
            }
            if (!(ValidaFecha($ImplementingPeriodEndDate))) {
                $ImplementingPeriodEndDate = "";
            }
            if ($AccessInformation == "All Users") {
                $AccessInformation = 'Open to all users';
                $UserGroupPermissionsList = '';
            } else if ($AccessInformation == "Specified Users") {
                $AccessInformation = 'Open to specified users';
            } else if ($AccessInformation == "Specified Groups") {
                $AccessInformation = 'Open to specified groups';
            } else if ($AccessInformation == "Public Domain") {
                $AccessInformation = 'Public domain';
                $UserGroupPermissionsList = '';
            }

            //AQUI VALIDAMOS LOS TODOS LOS CAMPOS
            $Fields = '{"' . $ExpCode . '","' . $IdProject . '","' . $IdTrialManager . '","' . $IdRoleContactPerson . '","' . $ImplementingPeriodStartDate . '","' . $ImplementingPeriodEndDate . '","' . $IdTrialLocation . '","' . $TrialName . '","' . $TrialObjectives . '","' . null . '","' . $AccessInformation . '","' . $UserGroupPermissionsList . '"}';
            $Fields = str_replace("'", "''", $Fields);
            $Fields = utf8_encode($Fields);
            $QUERY = "SELECT fc_checkfieldsbatchtrial('$Fields'::text[]) AS info;";
            $st = $connection->execute($QUERY);
            $CheckFieldsBatchTrial = $st->fetchAll(PDO::FETCH_ASSOC);
            $InfoCheckFieldsBatchTrial = $CheckFieldsBatchTrial[0];

            if ($InfoCheckFieldsBatchTrial['info'] == "OK") {
                //GRABAMOS EL REGISTRO EN TbTrial
                $TrialName = utf8_encode($TrialName);
                $TrialObjectives = utf8_encode($TrialObjectives);
                $TrialLicense = utf8_encode($TrialLicense);
                $id_trial = TbTrialTable::addTrial($IdProject, $IdTrialManager, $IdRoleContactPerson, $ImplementingPeriodStartDate, $ImplementingPeriodEndDate, $IdTrialLocation, $TrialName, $TrialObjectives, $TrialLicense, $AccessInformation);
                $ArrTrial[$id_trial] = $ExpCode;

                //inicio: CREAMOS LOS DIRECTORIOS PARA LOS ARCHIVOS
                $Directorio = "FilesTrial$id_trial";
                $UploadDir = sfConfig::get("sf_upload_dir");
                $DirUploads = "$UploadDir/$Directorio";
                DirectoryFiles($DirUploads);
                //fin: CREAMOS LOS DIRECTORIOS PARA LOS ARCHIVOS
                //
                //GRABAMOS LOS REGISTROS DE PERMISOS (USERS OR GROUPS)
                if ((($AccessInformation == 'Open to specified users') || ($AccessInformation == 'Open to specified groups')) && ($UserGroupPermissionsList != '')) {
                    $connection->execute("SELECT fc_saveusergrouppermissionslist($id_trial,$id_user,'$NowDate','$AccessInformation','$UserGroupPermissionsList');");
                }
                $Grabados++;
            } else {
                $ErrorresFilas .= "<img width=13 height=13 src=/images/Arrow-icon.png> <b>Fila $row:</b> (" . substr($InfoCheckFieldsBatchTrial['info'], 2, (strlen($InfoCheckFieldsBatchTrial['info']) - 1)) . ") <br>";
                $Errores++;
            }

            $fila_actual = ($row - 1);
            $porcentaje = $fila_actual * 100 / $TotalRecord; //saco mi valor en porcentaje
            echo "<script>ProgressTrial(" . round($porcentaje) . ",$fila_actual,$TotalRecord);</script>";
            echo "<script>CounterTrial($Grabados,$Errores);</script>";
            flush();
            ob_flush();
        }
    }

    if ($Errores > 0) {
        echo "<script>ErroresTrial('$ErrorresFilas');</script>";
        flush();
        ob_flush();
    }

    $InfoReadTrialTemplate['ArrTrial'] = $ArrTrial;
    $InfoReadTrialTemplate['grabados'] = $Grabados;
    $InfoReadTrialTemplate['errores'] = $Errores;
    $InfoReadTrialTemplate['ErrorFilas'] = $ErrorresFilas;

    return $InfoReadTrialTemplate;
}

function ReadTrialInfoTemplate($TrialInfoTemplateFile, $ArrTrial) {
    $user = sfContext::getInstance()->getUser();
    $connection = Doctrine_Manager::getInstance()->connection();
    $id_user = sfContext::getInstance()->getUser()->getGuardUser()->getId();
    $NowDate = date("Y-m-d") . " " . date("H:i:s");
    $UploadDir = sfConfig::get("sf_upload_dir");
    $TmpUploadDir = $UploadDir . "/tmp$id_user";

    $TrialInfoTemplateFileSize = $TrialInfoTemplateFile['size'];
    $TrialInfoTemplateFileType = $TrialInfoTemplateFile['type'];
    $TrialInfoTemplateFileName = $TrialInfoTemplateFile['name'];
    $TrialInfoTemplateFileTmpName = $TrialInfoTemplateFile['tmp_name'];
    $TrialInfoTemplateFileSizeMB = round(($TrialFileSize / 1048576), 2);

    $extension = explode(".", $TrialInfoTemplateFileName);
    $lenght = count($extension);
    $TrialInfoTemplateFileExt = strtoupper($extension[$lenght - 1]);
    if ((!($TrialInfoTemplateFileExt == "XLS")) || ($TrialInfoTemplateFileSizeMB < 0) || ($TrialInfoTemplateFileSizeMB > 5) || ($TrialInfoTemplateFileSizeMB > 5)) {
        $Forma = "TrialFileErrorTemplates";
        die(include("../lib/html/HTML.php"));
    }

    $InputFileTrialInfo = $TrialInfoTemplateFileTmpName;
    $ExcelFileTrialInfo = new Spreadsheet_Excel_Reader();
    $ExcelFileTrialInfo->setOutputEncoding('UTF-8');
    $ExcelFileTrialInfo->read($InputFileTrialInfo);
    error_reporting(E_ALL ^ E_NOTICE);
    $NumRows = $ExcelFileTrialInfo->sheets[0]['numRows'];
    $NumCols = $ExcelFileTrialInfo->sheets[0]['numCols'];
    $TotalRecord = $NumRows;

    $ErrorresFilas = "";
    $Grabados = 0;
    $Errores = 0;
    $ArrTrialInfo = null;

    for ($row = 2; $row <= ($TotalRecord + 1); ++$row) {
        $banderaerrorfila = false;
        $ExpCodeInfo = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][1]);
        $NumberReplicates = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][2]);
        $IdExperimentalDesign = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][3]);
        $TreatmentNumber = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][4]);
        $TreatmentNameAndCode = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][5]);
        $PlantingSowingStartDate = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][6]);
        $PlantingSowingEndDate = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][7]);
        $PhysiologicalMaturityStarDate = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][8]);
        $PhysiologicalMaturityEndDate = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][9]);
        $HarvestStartDate = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][10]);
        $HarvestEndDate = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][11]);
        $IdCrop = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][12]);
        $TrialInfoTemplateData = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][13]);
        $ResultsFile = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][14]);
        $SuppplementalInformationFile = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][15]);
        $WeatherDataFile = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][16]);
        $SoilDataFile = trim($ExcelFileTrialInfo->sheets[0]['cells'][$row][17]);

        //VALIDACIONES DE TIPOS DE DATOS Y ARCHIVOS
        if (!(is_numeric($NumberReplicates))) {
            $NumberReplicates = "";
        }
        if (!(is_numeric($IdExperimentalDesign))) {
            $IdExperimentalDesign = "";
        }
        if (!(is_numeric($TreatmentNumber))) {
            $TreatmentNumber = "";
        }
        if (!(is_numeric($IdCrop))) {
            $IdCrop = "";
        }
        if (!(ValidaFecha($PlantingSowingStartDate))) {
            $PlantingSowingStartDate = "";
        }
        if (!(ValidaFecha($PlantingSowingEndDate))) {
            $PlantingSowingEndDate = "";
        }
        if (!(ValidaFecha($PhysiologicalMaturityStarDate))) {
            $PhysiologicalMaturityStarDate = "";
        }
        if (!(ValidaFecha($PhysiologicalMaturityEndDate))) {
            $PhysiologicalMaturityEndDate = "";
        }
        if (!(ValidaFecha($HarvestStartDate))) {
            $HarvestStartDate = "";
        }
        if (!(ValidaFecha($HarvestEndDate))) {
            $HarvestEndDate = "";
        }
        $PathTrialInfoTemplateData = "$TmpUploadDir/$TrialInfoTemplateData";
        if (!(file_exists($PathTrialInfoTemplateData))) {
            $TrialInfoTemplateData = "";
        }
        $PathResultsFile = "$TmpUploadDir/$ResultsFile";
        if (!(file_exists($PathResultsFile))) {
            $ResultsFile = "";
        }
        $PathSuppplementalInformationFile = "$TmpUploadDir/$SuppplementalInformationFile";
        if (!(file_exists($PathSuppplementalInformationFile))) {
            $SuppplementalInformationFile = "";
        }
        $PathWeatherDataFile = "$TmpUploadDir/$WeatherDataFile";
        if (!(file_exists($PathWeatherDataFile))) {
            $WeatherDataFile = "";
        }
        $PathSoilDataFile = "$TmpUploadDir/$SoilDataFile";
        if (!(file_exists($PathSoilDataFile))) {
            $SoilDataFile = "";
        }

        //VALIDAMOS QUE EXISTA UN REGISTRO PADRE
        $id_trial = array_search($ExpCodeInfo, $ArrTrial);
        if ($id_trial != '') {
            $DirUploads = "$UploadDir/FilesTrial$id_trial";
            //AQUI VALIDAMOS LOS TODOS LOS CAMPOS
            $FieldsInfo = '{"' . $NumberReplicates . '","' . $IdExperimentalDesign . '","' . $TreatmentNumber . '","' . $TreatmentNameAndCode . '","' . $PlantingSowingStartDate . '","' . $PlantingSowingEndDate . '","' . $PhysiologicalMaturityStarDate . '","' . $PhysiologicalMaturityEndDate . '","' . $HarvestStartDate . '","' . $HarvestEndDate . '","' . $IdCrop . '","' . $TrialInfoTemplateData . '","' . $ResultsFile . '","' . $SuppplementalInformationFile . '","' . $WeatherDataFile . '","' . $SoilDataFile . '"}';
            $FieldsInfo = str_replace("'", "''", $FieldsInfo);
            $FieldsInfo = utf8_encode($FieldsInfo);
            $QUERY01 = "SELECT fc_checkfieldsbatchtrialinfo('$FieldsInfo'::text[]) AS info;";
            $st = $connection->execute($QUERY01);
            $CheckFieldsBatchTrialInfo = $st->fetchAll(PDO::FETCH_ASSOC);
            $InfoCheckFieldsBatchTrialInfo = $CheckFieldsBatchTrialInfo[0];

            if ($InfoCheckFieldsBatchTrialInfo['info'] == "OK") {
                //GRABAMOS EL REGISTRO EN TbTrialinfo
                $id_trialinfo = TbTrialinfoTable::addTrialinfo($id_trial, $NumberReplicates, $IdExperimentalDesign, $TreatmentNumber, $TreatmentNameAndCode, $PlantingSowingStartDate, $PlantingSowingEndDate, $PhysiologicalMaturityStarDate, $PhysiologicalMaturityEndDate, $HarvestStartDate, $HarvestEndDate, $IdCrop, $TrialInfoTemplateData, $ResultsFile, $SuppplementalInformationFile, $WeatherDataFile, $SoilDataFile);
                $ArrTrialInfo[$id_trialinfo] = $TrialInfoTemplateData;
                //inicio: SE MUEVEN LOS ARCHIVOS AL REPOSITORIO FINAL
                if ($TrialInfoTemplateData != '') {
                    copy("$TmpUploadDir/$TrialInfoTemplateData", "$DirUploads/$TrialInfoTemplateData");
                }
                if ($ResultsFile != '') {
                    copy("$TmpUploadDir/$ResultsFile", "$DirUploads/$ResultsFile");
                }
                if ($SuppplementalInformationFile != '') {
                    copy("$TmpUploadDir/$SuppplementalInformationFile", "$DirUploads/$SuppplementalInformationFile");
                }
                if ($WeatherDataFile != '') {
                    copy("$TmpUploadDir/$WeatherDataFile", "$DirUploads/$WeatherDataFile");
                }
                if ($SoilDataFile != '') {
                    copy("$TmpUploadDir/$SoilDataFile", "$DirUploads/$SoilDataFile");
                }
                //fin: SE MUEVEN LOS ARCHIVOS AL REPOSITORIO FINAL
                $Grabados++;
            } else {
                $ErrorresFilas .= "<img width=13 height=13 src=/images/Arrow-icon.png> <b>Fila $row:</b> (" . substr($InfoCheckFieldsBatchTrialInfo['info'], 2, (strlen($InfoCheckFieldsBatchTrialInfo['info']) - 1)) . ") <br>";
                $Errores++;
            }
        } else {
            $ErrorresFilas .= "<img width=13 height=13 src=/images/Arrow-icon.png> <b>Fila $row:</b> (Not Trial or Code Trial) <br>";
            $Errores++;
        }
        $fila_actual = ($row - 1);
        $porcentaje = $fila_actual * 100 / $TotalRecord; //saco mi valor en porcentaje
        echo "<script>ProgressTrialInfo(" . round($porcentaje) . ",$fila_actual,$TotalRecord);</script>";
        echo "<script>CounterTrialInfo($Grabados,$Errores);</script>";
        flush();
        ob_flush();
    }

    if ($Errores > 0) {
        echo "<script>ErroresTrialInfo('$ErrorresFilas');</script>";
        flush();
        ob_flush();
    }

    $InfoReadTrialInfoTemplate['ArrTrialInfo'] = $ArrTrialInfo;

    return $InfoReadTrialInfoTemplate;
}

function ReadTrialInfoDataTemplate($ArrTrialInfo) {
    $user = sfContext::getInstance()->getUser();
    $connection = Doctrine_Manager::getInstance()->connection();
    $id_user = sfContext::getInstance()->getUser()->getGuardUser()->getId();
    $NowDate = date("Y-m-d") . " " . date("H:i:s");
    ini_set("memory_limit", "2048M");
    set_time_limit(900000000000);
    $UploadDir = sfConfig::get("sf_upload_dir");
    $TmpUploadDir = $UploadDir . "/tmp$id_user";
    $ErrorresFilas = "";

    foreach ($ArrTrialInfo AS $id_trialinfo => $TrialInfoDataTemplateFile) {
        $TbTrialinfo = Doctrine::getTable('TbTrialinfo')->findOneByIdTrialinfo($id_trialinfo);
        $id_crop = $TbTrialinfo->getIdCrop();
        $id_trial = $TbTrialinfo->getIdTrial();
        $DirUploads = "$UploadDir/FilesTrial$id_trial";
        $PathTrialInfoTemplateFile = "$DirUploads/$TrialInfoDataTemplateFile";
        if (file_exists($PathTrialInfoTemplateFile)) {
            $extension = explode(".", $TrialInfoDataTemplateFile);
            $lenght = count($extension);
            $TrialInfoDataTemplateFileExt = strtoupper($extension[$lenght - 1]);
            if ((!($TrialInfoDataTemplateFileExt == "XLS")) || ($TrialInfoDataTemplateFileSizeMB < 0) || ($TrialInfoDataTemplateFileSizeMB > 5) || ($TrialInfoDataTemplateFileSizeMB > 5)) {
                $Forma = "TrialFileErrorTemplates";
                die(include("../lib/html/HTML.php"));
            }

            $ExcelFileTrialInfoData = new Spreadsheet_Excel_Reader();
            $ExcelFileTrialInfoData->setOutputEncoding('UTF-8');
            $ExcelFileTrialInfoData->read($PathTrialInfoTemplateFile);
            error_reporting(E_ALL ^ E_NOTICE);
            $NumRows = $ExcelFileTrialInfoData->sheets[0]['numRows'];
            $NumCols = $ExcelFileTrialInfoData->sheets[0]['numCols'];
            $TotalRecord = $NumRows - 1;
            //AQUI CAPTURAMOS LAS VARIABLES MEDIDAS
            $Arr_variablesmeasured_id = null;
            for ($col = 3; $col <= $NumCols; $col++) {
                $Vrmsname = $ExcelFileTrialInfoData->sheets[0]['cells'][1][$col];
                $Vrmsname = mb_convert_encoding($Vrmsname, 'UTF-8');
                $Vrmsname = mb_strtoupper($Vrmsname, 'UTF-8');
                $QUERY00 = "SELECT V.id_variablesmeasured FROM tb_variablesmeasured V WHERE id_crop = $id_crop AND UPPER(V.vrmsname) = '$Vrmsname'";
                $st = $connection->execute($QUERY00);
                $Result = $st->fetchAll();
                if (count($Result) > 0) {
                    foreach ($Result AS $Value) {
                        $Arr_variablesmeasured_id[$col] = $Value['id_variablesmeasured'];
                    }
                }
            }

            //AQUI CAPTURAMOS LAS VARIEDADES
            $Arr_variety_id = null;
            for ($row = 2; $row <= $NumRows; ++$row) {
                $Vrtname = $ExcelFileTrialInfoData->sheets[0]['cells'][$row][2];
                $Vrtname = mb_convert_encoding($Vrtname, 'UTF-8');
                $Vrtname = mb_strtoupper($Vrtname, 'UTF-8');
                $QUERY01 = "SELECT V.id_variety FROM tb_variety V WHERE id_crop = $id_crop AND UPPER(V.vrtname) = '$Vrtname'";
                $st = $connection->execute($QUERY01);
                $Result = $st->fetchAll();
                if (count($Result) > 0) {
                    foreach ($Result AS $Value) {
                        $Arr_variety_id[$row] = $Value['id_variety'];
                    }
                }
            }
            //AQUI CUNSULTAMOS LAS FILAS QUE CONTIENE LAS REPLICACION-VARIEDAD-VALOR VARIABLE MEDIDA
            TbTrialinfodataTable::delTrialinfodata($id_trialinfo);
            $Grabados = 0;
            $Errores = 0;
            for ($row = 2; $row <= $NumRows; ++$row) {
                $trnfdtreplication = "";
                $id_variety = "";
                $id_variablesmeasured = "";
                $trnfdtvalue = "";
                $trnfdtreplication = $ExcelFileTrialInfoData->sheets[0]['cells'][$row][1];
                $id_variety = $Arr_variety_id[$row];
                $FlagError = true;
                for ($col = 3; $col <= $NumCols; $col++) {
                    $id_variablesmeasured = $Arr_variablesmeasured_id[$col];
                    $trnfdtvalue = $ExcelFileTrialInfoData->sheets[0]['cells'][$row][$col];
                    if (($id_trialinfo != '') && ($trnfdtreplication != '') && ($id_variety != '') && ($id_variablesmeasured != '')) {
                        TbTrialinfodataTable::addTrialinfodata($id_trialinfo, $trnfdtreplication, $id_variety, $id_variablesmeasured, $trnfdtvalue);
                        $Grabados++;
                    } else {
                        $Errores++;
                        if (($FlagError) && ($id_trialinfo != '')) {
                            $ErrorresFilas .= "<img width=13 height=13 src=/images/Arrow-icon.png> <b>$TrialInfoDataTemplateFile <img width=13 height=13 src=/images/Arrow-icon.png> Fila $row:</b> Error in the name (Variety or Variables Measured) <br>";
                            $FlagError = false;
                        }
                    }
                }
                $fila_actual = ($row - 1);
                $porcentaje = $fila_actual * 100 / $TotalRecord; //saco mi valor en porcentaje
                echo "<script>ProgressTrialInfoData(" . round($porcentaje) . ",$fila_actual,$TotalRecord);</script>";
                //echo "<script>CounterTrialInfoData($Grabados,$Errores);</script>";
                echo "<script>ReadingFile('$TrialInfoDataTemplateFile');</script>";
                flush();
                ob_flush();
            }

            if ($Errores > 0) {
                echo "<script>ErroresTrialInfoData('$ErrorresFilas');</script>";
                flush();
                ob_flush();
            }
        }
    }
}

function CloseProcess($TmpUploadDir) {
    //FINALIZAMOS EL PROCESO
    $TmpUploadDir = str_replace('/', '\\', $TmpUploadDir);
    if (@chdir($TmpUploadDir)) {
        $command = "rmdir /s /q " . $TmpUploadDir;
        exec($command);
    }
    echo "<script>FinishedProcess();</script>";
    die();
}

?>
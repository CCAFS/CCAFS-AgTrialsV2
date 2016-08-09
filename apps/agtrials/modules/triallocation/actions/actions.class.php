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

require_once dirname(__FILE__) . '/../lib/triallocationGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/triallocationGeneratorHelper.class.php';
require_once '../lib/functions/function.php';

/**
 * triallocation actions.
 *
 * @package    AgTrials
 * @subpackage triallocation
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class triallocationActions extends autoTriallocationActions {

    public function executeNew(sfWebRequest $request) {
        $this->form = $this->configuration->getForm();
        $this->tb_triallocation = $this->form->getObject();
    }

    public function executeDelete(sfWebRequest $request) {

        //VERIFICAMOS LOS PERMISOS DE MODIFICACION
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_triallocation = $request->getParameter("id_triallocation");
        $Query00 = Doctrine::getTable('TbTriallocation')->findOneByIdTriallocation($id_triallocation);
        $id_user_registro = $Query00->getIdUser();
        $user = $this->getUser();

        //VERIFICA SI ES EL USUARIO CREADOR Ó TIENE PERMISOS DE ADMIN(1)
        if (!($id_user == $id_user_registro || (CheckUserPermission($id_user, "1")))) {
            $this->getUser()->setAttribute('Notice', "<b>Error: </b>Not have permission to Delete!");
            $this->redirect("/triallocation");
        }
    }

    public function executeEdit(sfWebRequest $request) {
        $this->tb_triallocation = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->tb_triallocation);

        //VERIFICAMOS LOS PERMISOS DE MODIFICACION
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_triallocation = $request->getParameter("id_triallocation");
        $Query00 = Doctrine::getTable('TbTriallocation')->findOneByIdTriallocation($id_triallocation);
        $id_user_registro = $Query00->getIdUser();
        $user = $this->getUser();

        //VERIFICA SI ES EL USUARIO CREADOR Ó TIENE PERMISOS DE ADMIN(1)
        if (!($id_user == $id_user_registro || (CheckUserPermission($id_user, "1")))) {
            $this->getUser()->setAttribute('Notice', "<b>Error: </b>Not have permission to Edit!");
            $this->redirect("/triallocation");
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
            $tb_triallocation = $form->save();
            $id_triallocation = $tb_triallocation->getIdTriallocation();

            //inicio: GRABAMOS LA INFORMACION DE DIVISION ADMINISTRATIVA
            $id_countrytriallocation = $request->getParameter("id_countrytriallocation");
            $id_districttriallocation = $request->getParameter("id_districttriallocation");
            $id_subdistricttriallocation = $request->getParameter("id_subdistricttriallocation");
            $id_villagetriallocation = $request->getParameter("id_villagetriallocation");
            if ($id_triallocation != '' && $id_countrytriallocation != '') {
                TbTriallocationadministrativedivisionTable::addTriallocationadministrativedivision($id_triallocation, $id_countrytriallocation);
            }
            if ($id_triallocation != '' && $id_districttriallocation != '') {
                TbTriallocationadministrativedivisionTable::addTriallocationadministrativedivision($id_triallocation, $id_districttriallocation);
            }
            if ($id_triallocation != '' && $id_subdistricttriallocation != '') {
                TbTriallocationadministrativedivisionTable::addTriallocationadministrativedivision($id_triallocation, $id_subdistricttriallocation);
            }
            if ($id_triallocation != '' && $id_villagetriallocation != '') {
                TbTriallocationadministrativedivisionTable::addTriallocationadministrativedivision($id_triallocation, $id_villagetriallocation);
            }
            //fin: GRABAMOS LA INFORMACION DE DIVISION ADMINISTRATIVA


            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $tb_triallocation)));

            if ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');

                $this->redirect('@tb_triallocation_new');
            } else {
                $this->getUser()->setFlash('notice', $notice);

                $this->redirect(array('sf_route' => 'tb_triallocation_edit', 'sf_subject' => $tb_triallocation));
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    public function executeLocationcoordinates($request) {
        $this->setLayout(false);
    }

    public function executeAutocompletetriallocation(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $term = $request->getParameter('term');
        $QUERY = "SELECT T.id_triallocation AS value, T.trlcname AS label,T.trlclatitude AS trlclatitude,T.trlclongitude AS trlclongitude,T.trlcaltitude AS trlcaltitude, ";
        $QUERY .= "fc_Triallocationadministrativedivision(T.id_triallocation, 1) AS country, ";
        $QUERY .= "fc_Triallocationadministrativedivision(T.id_triallocation, 2) AS district, ";
        $QUERY .= "fc_Triallocationadministrativedivision(T.id_triallocation, 3) AS subdistrict, ";
        $QUERY .= "fc_Triallocationadministrativedivision(T.id_triallocation, 4) AS village ";
        $QUERY .= "FROM tb_triallocation T ";
        $QUERY .= "WHERE UPPER(T.trlcname) LIKE UPPER('$term%') ";
        $QUERY .= "ORDER BY T.trlcname";
        $st = $connection->execute($QUERY);
        $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        return $this->renderText(json_encode($R_datos));
    }

    public function executeDownloadestruturetriallocation(sfWebRequest $request) {
        $connection = Doctrine_Manager::getInstance()->connection();
        error_reporting(E_ALL);
        date_default_timezone_set('Europe/London');
        ini_set("memory_limit", "2048M");
        set_time_limit(900000000000);

        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Set properties
        $objPHPExcel->getProperties()->setCreator("www.agtrials.org")
                ->setLastModifiedBy("www.agtrials.org")
                ->setTitle("Trial Location Template File")
                ->setSubject("Trial Location Template File")
                ->setDescription("Trial Location Template File")
                ->setKeywords("Trial Location Template File")
                ->setCategory("Trial Location Template File");

        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Name')
                ->setCellValue('B1', 'Latitude')
                ->setCellValue('C1', 'Longitude')
                ->setCellValue('D1', 'Altitude')
                ->setCellValue('E1', 'Country')
                ->setCellValue('F1', 'District/Satate')
                ->setCellValue('G1', 'Sub-district/Division')
                ->setCellValue('H1', 'Village');

        //APLICAMOS NEGRILLA AL TITULO
        $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);
        //APLICAMOS COLOR ROJO A COLUMNAS OBLIGATORIAS
        $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

        //RENOMBRAMOS EL LIBO
        $objPHPExcel->getActiveSheet(0)->setTitle('Batch Upload Information');

        //inicio: GENERAMOS EL LIBRO DE Administrative Division
        $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet(1)->setTitle('Administrative Division');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Country');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'District/Satate');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Sub-district/Division');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Village');

        $QUERY00 = "SELECT (ADM1.dmdvname) AS country, ";
        $QUERY00 .= "(ADM2.dmdvname) AS districtsatate, ";
        $QUERY00 .= "(ADM3.dmdvname) AS subdistrictdivision, ";
        $QUERY00 .= "(ADM4.dmdvname) AS village ";
        $QUERY00 .= "FROM tb_administrativedivision ADM1 ";
        $QUERY00 .= "LEFT JOIN tb_administrativedivision ADM2 ON ADM1.id_administrativedivision = ADM2.id_parent ";
        $QUERY00 .= "LEFT JOIN tb_administrativedivision ADM3 ON ADM2.id_administrativedivision = ADM3.id_parent ";
        $QUERY00 .= "LEFT JOIN tb_administrativedivision ADM4 ON ADM3.id_administrativedivision = ADM4.id_parent ";
        $QUERY00 .= "WHERE ADM1.id_administrativedivisiontype = 1 ";
        $QUERY00 .= "ORDER BY 1,2,3,4 ";
        $st = $connection->execute($QUERY00);
        $Resultado00 = $st->fetchAll();
        $i = 2;
        foreach ($Resultado00 AS $fila) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila['country']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila['districtsatate']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $fila['subdistrictdivision']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $fila['village']);
            $i++;
        }

        //APLICAMOS NEGRILLA AL TITULO
        $objPHPExcel->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        //fin: GENERAMOS EL LIBRO DE Administrative Division
        //
        //
        //ACTIVAMOS EL PRIMER LIBRO
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a clientâ€™s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="TrialLocationTemplateFile.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    public function executeChecktriallocation(sfWebRequest $request) {
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('id_country');
    }

    public function executeAssigncountry($request) {
        $HTML = "";
        $connection = Doctrine_Manager::getInstance()->connection();
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('id_country');
        $id_country = $request->getParameter('id_country');
        $user = sfContext::getInstance()->getUser();
        $user->setAttribute('id_country', $id_country);
        if ($id_country != '') {
            $QUERY01 = "SELECT substring(UPPER(TL.trlcname) FROM 1 FOR 1) AS letter ";
            $QUERY01 .= "FROM tb_triallocation TL ";
            $QUERY01 .= "INNER JOIN tb_triallocationadministrativedivision ADMTL ON TL.id_triallocation = ADMTL.id_triallocation ";
            $QUERY01 .= "INNER JOIN tb_administrativedivision ADM ON ADMTL.id_administrativedivision = ADM.id_administrativedivision ";
            $QUERY01 .= "WHERE ADM.id_administrativedivisiontype = 1 ";
            $QUERY01 .= "AND ADM.id_administrativedivision = $id_country ";
            $QUERY01 .= "GROUP BY 1 ";
            $QUERY01 .= "ORDER BY 1 ";
            $st = $connection->execute($QUERY01);
            $Record = $st->fetchAll();
            foreach ($Record AS $Value) {
                $Letter = $Value['letter'];
                $HTML .= "<a href='#' title=\"Search by $Letter\" onclick=\"SelectLetter('$Letter');\"><b><u>$Letter</u></b></a>&ensp;&ensp;";
            }
        }
        die($HTML);
    }

    public function executeSelectletter(sfWebRequest $request) {
        $user = sfContext::getInstance()->getUser();
        $id_country = $user->getAttribute('id_country');
        $Letter = $request->getParameter('letter');
        $ArrHTML = null;
        $HTMLInfoResult = "";
        $HTMLDataResult = "";

        $connection = Doctrine_Manager::getInstance()->connection();
        $QUERY01 = "SELECT TL.id_triallocation,TL.trlcname,TL.trlclatitude,TL.trlclongitude,TL.trlcaltitude ";
        $QUERY01 .= "FROM tb_triallocation TL ";
        $QUERY01 .= "INNER JOIN tb_triallocationadministrativedivision ADMTL ON TL.id_triallocation = ADMTL.id_triallocation ";
        $QUERY01 .= "INNER JOIN tb_administrativedivision ADM ON ADMTL.id_administrativedivision = ADM.id_administrativedivision ";
        $QUERY01 .= "WHERE ADM.id_administrativedivisiontype = 1 ";
        $QUERY01 .= "AND ADM.id_administrativedivision = $id_country ";
        $QUERY01 .= "AND UPPER(TL.trlcname) LIKE '$Letter%' ";
        $QUERY01 .= "ORDER BY TL.trlcname ";
        $st = $connection->execute($QUERY01);
        $Record = $st->fetchAll();
        $total = count($Record);
        $ListIdTrialSite = "";
        $HTMLInfoResult = "Found Results by '$Letter' <span class='badge' id='CountResults'>$total</span>";
        foreach ($Record AS $Value) {
            $id_triallocation = $Value['id_triallocation'];
            $trlcname = $Value['trlcname'];
            $latitude = round($Value['trlclatitude'], 4);
            $longitude = round($Value['trlclongitude'], 4);
            $altitude = $Value['trlcaltitude'];
            $View = "<span title='View' onclick=\"window.open('/viewtriallocation/info/$id_triallocation','ViewTrialLocation','height=630,width=900,scrollbars=1')\" id='View' class='Span-Action-Link name='><span aria-hidden='true' class='glyphicon glyphicon-eye-open'></span> View</span>";
            $HTMLDataResult .= "<tr>";
            $HTMLDataResult .= "<td class='col-xs-5'>$trlcname</td>";
            $HTMLDataResult .= "<td class='col-xs-2'>$latitude</td>";
            $HTMLDataResult .= "<td class='col-xs-2'>$longitude</td>";
            $HTMLDataResult .= "<td class='col-xs-2'>$altitude</td>";
            $HTMLDataResult .= "<td class='col-xs-1'>$View</td>";
            $HTMLDataResult .= "</tr>";
        }
        $ArrHTML['InfoResult'] = $HTMLInfoResult;
        $ArrHTML['DataResult'] = $HTMLDataResult;
        $JSONHTML = json_encode($ArrHTML);
        die($JSONHTML);
    }

    public function executeViewtriallocation(sfWebRequest $request) {
        $this->setLayout(false);
        $id_trialsite = $request->getParameter('info');
        $connection = Doctrine_Manager::getInstance()->connection();
        $QUERY01 = "SELECT TL.id_triallocation,TL.trlcname,TL.trlclatitude,TL.trlclongitude,TL.trlcaltitude, ";
        $QUERY01 .= "fc_triallocationadministrativedivisionname(TL.id_triallocation,1) AS country, ";
        $QUERY01 .= "fc_triallocationadministrativedivisionname(TL.id_triallocation,2) AS district, ";
        $QUERY01 .= "fc_triallocationadministrativedivisionname(TL.id_triallocation,3) AS subdistrict, ";
        $QUERY01 .= "fc_triallocationadministrativedivisionname(TL.id_triallocation,4) AS village ";
        $QUERY01 .= "FROM tb_triallocation TL ";
        $QUERY01 .= "WHERE TL.id_triallocation = $id_trialsite ";
        $st = $connection->execute($QUERY01);
        $Record = $st->fetchAll();
        $this->TbTriallocation = $Record;
    }

    public function executeCheckbatchtriallocation(sfWebRequest $request) {
        //PARAMETROS
        $connection = Doctrine_Manager::getInstance()->connection();
        $Modulo = "Check Batch Trial Location";
        $Downloadresultcheckbatch = "/downloadresultcheckbatchtriallocation";
        $Cols = 2;
        $MaxRecordsFile = 50000;
        $MaxSizeFile = 5; // ESTE VALOR ES EN MB
        $GenerateFile = false;

        $id_user = $this->getUser()->getGuardUser()->getId();
        ini_set("memory_limit", "2048M");
        set_time_limit(900000000000);
        $UploadDir = sfConfig::get("sf_upload_dir");
        $Uploadstriallocation = $UploadDir . "/tmp$id_user";
        if (!is_dir($Uploadstriallocation)) {
            mkdir($Uploadstriallocation, 0777);
        }

        //ARCHIVO
        $File = $request->getFiles('checkbatchtriallocationfile');
        $FileSize = $File['size'];
        $FileType = $File['type'];
        $FileName = $File['name'];
        $FileTmpName = $File['tmp_name'];
        $FileSizeMB = round(($FileSize / 1048576), 2);

        //CREAMOS EL ARCHIVO DE SALIDA
        $PathFile = "$Uploadstriallocation/ResultCheckBatchTrialLocation.xls";
        if (file_exists($PathFile))
            unlink($PathFile);


        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("AgTrials")
                ->setLastModifiedBy("AgTrials")
                ->setTitle("Result check batch trial location")
                ->setSubject("Result check batch trial location")
                ->setDescription("Result check batch trial location")
                ->setKeywords("Result check batch trial location")
                ->setCategory("Result check batch trial location");
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Code')
                ->setCellValue('B1', 'Country')
                ->setCellValue('C1', 'Correct Name');

        $objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);

        $objPHPExcel->getActiveSheet(0)->setTitle('Founds');
        $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet(1)->setTitle('Posibles');
        $objPHPExcel->setActiveSheetIndex(1)
                ->setCellValue('A1', 'Country')
                ->setCellValue('B1', 'Original Name')
                ->setCellValue('C1', 'Posibles Names');

        $objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(2);
        $objPHPExcel->getActiveSheet(2)->setTitle('Not Founds');
        $objPHPExcel->setActiveSheetIndex(2)
                ->setCellValue('A1', 'Country')
                ->setCellValue('B1', 'Name');
        $objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

        if ($FileName != '') {
            $GenerateFile = true;
            $extension = explode(".", $FileName);
            $FileExt = strtoupper($extension[1]);
            if ((!($FileExt == "XLS")) || ($FileSizeMB < 0) || ($FileSizeMB > 5) || ($DataFileSizeMB > 5)) {
                $Forma = "FileErrorTemplates";
                die(include("../lib/html/HTML.php"));
            }

            move_uploaded_file($FileTmpName, "$Uploadstriallocation/$FileName");
            $inputFileName = "$Uploadstriallocation/$FileName";

            $ExcelFileInfo = PHPExcel_IOFactory::load($inputFileName);
            $ArrayData = $ExcelFileInfo->getActiveSheet()->toArray(null, true, true, true);
            unset($ArrayData[1]);
            $NumRows = count($ArrayData);
            $NumCols = count($ArrayData[2]);


            $TotalRecord = $NumRows;
            if ($Cols != $NumCols) {
                $Forma = "FileErrorCheckTemplatesCols";
                die(include("../lib/html/HTML.php"));
            }

            if ($TotalRecord > $MaxRecordsFile) {
                $Forma = "FileErrorCheckTemplatesRecords";
                die(include("../lib/html/HTML.php"));
            }

            $Forma = "BodyCheck";
            include("../lib/html/HTML.php");
            $error_filas = "";
            $grabados = 0;
            $errores = 0;
            $row = 2;

            $i = 2;
            $a = 2;
            $x = 2;

            foreach ($ArrayData AS $ArrayRow) {
                $banderaerrorfila = false;
                $country = trim($ArrayRow['A']);
                $trlcname = trim($ArrayRow['B']);
                $country = str_replace("'", "''", $country);


                $QUERYC = "SELECT id_administrativedivision,dmdvname FROM tb_administrativedivision WHERE dmdvname ILIKE '%$country%' AND id_administrativedivisiontype = 1";
                $ResultC = $connection->execute($QUERYC);
                $DataResultC = $ResultC->fetchAll();
                if (count($DataResultC) > 0) {
                    foreach ($DataResultC AS $Value) {
                        $id_country = $Value[0];
                        $country = $Value[1];
                    }
                }

                //AQUI REALIZAMOS LA VALIDACION Y/O BUSQUEDA DE POSIBLES VALORES
                if (($id_country != '') && ($trlcname != '')) {
                    $trlcname = str_replace("'", "''", $trlcname);
                    $QUERY00 = "SELECT TL.id_triallocation,TL.trlcname,TL.trlclatitude,TL.trlclongitude,TL.trlcaltitude ";
                    $QUERY00 .= "FROM tb_triallocation TL ";
                    $QUERY00 .= "INNER JOIN tb_triallocationadministrativedivision ADMTL ON TL.id_triallocation = ADMTL.id_triallocation ";
                    $QUERY00 .= "INNER JOIN tb_administrativedivision ADM ON ADMTL.id_administrativedivision = ADM.id_administrativedivision ";
                    $QUERY00 .= "WHERE ADM.id_administrativedivisiontype = 1 ";
                    $QUERY00 .= "AND ADM.id_administrativedivision = $id_country ";
                    $QUERY00 .= "AND UPPER(REPLACE(trlcname,' ','')) = UPPER(REPLACE('$trlcname',' ','')) ";
                    $QUERY00 .= "ORDER BY TL.trlcname ";

                    $Result00 = $connection->execute($QUERY00);
                    $DataResult00 = $Result00->fetchAll();
                    if (count($DataResult00) > 0) {
                        foreach ($DataResult00 AS $Value) {
                            $id_triallocation = $Value[0];
                            $trlcname = $Value[1];
                        }
                        $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue("A$i", $id_triallocation)
                                ->setCellValue("B$i", $country)
                                ->setCellValue("C$i", $trlcname);
                        $i++;
                    } else {
                        $QUERY01 = "SELECT TL.id_triallocation,TL.trlcname ";
                        $QUERY01 .= "FROM tb_triallocation TL ";
                        $QUERY01 .= "INNER JOIN tb_triallocationadministrativedivision ADMTL ON TL.id_triallocation = ADMTL.id_triallocation ";
                        $QUERY01 .= "INNER JOIN tb_administrativedivision ADM ON ADMTL.id_administrativedivision = ADM.id_administrativedivision ";
                        $QUERY01 .= "WHERE ADM.id_administrativedivisiontype = 1 ";
                        $QUERY01 .= "AND ADM.id_administrativedivision = $id_country ";
                        $QUERY01 .= "AND UPPER(REPLACE(trlcname,' ','')) LIKE '%'||UPPER(REPLACE('$trlcname',' ',''))||'%'";
                        $QUERY01 .= "ORDER BY TL.trlcname ";
                        $ResultQUERY01 = $connection->execute($QUERY01);
                        $DataResult01 = $ResultQUERY01->fetchAll();
                        $ListPosibles = "";
                        if (count($DataResult01) > 0) {
                            foreach ($DataResult01 AS $Value) {
                                $ListPosibles .= $Value[1] . ", ";
                            }
                            $ListPosibles = substr($ListPosibles, 0, strlen($ListPosibles) - 2);
                            $objPHPExcel->setActiveSheetIndex(1)
                                    ->setCellValue("A$a", $country)
                                    ->setCellValue("B$a", $trlcname)
                                    ->setCellValue("C$a", $ListPosibles);
                            $a++;
                        } else {
                            $objPHPExcel->setActiveSheetIndex(2)
                                    ->setCellValue("A$x", $country)
                                    ->setCellValue("B$x", $trlcname);
                            $x++;
                        }
                    }
                }

                $fila_actual = ( $row - 1);
                $porcentaje = $fila_actual * 100 / $TotalRecord; //saco mi valor en porcentaje
                echo "<script>callprogress(" . round($porcentaje) . ",$fila_actual,$TotalRecord);</script>";
                flush();
                ob_flush();
                echo "<script>counter($grabados,$errores);</script>";
                flush();
                ob_flush();
                $row++;
            }

            echo "<script>FinishedProcess();</script>";
            if ($errores > 0)
                echo "<script>errores('$error_filas');</script>";
        }

        if ($GenerateFile) {
            $objPHPExcel->setActiveSheetIndex(0);
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save($PathFile);
            die();
        }
        $this->MaxRecordsFile = $MaxRecordsFile;
        $this->MaxSizeFile = $MaxSizeFile;
        $this->Cols = $Cols;
    }

    public function executeDownloadcheckbatchtriallocation(sfWebRequest $request) {
        $UploadDir = sfConfig::get("sf_upload_dir");
        $PathFileTemplate = $UploadDir . "/Templates/ChecktriallocationTemplate.xls";
        if (file_exists($PathFileTemplate)) {
            header('Content-Disposition: attachment; filename="ChecktriallocationTemplate.xls"');
            header("Content-Type: application/octet-stream");
            header("Content-Length: " . filesize($PathFileTemplate));
            readfile($PathFileTemplate);
        }
        die();
    }

    public function executeDownloadresultcheckbatchtriallocation(sfWebRequest $request) {
        $id_user = $this->getUser()->getGuardUser()->getId();
        $UploadDir = sfConfig::get("sf_upload_dir");
        $PathFile = $UploadDir . "/tmp$id_user/ResultCheckBatchTrialLocation.xls";
        if (file_exists($PathFile)) {
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="ResultCheckBatchTrialLocation.xls"');
            readfile($PathFile);
        }
        die();
    }

}

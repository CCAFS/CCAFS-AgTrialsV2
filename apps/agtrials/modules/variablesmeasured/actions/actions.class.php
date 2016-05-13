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

require_once dirname(__FILE__) . '/../lib/variablesmeasuredGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/variablesmeasuredGeneratorHelper.class.php';
require_once '../lib/functions/function.php';

/**
 * variablesmeasured actions.
 *
 * @package    AgTrials
 * @subpackage variablesmeasured
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class variablesmeasuredActions extends autoVariablesmeasuredActions {

    public function executeDownloadestruturevariablesmeasured(sfWebRequest $request) {
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
                ->setTitle("Variables Measured TemplateFile")
                ->setSubject("Variables Measured TemplateFile")
                ->setDescription("Variables Measured TemplateFile")
                ->setKeywords("Variables Measured TemplateFile")
                ->setCategory("Variables Measured TemplateFile");

        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Id Crop')
                ->setCellValue('B1', 'Id Trait class')
                ->setCellValue('C1', 'Name')
                ->setCellValue('D1', 'Short name')
                ->setCellValue('E1', 'Definition')
                ->setCellValue('F1', 'Method')
                ->setCellValue('G1', 'Unit');

        //APLICAMOS NEGRILLA AL TITULO
        $objPHPExcel->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);
        //APLICAMOS COLOR ROJO A COLUMNAS OBLIGATORIAS
        $objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

        //RENOMBRAMOS EL LIBO
        $objPHPExcel->getActiveSheet(0)->setTitle('Batch Upload Information');

        //inicio: GENERAMOS EL LIBRO DE CROP
        $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet(1)->setTitle('Crop');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id Crop');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Name');

        $QUERY00 = "SELECT id_crop AS id, crpname AS name FROM tb_crop ORDER BY crpname";
        $st = $connection->execute($QUERY00);
        $Resultado00 = $st->fetchAll();
        $i = 2;
        foreach ($Resultado00 AS $fila) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila['id']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila['name']);
            $i++;
        }

        //APLICAMOS NEGRILLA AL TITULO
        $objPHPExcel->getActiveSheet()->getStyle('A1:b1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        //fin: GENERAMOS EL LIBRO DE CROP
        //
        //inicio: GENERAMOS EL LIBRO DE Trait Class
        $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(2);
        $objPHPExcel->getActiveSheet(2)->setTitle('Trait Class');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id Trait Class');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Name');

        $QUERY00 = "SELECT id_traitclass AS id, trclname AS name FROM tb_traitclass ORDER BY trclname";
        $st = $connection->execute($QUERY00);
        $Resultado00 = $st->fetchAll();
        $i = 2;
        foreach ($Resultado00 AS $fila) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila['id']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila['name']);
            $i++;
        }

        //APLICAMOS NEGRILLA AL TITULO
        $objPHPExcel->getActiveSheet()->getStyle('A1:b1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        //fin: GENERAMOS EL LIBRO DE Trait Class
        //
        //ACTIVAMOS EL PRIMER LIBRO
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a clientâ€™s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="VariablesMeasuredTemplateFile.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    public function executeCheckvariablesmeasured(sfWebRequest $request) {
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('id_crop');
    }

    public function executeAssigncrop($request) {
        $HTML = "";
        $connection = Doctrine_Manager::getInstance()->connection();
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('id_crop');
        $id_crop = $request->getParameter('id_crop');
        $user = sfContext::getInstance()->getUser();
        $user->setAttribute('id_crop', $id_crop);
        if ($id_crop != '') {
            $QUERY01 = "SELECT substring(UPPER(VM.vrmsname) FROM 1 FOR 1) AS letter ";
            $QUERY01 .= "FROM tb_variablesmeasured VM ";
            $QUERY01 .= "INNER JOIN tb_crop C ON VM.id_crop = C.id_crop ";
            $QUERY01 .= "WHERE C.id_crop = $id_crop ";
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
        $id_crop = $user->getAttribute('id_crop');
        $Letter = $request->getParameter('letter');
        $ArrHTML = null;
        $HTMLInfoResult = "";
        $HTMLDataResult = "";

        $connection = Doctrine_Manager::getInstance()->connection();
        $QUERY01 = "SELECT VM.id_variablesmeasured,VM.vrmsname,C.crpname,TC.trclname,VM.vrmnmethod,VM.vrmsunit,VM.id_ontology ";
        $QUERY01 .= "FROM tb_variablesmeasured VM ";
        $QUERY01 .= "INNER JOIN tb_crop C ON VM.id_crop = C.id_crop ";
        $QUERY01 .= "INNER JOIN tb_traitclass TC ON VM.id_traitclass = TC.id_traitclass ";
        $QUERY01 .= "WHERE C.id_crop = $id_crop ";
        $QUERY01 .= "AND UPPER(VM.vrmsname) LIKE '$Letter%' ";
        $QUERY01 .= "ORDER BY VM.vrmsname ";
        $st = $connection->execute($QUERY01);
        $Record = $st->fetchAll();
        $total = count($Record);
        $ListIdTrialSite = "";
        $HTMLInfoResult = "Found Results by '$Letter' <span class='badge' id='CountResults'>$total</span>";
        foreach ($Record AS $Value) {
            $View = "";
            $id_variablesmeasured = $Value['id_variablesmeasured'];
            $vrmsname = $Value['vrmsname'];
            $crpname = $Value['crpname'];
            $trclname = $Value['trclname'];
            $vrmnmethod = $Value['vrmnmethod'];
            $vrmsunit = $Value['vrmsunit'];
            $id_ontology = $Value['id_ontology'];
            if ($id_ontology != '')
                $View = "<span title='View' onclick=\"window.open('http://www.cropontology-curationtool.org/terms/$id_ontology/Stem%20rust/static-html','cropontology-curationtool','height=800,width=900,scrollbars=1')\" id='View' class='Span-Action-Link name='><span aria-hidden='true' class='glyphicon glyphicon-eye-open'></span> View</span>";
            $HTMLDataResult .= "<tr>";
            $HTMLDataResult .= "<td class='col-xs-5'>$vrmsname</td>";
            $HTMLDataResult .= "<td class='col-xs-2'>$trclname</td>";
            $HTMLDataResult .= "<td class='col-xs-2'>$vrmnmethod</td>";
            $HTMLDataResult .= "<td class='col-xs-2'>$vrmsunit</td>";
            $HTMLDataResult .= "<td class='col-xs-1'>$View</td>";
            $HTMLDataResult .= "</tr>";
        }
        $ArrHTML['InfoResult'] = $HTMLInfoResult;
        $ArrHTML['DataResult'] = $HTMLDataResult;
        $JSONHTML = json_encode($ArrHTML);
        die($JSONHTML);
    }

    public function executeCheckbatchvariablesmeasured(sfWebRequest $request) {
        //PARAMETROS
        $connection = Doctrine_Manager::getInstance()->connection();
        $Modulo = "Check batch variables measured";
        $Downloadresultcheckbatch = "/downloadresultcheckbatchvariablesmeasured";
        $Cols = 1;
        $MaxRecordsFile = 50000;
        $MaxSizeFile = 5; // ESTE VALOR ES EN MB
        $GenerateFile = false;

        $id_user = $this->getUser()->getGuardUser()->getId();
        ini_set("memory_limit", "2048M");
        set_time_limit(900000000000);
        $UploadDir = sfConfig::get("sf_upload_dir");
        $UploadsVariablesmeasured = $UploadDir . "/tmp$id_user";
        if (!is_dir($UploadsVariablesmeasured)) {
            mkdir($UploadsVariablesmeasured, 0777);
        }

        //ARCHIVO
        $File = $request->getFiles('checkbatchvariablesmeasuredfile');
        $FileSize = $File['size'];
        $FileType = $File['type'];
        $FileName = $File['name'];
        $FileTmpName = $File['tmp_name'];
        $FileSizeMB = round(($FileSize / 1048576), 2);

        //CREAMOS EL ARCHIVO DE SALIDA
        $PathFile = "$UploadsVariablesmeasured/ResultCheckBatchVariablesmeasured.xls";
        if (file_exists($PathFile))
            unlink($PathFile);

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("AgTrials")
                ->setLastModifiedBy("AgTrials")
                ->setTitle("Result check batch variables measured")
                ->setSubject("Result check batch variables measured")
                ->setDescription("Result check batch variables measured")
                ->setKeywords("Result check batch variables measured")
                ->setCategory("Result check batch variables measured");
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Code')
                ->setCellValue('B1', 'Correct Name');

        $objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

        $objPHPExcel->getActiveSheet(0)->setTitle('Founds');
        $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet(1)->setTitle('Posibles');
        $objPHPExcel->setActiveSheetIndex(1)
                ->setCellValue('A1', 'Original Name')
                ->setCellValue('B1', 'Posibles Names');
        $objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(2);
        $objPHPExcel->getActiveSheet(2)->setTitle('Not Founds');
        $objPHPExcel->setActiveSheetIndex(2)
                ->setCellValue('A1', 'Name');
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);

        if ($FileName != '') {
            $GenerateFile = true;
            $id_crop = $request->getParameter('id_crop');
            $extension = explode(".", $FileName);
            $FileExt = strtoupper($extension[1]);
            if ((!($FileExt == "XLS")) || ($FileSizeMB < 0) || ($FileSizeMB > 5) || ($DataFileSizeMB > 5)) {
                $Forma = "FileErrorTemplates";
                die(include("../lib/html/HTML.php"));
            }

            move_uploaded_file($FileTmpName, "$uploadstriallocation/$FileName");
            $inputFileName = "$uploadstriallocation/$FileName";


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
                $vrmsname = trim($ArrayRow['A']);

                //AQUI REALIZAMOS LA VALIDACION Y/O BUSQUEDA DE POSIBLES VALORES
                if ($vrmsname != '') {
                    $vrmsname = str_replace("'", "''", $vrmsname);
                    $QUERY00 = "SELECT VM.id_variablesmeasured,VM.vrmsname  ";
                    $QUERY00 .= "FROM tb_variablesmeasured VM ";
                    $QUERY00 .= "WHERE VM.id_crop = $id_crop ";
                    $QUERY00 .= "AND UPPER(REPLACE(VM.vrmsname,' ','')) = UPPER(REPLACE('$vrmsname',' ','')) ";
                    $QUERY00 .= "ORDER BY VM.vrmsname ";

                    $Result00 = $connection->execute($QUERY00);
                    $DataResult00 = $Result00->fetchAll();
                    if (count($DataResult00) > 0) {
                        foreach ($DataResult00 AS $Value) {
                            $id_variablesmeasured = $Value[0];
                            $vrmsname = $Value[1];
                        }
                        $objPHPExcel->setActiveSheetIndex(0)
                                ->setCellValue("A$i", $id_variablesmeasured)
                                ->setCellValue("B$i", $vrmsname);
                        $i++;
                    } else {
                        $QUERY01 = "SELECT VM.id_variablesmeasured,VM.vrmsname  ";
                        $QUERY01 .= "FROM tb_variablesmeasured VM ";
                        $QUERY01 .= "WHERE VM.id_crop = $id_crop ";
                        $QUERY01 .= "AND UPPER(REPLACE(VM.vrmsname,' ','')) LIKE '%'||UPPER(REPLACE('$vrmsname',' ',''))||'%'";
                        $QUERY01 .= "ORDER BY VM.vrmsname ";

                        $ResultQUERY01 = $connection->execute($QUERY01);
                        $DataResult01 = $ResultQUERY01->fetchAll();
                        $ListPosibles = "";
                        if (count($DataResult01) > 0) {
                            foreach ($DataResult01 AS $Value) {
                                $ListPosibles .= $Value[1] . ", ";
                            }
                            $ListPosibles = substr($ListPosibles, 0, strlen($ListPosibles) - 2);
                            $objPHPExcel->setActiveSheetIndex(1)
                                    ->setCellValue("A$a", $vrmsname)
                                    ->setCellValue("B$a", $ListPosibles);
                            $a++;
                        } else {
                            $objPHPExcel->setActiveSheetIndex(2)
                                    ->setCellValue("A$x", $vrmsname);
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

    public function executeDownloadcheckbatchvariablesmeasured(sfWebRequest $request) {
        $UploadDir = sfConfig::get("sf_upload_dir");
        $PathFileTemplate = $UploadDir . "/Templates/CheckVariablesmeasuredTemplate.xls";
        if (file_exists($PathFileTemplate)) {
            header('Content-Disposition: attachment; filename="CheckVariablesmeasuredTemplate.xls"');
            header("Content-Type: application/octet-stream");
            header("Content-Length: " . filesize($PathFileTemplate));
            readfile($PathFileTemplate);
        }
        die();
    }

    public function executeDownloadresultcheckbatchvariablesmeasured(sfWebRequest $request) {
        $id_user = $this->getUser()->getGuardUser()->getId();
        $UploadDir = sfConfig::get("sf_upload_dir");
        $PathFile = $UploadDir . "/tmp$id_user/ResultCheckBatchVariablesmeasured.xls";
        if (file_exists($PathFile)) {
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="ResultCheckBatchVariablesmeasured.xls"');
            readfile($PathFile);
        }
        die();
    }

}

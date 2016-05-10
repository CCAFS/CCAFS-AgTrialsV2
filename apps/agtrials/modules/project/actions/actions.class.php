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
 * @author    :  www.agtrials.org. - herlin25@gmail.com
 * @version   :  ~
 */

require_once dirname(__FILE__) . '/../lib/projectGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/projectGeneratorHelper.class.php';

/**
 * project actions.
 *
 * @package    AgTrials
 * @subpackage project
 * @author     www.agtrials.org. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projectActions extends autoProjectActions {

    public function executeAutocompleteproject(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $term = $request->getParameter('term');
        $QUERY = "SELECT T.id_project AS value, T.prjname AS label, ";
        $QUERY .= "T2.id_contactperson AS id_leadofproject, T2.cnprfirstname AS cnprfirstname, T2.cnprmiddlename AS cnprmiddlename, T2.cnprlastname AS cnprlastname, T2.cnpremail AS cnpremail, ";
        $QUERY .= "T2.cnprtelephone AS cnprtelephone,T3.id_institution AS id_institutionleadofproject, T3.insname AS insnameleadofproject, T4.id_administrativedivision AS id_countryinstitutionleadofproject, ";
        $QUERY .= "T4.dmdvname AS namecountryinstitutionleadofproject,T5.id_institution AS id_projectimplementinginstitutions, T5.insname AS insnameprojectimplementinginstitutions, ";
        $QUERY .= "T6.id_administrativedivision AS id_countryprojectimplementinginstitutions,T6.dmdvname AS namecountryprojectimplementinginstitutions, ";
        $QUERY .= "T.prjprojectimplementingperiodstartdate AS prjprojectimplementingperiodstartdate, T.prjprojectimplementingperiodenddate AS prjprojectimplementingperiodenddate, ";
        $QUERY .= "T7.id_donor AS id_donor,T7.dnrname AS dnrname, ";
        $QUERY .= "T.prjabstract AS prjabstract, T.prjkeywords AS prjkeywords ";
        $QUERY .= "FROM tb_project T ";
        $QUERY .= "INNER JOIN tb_contactperson T2 ON T.id_leadofproject = T2.id_contactperson ";
        $QUERY .= "INNER JOIN tb_institution T3 ON T2.id_institution = T3.id_institution ";
        $QUERY .= "INNER JOIN tb_administrativedivision T4 ON T3.id_country = T4.id_administrativedivision ";
        $QUERY .= "INNER JOIN tb_institution T5 ON T.id_projectimplementinginstitutions = T5.id_institution ";
        $QUERY .= "INNER JOIN tb_administrativedivision T6 ON T5.id_country = T6.id_administrativedivision ";
        $QUERY .= "LEFT JOIN tb_donor T7 ON T.id_donor = T7.id_donor ";
        $QUERY .= "WHERE UPPER(T.prjname) LIKE UPPER('$term%') ";
        $QUERY .= "ORDER BY T.prjname ";
        $st = $connection->execute($QUERY);
        $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        return $this->renderText(json_encode($R_datos));
    }

    public function executeBatchuploadproject(sfWebRequest $request) {
        //PARAMETROS
        $Modulo = "Project";
        $Cols = 8;
        $MaxRecordsFile = 10000;
        $MaxSizeFile = 5; // ESTE VALOR ES EN MB

        $connection = Doctrine_Manager::getInstance()->connection();
        $id_user = $this->getUser()->getGuardUser()->getId();
        ini_set("memory_limit", "2048M");
        set_time_limit(900000000000);
        $UploadDir = sfConfig::get("sf_upload_dir");
        $uploadstrialgroup = $UploadDir . "/fileproject";
        if (!is_dir($uploadstrialgroup)) {
            mkdir($uploadstrialgroup, 0777);
        }

        //ARCHIVO
        $File = $request->getFiles('fileproject');
        $FileSize = $File['size'];
        $FileType = $File['type'];
        $FileName = $File['name'];
        $FileTmpName = $File['tmp_name'];
        $FileSizeMB = round(($FileSize / 1048576), 2);

        if ($FileName != '') {
            $extension = explode(".", $FileName);
            $FileExt = strtoupper($extension[1]);
            if ((!($FileExt == "XLS")) || ($FileSizeMB < 0) || ($FileSizeMB > 5) || ($DataFileSizeMB > 5)) {
                $Forma = "FileErrorTemplates";
                die(include("../lib/html/HTML.php"));
            }

            move_uploaded_file($FileTmpName, "$uploadstrialgroup/$FileName");
            $inputFileName = "$uploadstrialgroup/$FileName";


            $ExcelFileInfo = PHPExcel_IOFactory::load($inputFileName);
            $ArrayData = $ExcelFileInfo->getActiveSheet()->toArray(null, true, true, true);
            unset($ArrayData[1]);
            $NumRows = count($ArrayData);
            $NumCols = count($ArrayData[2]);


            $TotalRecord = $NumRows;
            if ($Cols != $NumCols) {
                $Forma = "FileErrorTemplatesCols";
                die(include("../lib/html/HTML.php"));
            }

            if ($TotalRecord > $MaxRecordsFile) {
                $Forma = "FileErrorTemplatesRecords";
                die(include("../lib/html/HTML.php"));
            }

            $Forma = "Body";
            include("../lib/html/HTML.php");
            $error_filas = "";
            $grabados = 0;
            $errores = 0;
            $row = 2;
            foreach ($ArrayData AS $ArrayRow) {
                $banderaerrorfila = false;
                $prjname = trim($ArrayRow['A']);
                $id_leadofproject = trim($ArrayRow['B']);
                $id_projectimplementinginstitutions = trim($ArrayRow['C']);
                $prjprojectimplementingperiodstartdate = trim($ArrayRow['D']);
                $prjprojectimplementingperiodenddate = trim($ArrayRow['E']);
                $id_donor = trim($ArrayRow['F']);
                $prjabstract = trim($ArrayRow['G']);
                $prjkeywords = trim($ArrayRow['H']);

                $Fields = '{"' . $prjname . '","' . $id_leadofproject . '","' . $id_projectimplementinginstitutions . '","' . $prjprojectimplementingperiodstartdate . '","' . $prjprojectimplementingperiodenddate . '","' . $id_donor . '","' . $prjabstract . '","' . $prjkeywords . '"}';
                $Fields = str_replace("'", "''", $Fields);
                $Fields = utf8_encode($Fields);
                $QUERY = "SELECT fc_checkfieldsbatchproject('$Fields'::text[]) AS info;";
                $st = $connection->execute($QUERY);
                $Result = $st->fetchAll();
                if (count($Result) > 0) {
                    $info = null;
                    foreach ($Result AS $Value) {
                        $info = $Value['info'];
                        if ($info != "OK")
                            $banderaerrorfila = true;
                    }
                }

                if ($banderaerrorfila)
                    $error_filas .= "<b>Fila $row:</b> (" . substr($info, 2, (strlen($info) - 1)) . ") <br>";

                if (!$banderaerrorfila) {
                    $prjname = utf8_encode($prjname);
                    TbProjectTable::addProject($prjname, $id_leadofproject, $id_projectimplementinginstitutions, $prjprojectimplementingperiodstartdate, $prjprojectimplementingperiodenddate, $id_donor, $prjabstract, $prjkeywords);
                    $grabados++;
                } else {
                    $errores++;
                }

                $fila_actual = ($row - 1);
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
            die();
        }


        $this->MaxRecordsFile = $MaxRecordsFile;
        $this->MaxSizeFile = $MaxSizeFile;
        $this->Cols = $Cols;
    }

    public function executeDownloadestrutureproject(sfWebRequest $request) {
        error_reporting(E_ALL);
        date_default_timezone_set('Europe/London');

        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Set properties
        $objPHPExcel->getProperties()->setCreator("www.agtrials.org")
                ->setLastModifiedBy("www.agtrials.org")
                ->setTitle("Project Template File")
                ->setSubject("Project Template File")
                ->setDescription("Project Template File")
                ->setKeywords("Project Template File")
                ->setCategory("Project Template File");

        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Name')
                ->setCellValue('B1', 'Id Lead of project')
                ->setCellValue('C1', 'Id implementing institutions')
                ->setCellValue('D1', 'Implementing period start date')
                ->setCellValue('E1', 'Implementing period end date')
                ->setCellValue('F1', 'Id Donor')
                ->setCellValue('G1', 'Abstract')
                ->setCellValue('H1', 'Keywords');

        //APLICAMOS NEGRILLA AL TITULO
        $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);
        //APLICAMOS COLOR ROJO A COLUMNAS OBLIGATORIAS
        $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

        //RENOMBRAMOS EL LIBO
        $objPHPExcel->getActiveSheet(0)->setTitle('Batch Upload Information');

        //inicio: GENERAMOS EL LIBRO DE LEAD OF PROJECT
        $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet(1)->setTitle('Lead of Project');
        $QUERY01 = Doctrine_Query::create()
                ->select("CP.*")
                ->addSelect("INS.insname AS institution")
                ->from("TbContactperson CP")
                ->innerJoin("CP.TbInstitution INS")
                ->orderBy('CP.cnprfirstname,CP.cnprmiddlename,CP.cnprlastname');
        $Resultado01 = $QUERY01->execute();
        $i = 2;
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'First name');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Middle name');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Last name');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Institution');
        foreach ($Resultado01 AS $fila) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila->id_contactperson);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila->cnprfirstname);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $fila->cnprmiddlename);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $fila->cnprlastname);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $fila->institution);
            $i++;
        }

        //APLICAMOS NEGRILLA AL TITULO
        $objPHPExcel->getActiveSheet()->getStyle('A1:E1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        //fin: GENERAMOS EL LIBRO DE LEAD OF PROJECT
        //
        //inicio: GENERAMOS EL LIBRO DE INSTITUCION
        $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(2);
        $objPHPExcel->getActiveSheet(2)->setTitle('Implementing Institutions');
        $QUERY01 = Doctrine_Query::create()
                ->select("I.id_institution,I.insname")
                ->addSelect("ADM.dmdvname AS country")
                ->from("TbInstitution I")
                ->innerJoin("I.TbAdministrativedivision ADM")
                ->orderBy('ADM.dmdvname, I.insname');
        $Resultado01 = $QUERY01->execute();
        $i = 2;
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Country');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Name');
        foreach ($Resultado01 AS $fila) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila->id_institution);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila->country);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $fila->insname);
            $i++;
        }

        //APLICAMOS NEGRILLA AL TITULO
        $objPHPExcel->getActiveSheet()->getStyle('A1:C1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        //fin: GENERAMOS EL LIBRO DE INSTITUCION
        //
        //
        //inicio: GENERAMOS EL LIBRO DE DONOR
        $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(3);
        $objPHPExcel->getActiveSheet(3)->setTitle('Donor');
        $QUERY02 = Doctrine_Query::create()
                ->select("DN.id_donor AS id, DN.dnrname AS name")
                ->from("TbDonor DN")
                ->orderBy("DN.dnrname");
        $Resultado02 = $QUERY02->execute();
        $i = 2;
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Name');
        foreach ($Resultado02 AS $fila) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila['id']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila['name']);
            $i++;
        }
        //APLICAMOS NEGRILLA AL TITULO
        $objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        //fin: GENERAMOS EL LIBRO DE DONOR
        //
        //ACTIVAMOS EL PRIMER LIBRO
        $objPHPExcel->setActiveSheetIndex(0);

        // Redirect output to a clientâ€™s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="ProjectTemplateFile.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

}

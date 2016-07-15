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
require_once '../lib/functions/function.php';

/**
 * project actions.
 *
 * @package    AgTrials
 * @subpackage project
 * @author     www.agtrials.org. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projectActions extends autoProjectActions {

    public function executeDelete(sfWebRequest $request) {

        //VERIFICAMOS LOS PERMISOS DE MODIFICACION
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_project = $request->getParameter("id_project");
        $Query00 = Doctrine::getTable('TbProject')->findOneByIdProject($id_project);
        $id_user_registro = $Query00->getIdUser();
        $user = $this->getUser();

        //VERIFICA SI ES EL USUARIO CREADOR Ó TIENE PERMISOS DE ADMIN(1)
        if (!($id_user == $id_user_registro || (CheckUserPermission($id_user, "1")))) {
            $this->getUser()->setAttribute('Notice', "<b>Error: </b>Not have permission to Delete!");
            $this->redirect("/project");
        }
    }

    public function executeEdit(sfWebRequest $request) {
        $this->project = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->project);

        //VERIFICAMOS LOS PERMISOS DE MODIFICACION
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_project = $request->getParameter("id_project");
        $Query00 = Doctrine::getTable('TbProject')->findOneByIdProject($id_project);
        $id_user_registro = $Query00->getIdUser();
        $user = $this->getUser();

        //VERIFICA SI ES EL USUARIO CREADOR Ó TIENE PERMISOS DE ADMIN(1)
        if (!($id_user == $id_user_registro || (CheckUserPermission($id_user, "1")))) {
            $this->getUser()->setAttribute('Notice', "<b>Error: </b>Not have permission to Edit!");
            $this->redirect("/project");
        }
    }

    public function executeAutocompleteproject(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $term = $request->getParameter('term');
        $QUERY = "SELECT T.id_project AS value, T.prjname AS label, ";
        $QUERY .= "T2.id_contactperson AS id_leadofproject, T2.cnprfirstname AS cnprfirstname, T2.cnprmiddlename AS cnprmiddlename, T2.cnprlastname AS cnprlastname, T2.cnpremail AS cnpremail, ";
        $QUERY .= "T2.cnprtelephone AS cnprtelephone,T3.id_project AS id_projectleadofproject, T3.insname AS insnameleadofproject, T4.id_administrativedivision AS id_countryprojectleadofproject, ";
        $QUERY .= "T4.dmdvname AS namecountryprojectleadofproject,T5.id_project AS id_projectimplementingprojects, T5.insname AS insnameprojectimplementingprojects, ";
        $QUERY .= "T6.id_administrativedivision AS id_countryprojectimplementingprojects,T6.dmdvname AS namecountryprojectimplementingprojects, ";
        $QUERY .= "T.prjprojectimplementingperiodstartdate AS prjprojectimplementingperiodstartdate, T.prjprojectimplementingperiodenddate AS prjprojectimplementingperiodenddate, ";
        $QUERY .= "T7.id_donor AS id_donor,T7.dnrname AS dnrname, ";
        $QUERY .= "T.prjabstract AS prjabstract, T.prjkeywords AS prjkeywords ";
        $QUERY .= "FROM tb_project T ";
        $QUERY .= "INNER JOIN tb_contactperson T2 ON T.id_leadofproject = T2.id_contactperson ";
        $QUERY .= "INNER JOIN tb_project T3 ON T2.id_project = T3.id_project ";
        $QUERY .= "INNER JOIN tb_administrativedivision T4 ON T3.id_country = T4.id_administrativedivision ";
        $QUERY .= "INNER JOIN tb_project T5 ON T.id_projectimplementingprojects = T5.id_project ";
        $QUERY .= "INNER JOIN tb_administrativedivision T6 ON T5.id_country = T6.id_administrativedivision ";
        $QUERY .= "LEFT JOIN tb_donor T7 ON T.id_donor = T7.id_donor ";
        $QUERY .= "WHERE UPPER(T.prjname) LIKE UPPER('$term%') ";
        $QUERY .= "ORDER BY T.prjname ";
        $st = $connection->execute($QUERY);
        $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        return $this->renderText(json_encode($R_datos));
    }

    public function executeAutocompletesearchproject(sfWebRequest $request) {
        $SearchWhere = sfContext::getInstance()->getUser()->getAttribute('SearchWhere');
        $Where = "";
        foreach ($SearchWhere AS $value) {
            $Where .= $value;
        }
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $term = $request->getParameter('term');
        $QUERY = "SELECT P.id_project AS value, P.prjname AS label ";
        $QUERY .= "FROM tb_project P ";
        $QUERY .= "INNER JOIN tb_trial T ON P.id_project = T.id_project ";
        $QUERY .= "INNER JOIN tb_trialinfo TI ON T.id_trial = TI.id_trial ";
        $QUERY .= "WHERE UPPER(P.prjname) LIKE UPPER('$term%') ";
        $QUERY .= "$Where ";
        $QUERY .= "GROUP BY P.id_project,P.prjname ";
        $QUERY .= "ORDER BY P.prjname ";
        $st = $connection->execute($QUERY);
        $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        return $this->renderText(json_encode($R_datos));
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
                ->setCellValue('C1', 'Id implementing projects')
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
                ->addSelect("INS.insname AS project")
                ->from("TbContactperson CP")
                ->innerJoin("CP.TbProject INS")
                ->orderBy('CP.cnprfirstname,CP.cnprmiddlename,CP.cnprlastname');
        $Resultado01 = $QUERY01->execute();
        $i = 2;
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'First name');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Middle name');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Last name');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Project');
        foreach ($Resultado01 AS $fila) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila->id_contactperson);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $fila->cnprfirstname);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $fila->cnprmiddlename);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $fila->cnprlastname);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $fila->project);
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
        $objPHPExcel->getActiveSheet(2)->setTitle('Implementing Projects');
        $QUERY01 = Doctrine_Query::create()
                ->select("I.id_project,I.insname")
                ->addSelect("ADM.dmdvname AS country")
                ->from("TbProject I")
                ->innerJoin("I.TbAdministrativedivision ADM")
                ->orderBy('ADM.dmdvname, I.insname');
        $Resultado01 = $QUERY01->execute();
        $i = 2;
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Id');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Country');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Name');
        foreach ($Resultado01 AS $fila) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $fila->id_project);
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

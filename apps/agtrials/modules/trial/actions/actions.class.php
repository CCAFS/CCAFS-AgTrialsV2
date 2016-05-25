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


require_once dirname(__FILE__) . '/../lib/trialGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/trialGeneratorHelper.class.php';
require_once '../lib/zip/pclzip.lib.php';
require_once '../lib/functions/function.php';
require_once '../lib/functions/functionexcel.php';
require_once '../lib/functions/html.php';
require_once '../lib/PHPExcel1.8.0/Classes/PHPExcel.php';
require_once '../lib/PHPExcel1.8.0/Classes/PHPExcel/IOFactory.php';

/**
 * trial actions.
 *
 * @package    AgTrials
 * @subpackage trial
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class trialActions extends autoTrialActions {

    public function executeShow(sfWebRequest $request) {
        $this->tb_trial = Doctrine::getTable('TbTrial')->find($request->getParameter('id_trial'));
        $this->forward404Unless($this->tb_trial);
        $this->form = $this->configuration->getForm($this->tb_trial);
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = $this->configuration->getForm();
        $this->tb_trial = $this->form->getObject();

        //RESET VARIABLES DE SESION
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('user_id');
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('user_name');
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('group_id');
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('group_name');
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('TrialInfo');
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('ArrVariety');
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('ArrVariablesMeasured');
    }

    public function executeEdit(sfWebRequest $request) {

        //RESET VARIABLES DE SESION
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('user_id');
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('user_name');
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('group_id');
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('group_name');
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('TrialInfo');
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('ArrVariety');
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('ArrVariablesMeasured');

        $connection = Doctrine_Manager::getInstance()->connection();
        $user = sfContext::getInstance()->getUser();
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_trial = $request->getParameter("id_trial");
        $Query00 = Doctrine::getTable('TbTrial')->findOneByIdTrial($id_trial);
        $id_user_registro = $Query00->getIdUser();
        //VERIFICAMOS LOS PERMISOS SOBRE EL REGISTRO
        if ($id_user == $id_user_registro || (CheckUserPermission($id_user, "1"))) {
            //INICIO: AQUI CONSUILTAMOS LOS REGISTROS DE LA TABLA tb_trialpermissionuser
            $Trialpermissionuser = Doctrine::getTable('TbTrialpermissionuser')->findByIdTrial($id_trial);
            for ($cont = 0; $cont < count($Trialpermissionuser); $cont++) {
                $SfGuardUser = Doctrine::getTable('SfGuardUser')->findOneById($Trialpermissionuser[$cont]->getIdUserpermission());
                $user_id_saved[] = $SfGuardUser->getId();
                $user_name_saved[] = $SfGuardUser->getFirstName() . " " . $SfGuardUser->getLastName();
            }
            $user->setAttribute('user_id', $user_id_saved);
            $user->setAttribute('user_name', $user_name_saved);

            //INICIO: AQUI CONSUILTAMOS LOS REGISTROS DE LA TABLA tb_trialpermissiongroup
            $TbTrialpermissiongroup = Doctrine::getTable('TbTrialpermissiongroup')->findByIdTrial($id_trial);
            for ($cont = 0; $cont < count($TbTrialpermissiongroup); $cont++) {
                $SfGuardGroup = Doctrine::getTable('SfGuardGroup')->findOneById($TbTrialpermissiongroup[$cont]->getIdGrouppermission());
                $group_id_saved[] = $SfGuardGroup->getId();
                $group_name_saved[] = $SfGuardGroup->getName();
            }
            $user->setAttribute('group_id', $group_id_saved);
            $user->setAttribute('group_name', $group_name_saved);

            //INICIO: AQUI CONSUILTAMOS LOS REGISTROS DE LA TABLA tb_trialinfo
            $QUERY = "SELECT T1.id_trialinfo,T1.id_crop,T2.crpname,T1.trnfnumberofreplicates,T3.xpdsname,T1.trnftreatmentnumber,T1.trnftreatmentnameandcode,T1.trnfplantingsowingstartdate, ";
            $QUERY .= "T1.trnfplantingsowingenddate,T1.trnfphysiologicalmaturitystardate,T1.trnfphysiologicalmaturityenddate,T1.trnfharveststartdate,T1.trnfharvestenddate, ";
            $QUERY .= "T1.trnfdatafile,T1.trnfdataorresultsfile,T1.trnfsuppplementalinformationfile,T1.trnfweatherdatafile,T1.trnfsoildatafile ";
            $QUERY .= "FROM tb_trialinfo T1 ";
            $QUERY .= "INNER JOIN tb_crop T2 ON T1.id_crop = T2.id_crop ";
            $QUERY .= "LEFT JOIN tb_experimentaldesign T3 ON T1.id_experimentaldesign = T3.id_experimentaldesign ";
            $QUERY .= "WHERE T1.id_trial = $id_trial ";
            $QUERY .= "ORDER BY T1.id_trialinfo";
            $st = $connection->execute($QUERY);
            $TrialInfo = $st->fetchAll(PDO::FETCH_ASSOC);
            $user->setAttribute('TrialInfo', $TrialInfo);

            $this->tb_trial = $this->getRoute()->getObject();
            $this->form = $this->configuration->getForm($this->tb_trial);
        } else {
            echo "<script> alert('*** ERROR *** \\n\\n Not permissions to EDIT!'); window.history.back();</script>";
            Die();
        }
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_trial = $request->getParameter("id_trial");
        $Query00 = Doctrine::getTable('TbTrial')->findOneByIdTrial($id_trial);
        $id_user_registro = $Query00->getIdUser();
        //VERIFICAMOS LOS PERMISOS SOBRE EL REGISTRO
        if ($id_user == $id_user_registro || (CheckUserPermission($id_user, "1"))) {
            $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
            $this->getRoute()->getObject()->delete();
            $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
            $this->redirect('trial/new');
        } else {
            echo "<script> alert('*** ERROR *** \\n\\n Not permissions to DELETE!'); window.history.back();</script>";
            Die();
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        $user = sfContext::getInstance()->getUser();
        if ($form->isValid()) {

            $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
            $tb_trial = $form->save();
            $id_trial = $tb_trial->getIdTrial();

            //OPTENEMOS INFORMACION (Project / Trial Groups)
            $id_projecttrialgroups = $request->getParameter("id_project");
            $prjname = $request->getParameter("prjname");
            $id_leadofproject = $request->getParameter("id_leadofproject");
            $cnprfirstname = $request->getParameter("cnprfirstname");
            $cnprmiddlename = $request->getParameter("cnprmiddlename");
            $cnprlastname = $request->getParameter("cnprlastname");
            $id_institutionleadofproject = $request->getParameter("id_institutionleadofproject");
            $insnameleadofproject = $request->getParameter("insnameleadofproject");
            $id_countryinstitutionleadofproject = $request->getParameter("id_countryinstitutionleadofproject");
            $nameinstitutionleadofproject = $request->getParameter("nameinstitutionleadofproject");
            $cnpremail = $request->getParameter("cnpremail");
            $cnprtelephone = $request->getParameter("cnprtelephone");
            $id_projectimplementinginstitutions = $request->getParameter("id_projectimplementinginstitutions");
            $insnameprojectimplementinginstitutions = $request->getParameter("insnameprojectimplementinginstitutions");
            $id_countryprojectimplementinginstitutions = $request->getParameter("id_countryprojectimplementinginstitutions");
            $namecountryprojectimplementinginstitutions = $request->getParameter("namecountryprojectimplementinginstitutions");
            $prjprojectimplementingperiodstartdate = $request->getParameter("prjprojectimplementingperiodstartdate");
            $prjprojectimplementingperiodenddate = $request->getParameter("prjprojectimplementingperiodenddate");
            $id_donor = $request->getParameter("id_donor");
            $dnrname = $request->getParameter("dnrname");
            $prjabstract = $request->getParameter("prjabstract");
            $prjkeywords = $request->getParameter("prjkeywords");

            //GRABAMOS (Project / Trial Groups)
            if ($insnameleadofproject != '' && $id_countryinstitutionleadofproject != '') {
                $id_institutionleadofproject = TbInstitutionTable::addInstitution($insnameleadofproject, $id_countryinstitutionleadofproject);
            }
            if ($cnprfirstname != '' && $cnprlastname != '' && $id_institutionleadofproject != '' && $cnpremail != '') {
                $id_leadofproject = TbContactpersonTable::addContactperson($cnprfirstname, $cnprmiddlename, $cnprlastname, $id_institutionleadofproject, $cnpremail, $cnprtelephone);
            }
            if ($insnameprojectimplementinginstitutions != '' && $id_countryprojectimplementinginstitutions != '') {
                $id_projectimplementinginstitutions = TbInstitutionTable::addInstitution($insnameprojectimplementinginstitutions, $id_countryprojectimplementinginstitutions);
            }
            if ($dnrname != '') {
                $id_donor = TbDonorTable::addDonor($dnrname);
            }
            if ($prjname != '' && $id_leadofproject != '' && $id_projectimplementinginstitutions != '' && $prjprojectimplementingperiodstartdate != '' && $prjprojectimplementingperiodenddate != '' && $id_donor != '') {
                $id_project = TbProjectTable::addProject($prjname, $id_leadofproject, $id_projectimplementinginstitutions, $prjprojectimplementingperiodstartdate, $prjprojectimplementingperiodenddate, $id_donor, $prjabstract, $prjkeywords);
            }
            if ($id_project != '') {
                $tb_trial->setIdProject($id_project);
            }

            //OPTENEMOS INFORMACION (Trial Manager)
            $id_leadofproject = $request->getParameter("id_contactperson");
            $cnprfirstnametrialmanager = $request->getParameter("cnprfirstnametrialmanager");
            $cnprmiddlenametrialmanager = $request->getParameter("cnprmiddlenametrialmanager");
            $cnprlastnametrialmanager = $request->getParameter("cnprlastnametrialmanager");
            $id_institutiontrialmanager = $request->getParameter("id_institutiontrialmanager");
            $insnametrialmanager = $request->getParameter("insnametrialmanager");
            $id_countryinstitutiontrialmanager = $request->getParameter("id_countryinstitutiontrialmanager");
            $namecountryinstitutiontrialmanager = $request->getParameter("namecountryinstitutiontrialmanager");
            $cnpremailtrialmanager = $request->getParameter("cnpremailtrialmanager");
            $cnprtelephonetrialmanager = $request->getParameter("cnprtelephonetrialmanager");
            //GRABAMOS (Trial Manager)
            if ($insnametrialmanager != '' && $id_countryinstitutiontrialmanager != '') {
                $id_institutiontrialmanager = TbInstitutionTable::addInstitution($insnametrialmanager, $id_countryinstitutiontrialmanager);
            }
            if ($cnprfirstnametrialmanager != '' && $cnprlastnametrialmanager != '' && $id_institutiontrialmanager != '' && $cnpremailtrialmanager != '') {
                $id_contactperson = TbContactpersonTable::addContactperson($cnprfirstnametrialmanager, $cnprmiddlenametrialmanager, $cnprlastnametrialmanager, $id_institutiontrialmanager, $cnpremailtrialmanager, $cnprtelephonetrialmanager);
            }
            if ($id_contactperson != '') {
                $tb_trial->setIdContactperson($id_contactperson);
            }

            //OPTENEMOS INFORMACION (Trial Location)
            $id_triallocation = $request->getParameter("id_triallocation");
            $trlcname = $request->getParameter("trlcname");
            $id_countrytriallocation = $request->getParameter("id_countrytriallocation");
            $id_districttriallocation = $request->getParameter("id_districttriallocation");
            $id_subdistricttriallocation = $request->getParameter("id_subdistricttriallocation");
            $id_villagetriallocation = $request->getParameter("id_villagetriallocation");
            $trlclatitude = $request->getParameter("trlclatitude");
            $trlclongitude = $request->getParameter("trlclongitude");
            $trlcaltitude = $request->getParameter("trlcaltitude");
            //GRABAMOS (Trial Location)
            if ($trlcname != '' && $trlclatitude != '' && $trlclongitude != '') {
                $id_triallocation = TbTriallocationTable::addTriallocation($trlcname, $trlclatitude, $trlclongitude, $trlcaltitude);
            }
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
            if ($id_contactperson != '') {
                $tb_trial->setIdTriallocation($id_triallocation);
            }

            //Access to Information (Users or Groups)
            TbTrialpermissionuserTable::delTrialpermissionuser($id_trial);
            TbTrialpermissiongroupTable::delTrialpermissiongroup($id_trial);
            //GRABAMOS LOS PERMISOS DE LOS USUARIOS
            if ($tb_trial->getTrltrialpermissions() == 'Open to specified users') {
                $array_users = sfContext::getInstance()->getRequest()->getParameterHolder()->get('users');
                $user_id = $array_users['user']['id'];
                if (count($user_id) > 0) {
                    foreach ($user_id AS $id_userpermission) {
                        if (($id_trial != '') && ($id_userpermission != '')) {
                            TbTrialpermissionuserTable::addTrialpermissionuser($id_trial, $id_userpermission);
                        }
                    }
                }
            }
            //GRABAMOS LOS PERMISOS DEL GRUPO
            if ($tb_trial->getTrltrialpermissions() == 'Open to specified groups') {
                $array_groups = sfContext::getInstance()->getRequest()->getParameterHolder()->get('groups');
                $group_id = $array_groups['user']['id'];
                if (count($group_id) > 0) {
                    foreach ($group_id AS $id_grouppermission) {
                        if (($id_trial != '') && ($id_grouppermission != '')) {
                            TbTrialpermissiongroupTable::addTrialpermissiongroup($id_trial, $id_grouppermission);
                        }
                    }
                }
            }
            $tb_trial->save();

            //AQUI GRABAMOS LOS REGISTROS DE CULTIVOS (CROP)
            $ArrVariety = $user->getAttribute('ArrVariety');
            $ArrVariablesMeasured = $user->getAttribute('ArrVariablesMeasured');
            for ($a = 1; $a <= 10; $a++) {
                $trnfnumberofreplicates = $request->getParameter("trnfnumberofreplicates" . $a);
                $id_experimentaldesign = $request->getParameter("id_experimentaldesign" . $a);
                $trnftreatmentnumber = $request->getParameter("trnftreatmentnumber" . $a);
                $trnftreatmentnameandcode = $request->getParameter("trnftreatmentnameandcode" . $a);
                $trnfplantingsowingstartdate = $request->getParameter("trnfplantingsowingstartdate" . $a);
                $trnfplantingsowingenddate = $request->getParameter("trnfplantingsowingenddate" . $a);
                $trnfphysiologicalmaturitystardate = $request->getParameter("trnfphysiologicalmaturitystardate" . $a);
                $trnfphysiologicalmaturityenddate = $request->getParameter("trnfphysiologicalmaturityenddate" . $a);
                $trnfharveststartdate = $request->getParameter("trnfharveststartdate" . $a);
                $trnfharvestenddate = $request->getParameter("trnfharvestenddate" . $a);
                $id_crop = $request->getParameter("id_crop" . $a);
                $trnfdatafile = $_FILES["TemplateData" . $a]['name'];
                $trnfdataorresultsfile = $_FILES["trnfdataorresultsfile" . $a]['name'];
                $trnfsuppplementalinformationfile = $_FILES["trnfsuppplementalinformationfile" . $a]['name'];
                $trnfweatherdatafile = $_FILES["trnfweatherdatafile" . $a]['name'];
                $trnfsoildatafile = $_FILES["trnfsoildatafile" . $a]['name'];
                if ($trnfdatafile != '') {
                    $PartFile = explode(".", $trnfdatafile);
                    $ExtFile = $PartFile[(count($PartFile) - 1)];
                    $trnfdatafile = md5(time()) . "." . $ExtFile;
                }

                //SI LA INFORMACION ESTA COMPLETA GRABAMOS
                if (($id_trial != '') && ($id_crop != '')) {
                    $id_trialinfo = TbTrialinfoTable::addTrialinfo($id_trial, $trnfnumberofreplicates, $id_experimentaldesign, $trnftreatmentnumber, $trnftreatmentnameandcode, $trnfplantingsowingstartdate, $trnfplantingsowingenddate, $trnfphysiologicalmaturitystardate, $trnfphysiologicalmaturityenddate, $trnfharveststartdate, $trnfharvestenddate, $id_crop, $trnfdatafile, $trnfdataorresultsfile, $trnfsuppplementalinformationfile, $trnfweatherdatafile, $trnfsoildatafile);

                    //GRABAMOS VARIEDADES Y VARIABLES MEDIDAS
                    if (count($ArrVariety[$a]) > 0) {
                        foreach ($ArrVariety[$a] AS $id_variety) {
                            if (count($ArrVariablesMeasured[$a]) > 0) {
                                foreach ($ArrVariablesMeasured[$a] AS $id_variablesmeasured) {
                                    if ($id_trialinfo != '') {
                                        $trnfdtreplication = 1;
                                        $trnfdtvalue = 99999;
                                        TbTrialinfodataTable::addTrialinfodata($id_trialinfo, $trnfdtreplication, $id_variety, $id_variablesmeasured, $trnfdtvalue);
                                    }
                                }
                            }
                        }
                    }

                    //AQUI UBICAMOS LOS ARCHIVOS AL REPOSITORIO FINAL SI EXISTEN
                    $Directorio = "FilesTrial$id_trial";
                    $UploadDir = sfConfig::get("sf_upload_dir");
                    $DirUploads = "$UploadDir/$Directorio";
                    DirectoryFiles($DirUploads);
                    if ($trnfdatafile != '') {
                        move_uploaded_file($_FILES["TemplateData" . $a]['tmp_name'], "$DirUploads/$trnfdatafile");
                        $inputFileName = "$DirUploads/$trnfdatafile";
                    }
                    if ($trnfdataorresultsfile != '') {
                        move_uploaded_file($_FILES["trnfdataorresultsfile" . $a]['tmp_name'], "$DirUploads/$trnfdataorresultsfile");
                    }
                    if ($trnfsuppplementalinformationfile != '') {
                        move_uploaded_file($_FILES["trnfsuppplementalinformationfile" . $a]['tmp_name'], "$DirUploads/$trnfsuppplementalinformationfile");
                    }
                    if ($trnfweatherdatafile != '') {
                        move_uploaded_file($_FILES["trnfweatherdatafile" . $a]['tmp_name'], "$DirUploads/$trnfweatherdatafile");
                    }
                    if ($trnfsoildatafile != '') {
                        move_uploaded_file($_FILES["trnfsoildatafile" . $a]['tmp_name'], "$DirUploads/$trnfsoildatafile");
                    }

                    //GRABAMOS LOS DATOS DE RESULTADOS DESDE LA PLANTILLA DE EXCEL 
                    if ($trnfdatafile != '') {
                        SaveTrialData($id_trialinfo, $inputFileName, $id_user, $id_crop);
                    }
                }
            }

            //RESET VARIABLES DE SESION
            sfContext::getInstance()->getUser()->getAttributeHolder()->remove('user_id');
            sfContext::getInstance()->getUser()->getAttributeHolder()->remove('user_name');
            sfContext::getInstance()->getUser()->getAttributeHolder()->remove('group_id');
            sfContext::getInstance()->getUser()->getAttributeHolder()->remove('group_name');
            sfContext::getInstance()->getUser()->getAttributeHolder()->remove('TrialInfo');
            sfContext::getInstance()->getUser()->getAttributeHolder()->remove('ArrVariety');
            sfContext::getInstance()->getUser()->getAttributeHolder()->remove('ArrVariablesMeasured');


            $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $tb_trial)));

            if ($request->hasParameter('_save_and_add')) {
                $this->getUser()->setFlash('notice', $notice . ' You can add another one below.');
                $this->redirect('@tb_trial_new');
            } else {
                $this->getUser()->setFlash('notice', $notice);
                $this->redirect(array('sf_route' => 'tb_trial_edit', 'sf_subject' => $tb_trial));
            }
        } else {
            $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
        }
    }

    public function executeBatchuploadtrials(sfWebRequest $request) {
        $NowDate = date("Y-m-d") . " " . date("H:i:s");
        $user = sfContext::getInstance()->getUser();
        $FormAction = $request->getParameter("FormAction");
        if ($FormAction == '') {
            sfContext::getInstance()->getUser()->getAttributeHolder()->remove('ArrVariety');
            sfContext::getInstance()->getUser()->getAttributeHolder()->remove('ArrVariablesMeasured');
            $Form = "Step1";
        } else if ($FormAction == 'Step1') {
            $user = sfContext::getInstance()->getUser();
            $ArrVariety = $user->getAttribute('ArrVariety');
            $ArrVariety = current($ArrVariety);
            $CountVariety = count($ArrVariety);
            $ArrVariablesMeasured = $user->getAttribute('ArrVariablesMeasured');
            $ArrVariablesMeasured = current($ArrVariablesMeasured);
            $CountVariablesMeasured = count($ArrVariablesMeasured);
            if (($CountVariety == 0) || ($CountVariablesMeasured == 0)) {
                echo "<script> alert('*** ERROR *** \\n\\n Please, Complete all information for the Crop!'); window.history.back();</script>";
                Die();
            }
            $Form = "Step2";
            $Template = true;
        } else if ($FormAction == 'SkipStep') {
            $Form = "Step2";
            $Template = false;
        }

        $this->Form = $Form;
        $this->Template = $Template;
    }

    public function executeUploadTemplates(sfWebRequest $request) {
        $NowDate = date("Y-m-d") . " " . date("H:i:s");
        $user = sfContext::getInstance()->getUser();
        $connection = Doctrine_Manager::getInstance()->connection();
        $id_user = $this->getUser()->getGuardUser()->getId();
        ini_set("memory_limit", "2048M");
        set_time_limit(900000000000);
        $UploadDir = sfConfig::get("sf_upload_dir");
        $TmpUploadDir = $UploadDir . "/tmp$id_user";
        if (!is_dir($TmpUploadDir)) {
            mkdir($TmpUploadDir, 0777);
        }
        rrmdir($TmpUploadDir);

        //inicio: DESCOMPRIMIMOS EL ARCHIVO QUE CONTIENE LAS PLANTILLAS
        $CompressedFileTrialInfoDataTemplates = $request->getFiles('CompressedFileTrialInfoDataTemplates');
        if ($CompressedFileTrialInfoDataTemplates != '') {
            DecompressFile($CompressedFileTrialInfoDataTemplates);
        }
        //fin: DESCOMPRIMIMOS EL ARCHIVO QUE CONTIENE LAS PLANTILLAS
        //
        //inicio: DESCOMPRIMIMOS EL ARCHIVO QUE CONTIENE LOS DOCUMENTOS
        $CompressedFiles = $request->getFiles('CompressedFiles');
        if ($CompressedFiles != '') {
            DecompressFile($CompressedFiles);
        }
        //fin: DESCOMPRIMIMOS EL ARCHIVO QUE CONTIENE LOS DOCUMENTOS
        //
        //inicio: LLAMAMOS LA FUNCION DE LECTURA DEL TrialTemplate
        $TrialTemplateFile = $request->getFiles('TrialTemplateFile');
        $ArrTrial = null;
        if ($TrialTemplateFile != '') {
            $InfoReadTrialTemplate = ReadTrialTemplate($TrialTemplateFile);
            $ArrTrial = $InfoReadTrialTemplate['ArrTrial'];
        }
        //fin: LLAMAMOS LA FUNCION DE LECTURA DEL TrialTemplate
        //
        //inicio: LLAMAMOS LA FUNCION DE LECTURA DEL TrialInfoTemplate
        $TrialInfoTemplateFile = $request->getFiles('TrialInfoTemplateFile');
        $ArrTrialInfo = null;
        if (($TrialInfoTemplateFile['name'] != '') && (count($ArrTrial) > 0)) {
            $InfoReadTrialInfoTemplate = ReadTrialInfoTemplate($TrialInfoTemplateFile, $ArrTrial);
            $ArrTrialInfo = $InfoReadTrialInfoTemplate['ArrTrialInfo'];
        }
        //fin: LLAMAMOS LA FUNCION DE LECTURA DEL TrialInfoTemplate
        //
        //inicio: LLAMAMOS LA FUNCION DE LECTURA DEL TrialInfoDataTemplate
        if (count($ArrTrialInfo) > 0) {
            $CompressedFileTrialInfoDataTemplates = $request->getFiles('CompressedFileTrialInfoDataTemplates');
            ReadTrialInfoDataTemplate($ArrTrialInfo);
        }
        //fin: LLAMAMOS LA FUNCION DE LECTURA DEL TrialInfoDataTemplate
        CloseProcess($TmpUploadDir);
    }

    public function executeTemplatepack(sfWebRequest $request) {
        $this->setLayout(false);
        $connection = Doctrine_Manager::getInstance()->connection();
        $user = sfContext::getInstance()->getUser();
        $id_user = $this->getUser()->getGuardUser()->getId();
        $UploadDir = sfConfig::get("sf_upload_dir");
        $tmp_download = $UploadDir . "/tmp$id_user";
        if (!is_dir($tmp_download)) {
            mkdir($tmp_download, 0777);
        }

        $zip = new ZipArchive();
        $filename = "$tmp_download/TemplatePack.zip";
        $zip->open($filename, ZIPARCHIVE::CREATE);

        $TrialTemplate = CreateTemplateTrial();
        $zip->addFile("$tmp_download/$TrialTemplate", "$TrialTemplate");

        $TrialInfoTemplate = CreateTemplateTrialInfo();
        $zip->addFile("$tmp_download/$TrialInfoTemplate", "$TrialInfoTemplate");

        $ArrTemplateFiles = CreateTemplateTrialInfoData();
        foreach ($ArrTemplateFiles AS $TemplateFile) {
            $zip->addFile("$tmp_download/$TemplateFile", "$TemplateFile");
        }

        $zip->close();

        if (file_exists($filename)) {
            header('Content-type: "application/zip"');
            header('Content-Disposition: attachment; filename="TemplatePack.zip"');
            readfile($filename);
            unlink($filename);
        }
        if (@chdir($tmp_download)) {
            $command = "rmdir /s /q " . $tmp_download;
            exec($command);
        }
        die();
    }

    public function executeTriallocationcoordinates($request) {
        $this->setLayout(false);
    }

    //VALIDAMOS LOS PERMISOS DE DESCARGA
    public function executeValidatePermissionsDownload($request) {
        $this->setLayout(false);
        $id_trial = $request->getParameter('id_trial');

        $TbTrial = Doctrine::getTable('TbTrial')->findOneByIdTrial($id_trial);
        $Trltrialpermissions = $TbTrial->getTrltrialpermissions();
        $user = sfContext::getInstance()->getUser();
        $Menssage = 'Not-Permissions';

        //SI TIENE LA REGLA PARA USUARIOS VERIFICAMOS EL USUARIO
        if ($Trltrialpermissions == 'Open to specified users') {
            if ($this->getUser()->isAuthenticated()) {
                $id_user = $this->getUser()->getGuardUser()->getId();
                $filas = 0;
                $QUERY00 = Doctrine_Query::create()
                        ->select("T.id_trialpermissionuser AS id")
                        ->from("TbTrialpermissionuser T")
                        ->where("T.id_trial = $id_trial")
                        ->andWhere("T.id_userpermission = $id_user");
                $Resultado00 = $QUERY00->execute();
                if (count($Resultado00) > 0) {
                    $Menssage = 'OK';
                }
            } else {
                $Menssage = 'Un-Authenticated';
            }
        }

        //SI TIENE LA REGLA PARA GRUPOS VERIFICAMOS EL GRUPO DEL USUARIO
        if ($Trltrialpermissions == 'Open to specified groups') {
            if ($this->getUser()->isAuthenticated()) {
                $id_user = $this->getUser()->getGuardUser()->getId();
                $SfGuardUserGroup = Doctrine::getTable('SfGuardUserGroup')->findByUserId($id_user);
                foreach ($SfGuardUserGroup AS $Group) {
                    $id_group = $Group->group_id;
                    $TbTrialpermissiongroup = Doctrine::getTable('TbTrialpermissiongroup')->findByIdGrouppermission($id_group);
                    if (count($TbTrialpermissiongroup) > 0) {
                        $Menssage = 'OK';
                        break;
                    }
                }
            } else {
                $Menssage = 'Un-Authenticated';
            }
        }

        //SI TIENE LA REGLA PARA TODOS LOS USUARIOS DEL SISTEMA SE VERIFICA QUE ESTE AUTENTICADO
        if ($Trltrialpermissions == 'Open to all users') {
            if ($this->getUser()->isAuthenticated()) {
                $Menssage = 'OK';
            } else {
                $Menssage = 'Un-Authenticated';
            }
        }

        //PERMISO PARA LOS USUARIOS DE INTERNET        
        if ($Trltrialpermissions == 'Public domain') {
            $Menssage = 'OK';
        }
        die($Menssage);
    }

    public function executeDownloadFileTrial($request) {
        $id_trial = $request->getParameter('id_trial');
        $id_crop = $request->getParameter('id_crop');
        $typefile = $request->getParameter('typefile');
        $TbTrial = Doctrine::getTable('TbTrial')->findOneByIdTrial($id_trial);
        $Trltrialpermissions = $TbTrial->getTrltrialpermissions();
        $user = sfContext::getInstance()->getUser();
        $Continue = false;

        //SI TIENE LA REGLA PARA USUARIOS VERIFICAMOS EL USUARIO
        if ($Trltrialpermissions == 'Open to specified users') {
            if ($this->getUser()->isAuthenticated()) {
                $id_user = $this->getUser()->getGuardUser()->getId();
                $filas = 0;
                $QUERY00 = Doctrine_Query::create()
                        ->select("T.id_trialpermissionuser AS id")
                        ->from("TbTrialpermissionuser T")
                        ->where("T.id_trial = $id_trial")
                        ->andWhere("T.id_userpermission = $id_user");
                $Resultado00 = $QUERY00->execute();
                if (count($Resultado00) > 0) {
                    $Continue = true;
                }
            } else {
                echo "<script> alert('*** ERROR *** \\n\\n Sorry! You must be authenticated.!'); window.history.back();</script>";
                Die();
            }
        }

        //SI TIENE LA REGLA PARA GRUPOS VERIFICAMOS EL GRUPO DEL USUARIO
        if ($Trltrialpermissions == 'Open to specified groups') {
            if ($this->getUser()->isAuthenticated()) {
                $id_user = $this->getUser()->getGuardUser()->getId();
                $SfGuardUserGroup = Doctrine::getTable('SfGuardUserGroup')->findByUserId($id_user);
                foreach ($SfGuardUserGroup AS $Group) {
                    $id_group = $Group->group_id;
                    $TbTrialpermissiongroup = Doctrine::getTable('TbTrialpermissiongroup')->findByIdGrouppermission($id_group);
                    if (count($TbTrialpermissiongroup) > 0) {
                        $Continue = true;
                        break;
                    }
                }
            } else {
                echo "<script> alert('*** ERROR *** \\n\\n Sorry! You must be authenticated.!'); window.history.back();</script>";
                Die();
            }
        }

        //SI TIENE LA REGLA PARA TODOS LOS USUARIOS DEL SISTEMA SE VERIFICA QUE ESTE AUTENTICADO
        if ($Trltrialpermissions == 'Open to all users') {
            if ($this->getUser()->isAuthenticated()) {
                $Continue = true;
            } else {
                echo "<script> alert('*** ERROR *** \\n\\n Sorry! You must be authenticated.!'); window.history.back();</script>";
                Die();
            }
        }

        if ($Trltrialpermissions == 'Public domain') {
            $Continue = true;
        }

        if (!$Continue) {
            echo "<script> alert('*** ERROR *** \\n\\n Sorry! You do not have the permissions to download the file.!'); window.history.back();</script>";
            Die();
        }

        $id_user = null;
        $date = date("Y-m-d") . " " . date("H:i:s");
        if ($this->getUser()->isAuthenticated())
            $id_user = $this->getUser()->getGuardUser()->getId();

        $Directorio = "FilesTrial$id_trial";
        $UploadDir = sfConfig::get("sf_upload_dir");
        $DirUploads = "$UploadDir/$Directorio";

        $QUERY01 = Doctrine_Query::create()
                ->from("TbTrialinfo T")
                ->where("T.id_trial = $id_trial AND T.id_crop = $id_crop ");
        $Resultado01 = $QUERY01->execute();
        foreach ($Resultado01 AS $fila) {
            $trnfdatafile = $fila['trnfdatafile'];
            $trnfdataorresultsfile = $fila['trnfdataorresultsfile'];
            $trnfsuppplementalinformationfile = $fila['trnfsuppplementalinformationfile'];
            $trnfweatherdatafile = $fila['trnfweatherdatafile'];
            $trnfsoildatafile = $fila['trnfsoildatafile'];
        }

        if ($typefile == 'Data File')
            $file = $trnfdatafile;
        if ($typefile == 'Results File')
            $file = $trnfdataorresultsfile;
        if ($typefile == 'Suppplemental Information File')
            $file = $trnfsuppplementalinformationfile;
        if ($typefile == 'Weather File')
            $file = $trnfweatherdatafile;
        if ($typefile == 'Soil File')
            $file = $trnfsoildatafile;

        $DirFile = "$DirUploads/$file";

        if ((file_exists($DirFile))) {
            $Tamano = 0;
            $Tamano = filesize($DirFile);
            $TotalTamano = $TotalTamano + $Tamano;
        }

        $TotalTamanoMB = round(($TotalTamano / 1024000), 2);
        $SfGuardUserDownloads = new SfGuardUserDownloads();
        $SfGuardUserDownloads->setUserId($id_user);
        $SfGuardUserDownloads->setIdTrial($id_trial);
        $SfGuardUserDownloads->setIdCrop($id_crop);
        $SfGuardUserDownloads->setUsdwtype($typefile);
        $SfGuardUserDownloads->setUsdwfile($file);
        $SfGuardUserDownloads->setUsdwdate($date);
        $SfGuardUserDownloads->setUsdwsize($TotalTamanoMB);
        $SfGuardUserDownloads->save();

        //$DirFile = str_replace("/", "\\", $DirFile); //ESTA PARTE ES PARA LOS SEVIRDORES WINDOWS
        $DirFile = file($DirFile);
        $DirFile = implode("", $DirFile);
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . str_replace(" ", "_", $file) . "\r\n\r\n");
        header("Content-Length: " . strlen($DirFile) . "\n\n");
        die($DirFile);
    }

    public function executeFilterVariety($request) {
        $this->setLayout(false);
        $txt = $request->getParameter('txt');
        $id_crop = $request->getParameter('id_crop');
        $i = $request->getParameter('i');
        $connection = Doctrine_Manager::getInstance()->connection();
        $user = sfContext::getInstance()->getUser();
        $ArrVariety = $user->getAttribute('ArrVariety');
        $NotInIdVariety = "";
        if (count($ArrVariety[$i]) > 0) {
            foreach ($ArrVariety[$i] AS $id_variety) {
                $NotInIdVariety .= "$id_variety,";
            }
            $NotInIdVariety = substr($NotInIdVariety, 0, (strlen($NotInIdVariety) - 1));
        }

        $txt = str_replace("*quot*", " ", $txt);
        $txt = mb_strtolower($txt, 'UTF-8');
        $QUERY = "SELECT T.id_variety,T.vrtname,T.vrtorigin,T.vrtsynonymous,T.id_genebank ";
        $QUERY .= "FROM tb_variety T ";
        $QUERY .= "WHERE UPPER(T.vrtname) LIKE UPPER('$txt%') ";
        $QUERY .= "AND T.id_crop = $id_crop ";
        if ($NotInIdVariety != '')
            $QUERY .= "AND T.id_variety NOT IN ($NotInIdVariety) ";
        $QUERY .= "ORDER BY T.vrtname ";
        $QUERY .= "LIMIT 100 ";
        $st = $connection->execute($QUERY);
        $Variety = $st->fetchAll(PDO::FETCH_ASSOC);
        $HTML = "";
        if (count($Variety) > O) {
            foreach ($Variety AS $Valor) {
                $HTML .= "<tr title='Click to select' onclick='SelectVariety({$Valor['id_variety']},$i);'>";
                $HTML .= "<td>{$Valor['vrtname']}</td>";
                $HTML .= "<td>{$Valor['vrtorigin']}</td>";
                $HTML .= "<td>{$Valor['vrtsynonymous']}</td>";
                $HTML .= "<td>";
                $HTML .= "</td>";
                $HTML .= "</tr>";
            }
        } else {
            $HTML .= "<td colspan='4' bgcolor='#FFFFD9' ><b>Not Results</b></td>";
        }
        die($HTML);
    }

    //ADICIONAMOS LA VARIEDAD AL ARRAY DE VARIEDADES SELECCIONADAS
    public function executeVarietySelected($request) {
        $this->setLayout(false);
        $id_variety = $request->getParameter('id_variety');
        $i = $request->getParameter('i');
        $user = sfContext::getInstance()->getUser();
        $ArrVariety = $user->getAttribute('ArrVariety');
        $ArrVariety[$i][$id_variety] = $id_variety;
        $user->setAttribute('ArrVariety', $ArrVariety);
        DIE();
    }

    //CARGAMOS LAS VARIABLES SELECIONADAS
    public function executeLoadVarietySelected($request) {
        $this->setLayout(false);
        $i = $request->getParameter('i');
        $connection = Doctrine_Manager::getInstance()->connection();
        $user = sfContext::getInstance()->getUser();
        $ArrVariety = $user->getAttribute('ArrVariety');
        $ListIdVariety = "";
        if (count($ArrVariety[$i]) > 0) {
            foreach ($ArrVariety[$i] AS $id_variety) {
                $ListIdVariety .= "$id_variety,";
            }
            $ListIdVariety = substr($ListIdVariety, 0, (strlen($ListIdVariety) - 1));
            $QUERY = "SELECT T.id_variety,T.vrtname,T.vrtorigin,T.vrtsynonymous,T.id_genebank ";
            $QUERY .= "FROM tb_variety T ";
            $QUERY .= "WHERE T.id_variety IN ($ListIdVariety) ";
            $QUERY .= "ORDER BY T.vrtname ";
            $st = $connection->execute($QUERY);
            $Variety = $st->fetchAll(PDO::FETCH_ASSOC);
            $HTML = "";
            if (count($Variety) > 0) {
                foreach ($Variety AS $Valor) {
                    $HTML .= "<tr>";
                    $HTML .= "<td>{$Valor['vrtname']}</td>";
                    $HTML .= "<td>{$Valor['vrtorigin']}</td>";
                    $HTML .= "<td>{$Valor['vrtsynonymous']}</td>";
                    $HTML .= "<td>";
                    $HTML .= "<span class='Span-Action-Link name='RemoveVariety' id='RemoveVariety' onclick='RemoveVariety({$Valor['id_variety']},$i);' title='Remove'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span> Remove</span>&ensp;";
                    $HTML .= "</td>";
                    $HTML .= "</tr>";
                }
            }
            die($HTML);
        }
        die();
    }

    //REMOVEMOS LA VARIEDAD DEL ARRAY DE VARIEDADES SELECCIONADAS
    public function executeRemoveVariety($request) {
        $this->setLayout(false);
        $id_variety = $request->getParameter('id_variety');
        $i = $request->getParameter('i');
        $user = sfContext::getInstance()->getUser();
        $ArrVariety = $user->getAttribute('ArrVariety');
        unset($ArrVariety[$i][$id_variety]);
        $user->setAttribute('ArrVariety', $ArrVariety);
        die();
    }

    //REMOVEMOS LAS VARIEDADES AL CAMBIO DE CULTIVO
    public function executeDeleteVarietySelected($request) {
        $this->setLayout(false);
        $i = $request->getParameter('i');
        $user = sfContext::getInstance()->getUser();
        $ArrVariety = $user->getAttribute('ArrVariety');
        $ArrVariety[$i] = null;
        $user->setAttribute('ArrVariety', $ArrVariety);
        die();
    }

    //FILTRAMOS LAS Variables Measured
    public function executeFilterVariablesMeasured($request) {
        $this->setLayout(false);
        $txt = $request->getParameter('txt');
        $id_crop = $request->getParameter('id_crop');
        $i = $request->getParameter('i');
        $connection = Doctrine_Manager::getInstance()->connection();
        $user = sfContext::getInstance()->getUser();
        $ArrVariablesMeasured = $user->getAttribute('ArrVariablesMeasured');
        $NotInIdVariablesMeasured = "";
        if (count($ArrVariablesMeasured[$i]) > 0) {
            foreach ($ArrVariablesMeasured[$i] AS $id_variablesmeasured) {
                $NotInIdVariablesMeasured .= "$id_variablesmeasured,";
            }
            $NotInIdVariablesMeasured = substr($NotInIdVariablesMeasured, 0, (strlen($NotInIdVariablesMeasured) - 1));
        }

        $txt = str_replace("*quot*", " ", $txt);
        $txt = mb_strtolower($txt, 'UTF-8');
        $QUERY = "SELECT T.id_variablesmeasured,T.vrmsname,T2.trclname,T.vrmsdefinition,T.vrmsunit,T.id_ontology ";
        $QUERY .= "FROM tb_variablesmeasured T ";
        $QUERY .= "INNER JOIN tb_traitclass T2 ON T.id_traitclass = T2.id_traitclass ";
        $QUERY .= "WHERE UPPER(T.vrmsname) LIKE UPPER('$txt%') ";
        $QUERY .= "AND T.id_crop = $id_crop ";
        if ($NotInIdVariablesMeasured != '')
            $QUERY .= "AND T.id_variablesmeasured NOT IN ($NotInIdVariablesMeasured) ";
        $QUERY .= "ORDER BY T.vrmsname ";
        $QUERY .= "LIMIT 100 ";
        $st = $connection->execute($QUERY);
        $VariablesMeasured = $st->fetchAll(PDO::FETCH_ASSOC);
        $HTML = "";
        if (count($VariablesMeasured) > 0) {
            foreach ($VariablesMeasured AS $Valor) {
                $HTML .= "<tr title='Click to select' onclick='SelectVariablesMeasured({$Valor['id_variablesmeasured']},$i);'>";
                $HTML .= "<td>{$Valor['vrmsname']}</b></td>";
                $HTML .= "<td>{$Valor['trclname']}</td>";
                $HTML .= "<td>{$Valor['vrmsdefinition']}</td>";
                $HTML .= "<td>{$Valor['vrmsunit']}</td>";
                $HTML .= "<td>";
                $HTML .= "</td>";
                $HTML .= "</tr>";
            }
        } else {
            $HTML .= "<td colspan='5' bgcolor='#FFFFD9' ><b>Not Results</b></td>";
        }
        die($HTML);
    }

    //ADICIONAMOS LA VARIEDAD AL ARRAY DE VARIEDADES SELECCIONADAS
    public function executeVariablesMeasuredSelected($request) {
        $this->setLayout(false);
        $id_variablesmeasured = $request->getParameter('id_variablesmeasured');
        $i = $request->getParameter('i');
        $user = sfContext::getInstance()->getUser();
        $ArrVariablesMeasured = $user->getAttribute('ArrVariablesMeasured');
        $ArrVariablesMeasured[$i][$id_variablesmeasured] = $id_variablesmeasured;
        $user->setAttribute('ArrVariablesMeasured', $ArrVariablesMeasured);
        die();
    }

    //CARGAMOS LAS VARIABLES SELECIONADAS
    public function executeLoadVariablesMeasuredSelected($request) {
        $this->setLayout(false);
        $i = $request->getParameter('i');
        $connection = Doctrine_Manager::getInstance()->connection();
        $user = sfContext::getInstance()->getUser();
        $ArrVariablesMeasured = $user->getAttribute('ArrVariablesMeasured');

        $ListIdVariablesMeasured = "";
        if (count($ArrVariablesMeasured[$i]) > 0) {
            foreach ($ArrVariablesMeasured[$i] AS $id_variablesmeasured) {
                $ListIdVariablesMeasured .= "$id_variablesmeasured,";
            }
            $ListIdVariablesMeasured = substr($ListIdVariablesMeasured, 0, (strlen($ListIdVariablesMeasured) - 1));
            $QUERY = "SELECT T.id_variablesmeasured,T.vrmsname,T2.trclname,T.vrmsdefinition,T.vrmsunit,T.id_ontology ";
            $QUERY .= "FROM tb_variablesmeasured T ";
            $QUERY .= "INNER JOIN tb_traitclass T2 ON T.id_traitclass = T2.id_traitclass ";
            $QUERY .= "WHERE T.id_variablesmeasured IN ($ListIdVariablesMeasured) ";
            $QUERY .= "ORDER BY T.vrmsname ";
            $st = $connection->execute($QUERY);
            $VariablesMeasured = $st->fetchAll(PDO::FETCH_ASSOC);
            $HTML = "";
            if (count($VariablesMeasured) > 0) {
                foreach ($VariablesMeasured AS $Valor) {
                    $HTML .= "<tr>";
                    $HTML .= "<td>{$Valor['vrmsname']}</td>";
                    $HTML .= "<td>{$Valor['trclname']}</td>";
                    $HTML .= "<td>{$Valor['vrmsdefinition']}</td>";
                    $HTML .= "<td>{$Valor['vrmsunit']}</td>";
                    $HTML .= "<td>";
                    $HTML .= "<span class='Span-Action-Link name='RemoveVariablesMeasured' id='RemoveVariablesMeasured' onclick='RemoveVariablesMeasured({$Valor['id_variablesmeasured']},$i);' title='Remove'><span class='glyphicon glyphicon-remove-sign' aria-hidden='true'></span> Remove</span>&ensp;";
                    if ($Valor['id_ontology'] != '')
                        $HTML .= "<span class='Span-Action-Link name='ViewVariablesMeasured' id='ViewVariablesMeasured' onclick=\"ViewVariablesMeasured('{$Valor['id_ontology']}');\" title='View'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span> View</span>";
                    $HTML .= "</td>";
                    $HTML .= "</tr>";
                }
            }
            die($HTML);
        }
        die();
    }

    //REMOVEMOS LA VARIEDAD DEL ARRAY DE VARIEDADES SELECCIONADAS
    public function executeRemoveVariablesMeasured($request) {
        $this->setLayout(false);
        $id_variablesmeasured = $request->getParameter('id_variablesmeasured');
        $i = $request->getParameter('i');
        $user = sfContext::getInstance()->getUser();
        $ArrVariablesMeasured = $user->getAttribute('ArrVariablesMeasured');
        unset($ArrVariablesMeasured[$i][$id_variablesmeasured]);
        $user->setAttribute('ArrVariablesMeasured', $ArrVariablesMeasured);
        die();
    }

    //REMOVEMOS LAS VARIEDADES AL CAMBIO DE CULTIVO
    public function executeDeleteVariablesMeasuredSelected($request) {
        $this->setLayout(false);
        $i = $request->getParameter('i');
        $user = sfContext::getInstance()->getUser();
        $ArrVariablesMeasured = $user->getAttribute('ArrVariablesMeasured');
        $ArrVariablesMeasured[$i] = null;
        $user->setAttribute('ArrVariablesMeasured', $ArrVariablesMeasured);
        die();
    }

    //DESCARGAMOS EL TEMPLATE DE LA FILA
    public function executeDownloadDataTemplate($request) {
        $this->setLayout(false);
        $Ind = $request->getParameter('i');
        $replication = $request->getParameter('replication');
        $connection = Doctrine_Manager::getInstance()->connection();
        $user = sfContext::getInstance()->getUser();
        $ArrVariablesMeasuredComplete = $user->getAttribute('ArrVariablesMeasured');
        $ArrVariablesMeasured = $ArrVariablesMeasuredComplete[$Ind];
        $ArrVarietyComplete = $user->getAttribute('ArrVariety');
        $ArrVariety = $ArrVarietyComplete[$Ind];

        error_reporting(E_ALL);
        date_default_timezone_set('Europe/London');
        set_time_limit(900000);
        // Create new PHPExcel object

        $objPHPExcel = new PHPExcel();

        // Set properties
        $objPHPExcel->getProperties()->setCreator("AgTrials")
                ->setLastModifiedBy("AgTrials")
                ->setTitle("Template Trial Data")
                ->setSubject("Template Trial Data")
                ->setDescription("Template Trial Data")
                ->setKeywords("Template Trial Data")
                ->setCategory("Template Trial Data");

        // Add some data
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet(0)->setTitle('Template Trial Data');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Replication');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Varieties');
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
        $objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

        //AQUI GENERAMOS LAS FILA DE VARIABLES MEDIDAS
        $letter = "B";
        foreach ($ArrVariablesMeasured AS $variablesmeasured_id) {
            $TbVariablesmeasured = Doctrine::getTable('TbVariablesmeasured')->findOneByIdVariablesmeasured($variablesmeasured_id);
            $Vrmsname = $TbVariablesmeasured->getVrmsname();
            $letter = NextLetter($letter);
            $objPHPExcel->getActiveSheet()->setCellValue($letter . '1', $Vrmsname);
            $objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getStyle($letter . '1')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
            $objPHPExcel->getActiveSheet()->getStyle($letter . '1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED);
        }
        $objPHPExcel->getActiveSheet()->protectCells("A1:" . $letter . "1");

        //AQUI GENERAMOS LAS COLUMNAS DE REPLICACION Y VARIEDADES
        $i = 2;
        for ($a = 1; $a <= $replication; $a++) {
            foreach ($ArrVariety AS $varieties_id) {
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
        //
        //ACTIVAMOS EL PRIMER LIBRO
        $objPHPExcel->setActiveSheetIndex(0);
        // Redirect output to a clientâ€™s web browser (Excel5)
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=TrialDataTemplate$Ind.xls");
        header("Cache-Control: max-age=0");

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
        die();
    }

    public function executeAutocompletesearhtrial(sfWebRequest $request) {
        $SearchWhere = sfContext::getInstance()->getUser()->getAttribute('SearchWhere');
        $Where = "";
        foreach ($SearchWhere AS $value) {
            $Where .= $value;
        }
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $term = $request->getParameter('term');
        $QUERY = "SELECT T.id_trial AS value, T.trltrialname AS label ";
        $QUERY .= "FROM tb_trial T ";
        $QUERY .= "INNER JOIN tb_trialinfo TI ON T.id_trial = TI.id_trial ";
        $QUERY .= "WHERE T.trltrialname ILIKE ('%$term%') ";
        $QUERY .= "$Where ";
        $QUERY .= "GROUP BY T.id_trial,T.trltrialname ";
        $QUERY .= "ORDER BY T.trltrialname";
        $st = $connection->execute($QUERY);
        $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        return $this->renderText(json_encode($R_datos));
    }

    public function executeAutocompletesearchplantingsowing(sfWebRequest $request) {
        $SearchWhere = sfContext::getInstance()->getUser()->getAttribute('SearchWhere');
        $Where = "";
        foreach ($SearchWhere AS $value) {
            $Where .= $value;
        }
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $term = $request->getParameter('term');
        $QUERY = "SELECT DISTINCT substring(TI.created_at::text from 0 for 11) AS value, substring(TI.created_at::text from 0 for 11) AS label ";
        $QUERY .= "FROM tb_trial T ";
        $QUERY .= "INNER JOIN tb_trialinfo TI ON T.id_trial = TI.id_trial ";
        $QUERY .= "WHERE TI.created_at::text ILIKE ('%$term%') ";
        $QUERY .= "$Where ";
        $QUERY .= "GROUP BY TI.created_at ";
        $st = $connection->execute($QUERY);
        $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        return $this->renderText(json_encode($R_datos));
    }

    public function executeSearchtrials($request) {
        sfContext::getInstance()->getUser()->getAttributeHolder()->remove('SearchWhere');
    }

    public function executeResultsearchtrials($request) {
        $SearchWhere = sfContext::getInstance()->getUser()->getAttribute('SearchWhere');
        $Where = "";
        foreach ($SearchWhere AS $value) {
            $Where .= $value;
        }
        $connection = Doctrine_Manager::getInstance()->connection();
        $QUERY00 = "SELECT T.id_trial,T.trltrialname,P.id_project,P.prjname,TL.id_triallocation,TL.trlcname,C.id_crop,C.crpname ";
        $QUERY00 .= "FROM tb_trial T ";
        $QUERY00 .= "INNER JOIN tb_project P ON T.id_project = P.id_project ";
        $QUERY00 .= "INNER JOIN tb_trialinfo TI ON T.id_trial = TI.id_trial ";
        $QUERY00 .= "INNER JOIN tb_triallocation TL ON T.id_triallocation = TL.id_triallocation ";
        $QUERY00 .= "INNER JOIN tb_crop c ON TI.id_crop = C.id_crop ";
        $QUERY00 .= "$Where ";
        $QUERY00 .= "ORDER BY T.trltrialname,P.prjname ";
        $st = $connection->execute($QUERY00);
        $Results = $st->fetchAll();
        foreach ($Results AS $Row) {
            $ResultsJSON['data'][] = array($Row['trltrialname'], $Row['prjname'], $Row['trlcname'], $Row['crpname'], $Row['id_trial']);
        }
        die(json_encode($ResultsJSON));
    }

    public function executeAssingWhere($request) {
        $SearchWhere = sfContext::getInstance()->getUser()->getAttribute('SearchWhere');
        $field = $request->getParameter('field');
        $value = $request->getParameter('value');

        switch ($field) {
            case 'id_project':
                if ($value != '') {
                    $SearchWhere['id_project'] = "AND T.id_project = $value ";
                } else {
                    unset($SearchWhere['id_project']);
                }
                break;
            case 'id_contactperson':
                if ($value != '') {
                    $SearchWhere['id_contactperson'] = "AND T.id_contactperson = $value ";
                } else {
                    unset($SearchWhere['id_contactperson']);
                }
                break;
            case 'id_crop':
                if ($value != '') {
                    $SearchWhere['id_crop'] = "AND TI.id_crop = $value ";
                } else {
                    unset($SearchWhere['id_crop']);
                }
                break;
            case 'id_trial':
                if ($value != '') {
                    $SearchWhere['id_trial'] = "AND T.id_trial = $value ";
                } else {
                    unset($SearchWhere['id_trial']);
                }
                break;
            case 'reset':
                unset($SearchWhere);
                break;
        }
        die(sfContext::getInstance()->getUser()->setAttribute('SearchWhere', $SearchWhere));
    }

    public function executeValidSearchterms($request) {
        $SearchWhere = sfContext::getInstance()->getUser()->getAttribute('SearchWhere');
        $Where = "";
        foreach ($SearchWhere AS $value) {
            $Where .= $value;
        }
        $ReturnFlag = FALSE;
        $ListProjects = "";
        $connection = Doctrine_Manager::getInstance()->connection();
        $searchterms = $request->getParameter('searchterms');
        $searchtermsoptions = $request->getParameter('searchtermsoptions');
        if ($searchterms != '') {
            $Arr_Searchterms = explode("+", $searchterms);
            $WhereSearchterms = "";
            foreach ($Arr_Searchterms AS $value) {
                $value = trim($value);
                $WhereSearchterms .= "P.prjname  ILIKE '%$value%' $searchtermsoptions ";
            }
            $WhereSearchterms = substr($WhereSearchterms, 0, strlen($WhereSearchterms) - 4);
            $WhereSearchterms = "AND ($WhereSearchterms)";

            $QUERY = "SELECT P.id_project AS value ";
            $QUERY .= "FROM tb_project P ";
            $QUERY .= "INNER JOIN tb_trial T ON P.id_project = T.id_project ";
            $QUERY .= "INNER JOIN tb_trialinfo TI ON T.id_trial = TI.id_trial ";
            $QUERY .= "WHERE TRUE ";
            $QUERY .= "$WhereSearchterms ";
            $QUERY .= "$Where ";
            $QUERY .= "GROUP BY P.id_project,P.prjname ";
            $QUERY .= "ORDER BY P.prjname ";
            $st = $connection->execute($QUERY);
            $Projects = $st->fetchAll(PDO::FETCH_ASSOC);
            if (count($Projects) > 0) {
                foreach ($Projects AS $Project) {
                    $ListProjects .= $Project['value'] . ",";
                }
                $ListProjects = substr($ListProjects, 0, strlen($ListProjects) - 1);
            }
        }
        if ($ListProjects != '') {
            $SearchWhere['searchterms'] = "AND P.id_project IN ($ListProjects) ";
        } else {
            unset($SearchWhere['searchterms']);
            if ($searchterms !== '')
                $ReturnFlag = TRUE;
        }
        sfContext::getInstance()->getUser()->setAttribute('SearchWhere', $SearchWhere);
        die($ReturnFlag);
    }

}

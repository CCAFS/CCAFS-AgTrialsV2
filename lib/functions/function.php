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

function select_from_table($name, $table, $idfield, $namefield, $wheretable = '', $value = null, $properties = null) {
    if ($wheretable == '')
        $wheretable = 'true';
    $QUERY00 = Doctrine_Query::create()
            ->select("$idfield AS id, ($namefield) AS name")
            ->from("$table")
            ->where("$wheretable")
            ->orderBy("$namefield");
    //echo $QUERY00->getSqlQuery(); die();
    $Resultado00 = $QUERY00->execute();
    $OPTION = "<OPTION VALUE=''>Choose...</OPTION>";
    foreach ($Resultado00 AS $fila) {
        $titulo = $fila['name'];
        $valor = $fila['name'];
        if (strlen($valor) > 35)
            $valor = substr($valor, 0, 35) . "...";
        $selected = "";
        if ($fila['id'] == $value)
            $selected = "selected";
        $OPTION .= "<OPTION TITLE='$titulo' VALUE='{$fila['id']}' $selected>$valor</OPTION>";
    }
    $HTML = "<SELECT NAME='$name' id='$name' SIZE='1' $properties>";
    $HTML .= $OPTION;
    $HTML .= "</SELECT>";
    return $HTML;
}

function select_from_country($name, $value = null, $properties = null) {
    $connection = Doctrine_Manager::getInstance()->connection();
    $QUERY00 = "SELECT ADM.id_administrativedivision,ADM.dmdvname ";
    $QUERY00 .= "FROM tb_administrativedivision ADM ";
    $QUERY00 .= "WHERE ADM.id_administrativedivisiontype = 1 ";
    $QUERY00 .= "GROUP BY ADM.id_administrativedivision,ADM.dmdvname ";
    $QUERY00 .= "ORDER BY ADM.dmdvname ";
    $st = $connection->execute($QUERY00);
    $Resultado00 = $st->fetchAll();
    $OPTION = "<OPTION VALUE=''>Choose...</OPTION>";
    foreach ($Resultado00 AS $fila) {
        $titulo = $fila['dmdvname'];
        $valor = $fila['dmdvname'];
        if (strlen($valor) > 35)
            $valor = substr($valor, 0, 35) . "...";
        $selected = "";
        if ($fila['id_administrativedivision'] == $value)
            $selected = "selected";
        $OPTION .= "<OPTION TITLE='$titulo' VALUE='{$fila['id_administrativedivision']}' $selected>$valor</OPTION>";
    }
    $HTML = "<SELECT NAME='$name' id='$name' SIZE='1' $properties>";
    $HTML .= $OPTION;
    $HTML .= "</SELECT>";
    return $HTML;
}

function select_from_country_triallocation($name, $value = null, $properties = null) {
    $connection = Doctrine_Manager::getInstance()->connection();
    $QUERY00 = "SELECT ADM.id_administrativedivision,ADM.dmdvname ";
    $QUERY00 .= "FROM tb_administrativedivision ADM ";
    $QUERY00 .= "INNER JOIN tb_triallocationadministrativedivision TLADM ON ADM.id_administrativedivision = TLADM.id_administrativedivision ";
    $QUERY00 .= "WHERE ADM.id_administrativedivisiontype = 1 ";
    $QUERY00 .= "GROUP BY ADM.id_administrativedivision,ADM.dmdvname ";
    $QUERY00 .= "ORDER BY ADM.dmdvname ";
    $st = $connection->execute($QUERY00);
    $Resultado00 = $st->fetchAll();
    $OPTION = "<OPTION VALUE=''>Choose...</OPTION>";
    foreach ($Resultado00 AS $fila) {
        $titulo = $fila['dmdvname'];
        $valor = $fila['dmdvname'];
        if (strlen($valor) > 35)
            $valor = substr($valor, 0, 35) . "...";
        $selected = "";
        if ($fila['id_administrativedivision'] == $value)
            $selected = "selected";
        $OPTION .= "<OPTION TITLE='$titulo' VALUE='{$fila['id_administrativedivision']}' $selected>$valor</OPTION>";
    }
    $HTML = "<SELECT NAME='$name' id='$name' SIZE='1' $properties>";
    $HTML .= $OPTION;
    $HTML .= "</SELECT>";
    return $HTML;
}

function select_from_crop_variablesmeasured($name, $value = null, $properties = null) {
    $connection = Doctrine_Manager::getInstance()->connection();
    $QUERY00 = "SELECT C.id_crop,C.crpname ";
    $QUERY00 .= "FROM tb_variablesmeasured VM ";
    $QUERY00 .= "INNER JOIN tb_crop C ON VM.id_crop = C.id_crop ";
    $QUERY00 .= "GROUP BY C.id_crop,C.crpname ";
    $QUERY00 .= "ORDER BY C.crpname ";
    $st = $connection->execute($QUERY00);
    $Resultado00 = $st->fetchAll();
    $OPTION = "<OPTION VALUE=''>Choose...</OPTION>";
    foreach ($Resultado00 AS $fila) {
        $titulo = $fila['crpname'];
        $valor = $fila['crpname'];
        if (strlen($valor) > 35)
            $valor = substr($valor, 0, 35) . "...";
        $selected = "";
        if ($fila['id_crop'] == $value)
            $selected = "selected";
        $OPTION .= "<OPTION TITLE='$titulo' VALUE='{$fila['id_crop']}' $selected>$valor</OPTION>";
    }
    $HTML = "<SELECT NAME='$name' id='$name' SIZE='1' $properties>";
    $HTML .= $OPTION;
    $HTML .= "</SELECT>";
    return $HTML;
}

function select_from_crop_variety($name, $value = null, $properties = null) {
    $connection = Doctrine_Manager::getInstance()->connection();
    $QUERY00 = "SELECT C.id_crop,C.crpname ";
    $QUERY00 .= "FROM tb_variety V ";
    $QUERY00 .= "INNER JOIN tb_crop C ON V.id_crop = C.id_crop ";
    $QUERY00 .= "GROUP BY C.id_crop,C.crpname ";
    $QUERY00 .= "ORDER BY C.crpname ";
    $st = $connection->execute($QUERY00);
    $Resultado00 = $st->fetchAll();
    $OPTION = "<OPTION VALUE=''>Choose...</OPTION>";
    foreach ($Resultado00 AS $fila) {
        $titulo = $fila['crpname'];
        $valor = $fila['crpname'];
        if (strlen($valor) > 35)
            $valor = substr($valor, 0, 35) . "...";
        $selected = "";
        if ($fila['id_crop'] == $value)
            $selected = "selected";
        $OPTION .= "<OPTION TITLE='$titulo' VALUE='{$fila['id_crop']}' $selected>$valor</OPTION>";
    }
    $HTML = "<SELECT NAME='$name' id='$name' SIZE='1' $properties>";
    $HTML .= $OPTION;
    $HTML .= "</SELECT>";
    return $HTML;
}

function GetInformationTable($Table, $FieldName, $FieldId, $Value) {
    $Retorno = "";
    if ($Value != '') {
        $connection = Doctrine_Manager::getInstance()->connection();
        $QUERY = "SELECT ($FieldName) AS name ";
        $QUERY .= "FROM $Table ";
        $QUERY .= "WHERE $FieldId = $Value ";
        $st = $connection->execute($QUERY);
        $Info = $st->fetchAll(PDO::FETCH_ASSOC);
        if (count($Info) > 0) {
            $Retorno = $Info[0]['name'];
        }
    }
    return $Retorno;
}

function GetInformationTableAll($Table, $FieldId, $Value) {
    $Retorno = "";
    if ($Value != '') {
        $connection = Doctrine_Manager::getInstance()->connection();
        $QUERY = "SELECT * ";
        $QUERY .= "FROM $Table ";
        $QUERY .= "WHERE $FieldId = $Value ";
        $st = $connection->execute($QUERY);
        $Info = $st->fetchAll(PDO::FETCH_ASSOC);
        if (count($Info) > 0) {
            $Retorno = $Info;
        }
    }
    return $Retorno;
}

function GetInfoProject($id_project) {
    if ($id_project != '') {
        $connection = Doctrine_Manager::getInstance()->connection();
        $QUERY = "SELECT T.id_project AS id_project, T.prjname AS prjname, ";
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
        $QUERY .= "WHERE T.id_project = $id_project ";
        $QUERY .= "ORDER BY T.prjname ";
        $st = $connection->execute($QUERY);
        $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        $ArrInfo = $R_datos[0];
    }
    return $ArrInfo;
}

function GetInfoTrialManager($id_contactperson) {
    if ($id_contactperson != '') {
        $connection = Doctrine_Manager::getInstance()->connection();
        $QUERY = "SELECT T.id_contactperson AS id_contactperson, T.cnprfirstname AS cnprfirstname, T.cnprmiddlename AS cnprmiddlename, T.cnprlastname AS cnprlastname, T.cnpremail AS cnpremail, T.cnprtelephone AS cnprtelephone, ";
        $QUERY .= "T2.id_institution AS id_institution, T2.insname AS insname, T3.id_administrativedivision AS id_countryinstitution, T3.dmdvname AS namecountryinstitution ";
        $QUERY .= "FROM tb_contactperson T ";
        $QUERY .= "INNER JOIN tb_institution T2 ON T.id_institution = T2.id_institution ";
        $QUERY .= "INNER JOIN tb_administrativedivision T3 ON T2.id_country = T3.id_administrativedivision ";
        $QUERY .= "WHERE T.id_contactperson = $id_contactperson ";
        $QUERY .= "ORDER BY T.cnprfirstname";
        $st = $connection->execute($QUERY);
        $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        $ArrInfo = $R_datos[0];
    }
    return $ArrInfo;
}

function GetInfoRoleContactperson($id_rolecontactperson) {
    $Rolecontactperson = "";
    if ($id_rolecontactperson != '') {
        $connection = Doctrine_Manager::getInstance()->connection();
        $QUERY = "SELECT T.rcpname AS rolecontactperson ";
        $QUERY .= "FROM tb_rolecontactperson T WHERE T.id_rolecontactperson = $id_rolecontactperson ";
        $st = $connection->execute($QUERY);
        $Resultado00 = $st->fetchAll();
        foreach ($Resultado00 AS $fila) {
            $Rolecontactperson = $fila['rolecontactperson'];
        }
    }
    return $Rolecontactperson;
}

function GetInfoTrialLocation($id_triallocation) {
    if ($id_triallocation != '') {
        $connection = Doctrine_Manager::getInstance()->connection();
        $QUERY = "SELECT T.id_triallocation AS id_triallocation,T.trlcname AS trlcname,T.trlclatitude AS trlclatitude,T.trlclongitude AS trlclongitude,T.trlcaltitude AS trlcaltitude, ";
        $QUERY .= "fc_Triallocationadministrativedivision(T.id_triallocation, 1) AS country, ";
        $QUERY .= "fc_Triallocationadministrativedivision(T.id_triallocation, 2) AS district, ";
        $QUERY .= "fc_Triallocationadministrativedivision(T.id_triallocation, 3) AS subdistrict, ";
        $QUERY .= "fc_Triallocationadministrativedivision(T.id_triallocation, 4) AS village ";
        $QUERY .= "FROM tb_triallocation T ";
        $QUERY .= "WHERE T.id_triallocation = $id_triallocation ";
        $QUERY .= "ORDER BY T.trlcname";
        $st = $connection->execute($QUERY);
        $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        $ArrInfo = $R_datos[0];
    }
    return $ArrInfo;
}

function GetInfoTrialCropInfo($id_trial) {
    if ($id_trial != '') {
        $connection = Doctrine_Manager::getInstance()->connection();
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
        $ArrInfo = $TrialInfo;
    }
    return $ArrInfo;
}

function GetVariety($id_trialinfo) {
    $HTML = "";
    if ($id_trialinfo != '') {
        $connection = Doctrine_Manager::getInstance()->connection();
        $QUERY = "SELECT T2.vrtname,T2.vrtorigin,T2.vrtsynonymous,T2.id_genebank ";
        $QUERY .= "FROM tb_trialinfodata T ";
        $QUERY .= "INNER JOIN tb_variety T2 ON T.id_variety = T2.id_variety ";
        $QUERY .= "WHERE T.id_trialinfo = $id_trialinfo ";
        $QUERY .= "GROUP BY T2.vrtname,T2.vrtorigin,T2.vrtsynonymous,T2.id_genebank ";
        $st = $connection->execute($QUERY);
        $Variety = $st->fetchAll(PDO::FETCH_ASSOC);
        if (count($Variety) > 0) {
            foreach ($Variety AS $Valor) {
                $HTML .= "<tr>";
                $HTML .= "<td>{$Valor['vrtname']}</td>";
                $HTML .= "<td>{$Valor['vrtorigin']}</td>";
                $HTML .= "<td>{$Valor['vrtsynonymous']}</td>";
                $HTML .= "<td>";
                $HTML .= "</td>";
                $HTML .= "</tr>";
            }
        }
    }
    return $HTML;
}

function GetVariablesMeasured($id_trialinfo) {
    $HTML = "";
    if ($id_trialinfo != '') {
        $connection = Doctrine_Manager::getInstance()->connection();
        $QUERY = "SELECT T2.vrmsname,T3.trclname,T2.vrmsdefinition,T2.vrmsunit,T2.id_ontology ";
        $QUERY .= "FROM tb_trialinfodata T ";
        $QUERY .= "INNER JOIN tb_variablesmeasured T2 ON T.id_variablesmeasured = T2.id_variablesmeasured ";
        $QUERY .= "INNER JOIN tb_traitclass T3 ON T2.id_traitclass = T3.id_traitclass ";
        $QUERY .= "WHERE T.id_trialinfo = $id_trialinfo ";
        $QUERY .= "GROUP BY T2.vrmsname,T3.trclname,T2.vrmsdefinition,T2.vrmsunit,T2.id_ontology ";

        $st = $connection->execute($QUERY);
        $VariablesMeasured = $st->fetchAll(PDO::FETCH_ASSOC);
        if (count($VariablesMeasured) > 0) {
            foreach ($VariablesMeasured AS $Valor) {
                $HTML .= "<tr>";
                $HTML .= "<td>{$Valor['vrmsname']}</td>";
                $HTML .= "<td>{$Valor['trclname']}</td>";
                $HTML .= "<td>{$Valor['vrmsdefinition']}</td>";
                $HTML .= "<td>{$Valor['vrmsunit']}</td>";
                $HTML .= "<td>";
                if ($Valor['id_ontology'] != '')
                    $HTML .= "<span class='Span-Action-Link name='ViewVariablesMeasured' id='ViewVariablesMeasured' onclick=\"ViewVariablesMeasured('{$Valor['id_ontology']}');\" title='View'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span> View</span>";
                $HTML .= "</td>";
                $HTML .= "</tr>";
            }
        }
    }
    return $HTML;
}

function NextLetter($present = null) {
    $letter = "A";
    if ($present != null) {
        $present = strtoupper($present);
        $Len_present = strlen($present);
        $present2 = substr($present, $Len_present - 1, $Len_present);
        $Arr_Abecedario = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $pos = array_search($present2, $Arr_Abecedario) + 1;
        $letter_tmp = $Arr_Abecedario[$pos];
        if ($letter_tmp != '') {
            if ($Len_present == 1) {
                $letter = $letter_tmp;
            } else {
                $letter = substr($present, 0, $Len_present - 1) . $letter_tmp;
            }
        } else {
            if ($Len_present == 1) {
                $letter = "AA" . $letter_tmp;
            } else if ($Len_present == 2) {
                die("PRS: $present");
                $letter = Letter(substr($present, 0, $Len_present - 1)) . "A";
                die("ET: $letter");
            } else if ($Len_present == 3) {
                $letter = "AAA" . $letter_tmp;
            } else {
                $letter = Letter(substr($present, 0, $Len_present - 1)) . "A";
            }
        }
    }
    return $letter;
}

function PermissionChangeTrial($id_user, $id_trial) {
    $Return = false;
    $TbTrial = Doctrine::getTable('TbTrial')->findOneByIdTrial($id_trial);
    $id_trialgroup = $TbTrial->getIdTrialgroup();
    $sfGuardUser = Doctrine::getTable('sfGuardUser')->findOneById($id_user);
    $TbContactperson = Doctrine::getTable('TbContactperson')->findOneByCnpremail($sfGuardUser->getEmailAddress());
    $id_contactperson = $TbContactperson->getIdContactperson();

    $QUERY00 = Doctrine_Query::create()
            ->select("T.*")
            ->from("TbTrialgroupcontactperson T")
            ->where("T.id_trialgroup = $id_trialgroup")
            ->andWhere("T.id_contactperson = $id_contactperson");
    $Resultado00 = $QUERY00->execute();
    if (count($Resultado00) > 0) {
        $Return = true;
    }
    return $Return;
}

function PermissionChangeTrialGroup($id_user, $id_trialgroup) {
    $Return = false;
    $sfGuardUser = Doctrine::getTable('sfGuardUser')->findOneById($id_user);
    $TbContactperson = Doctrine::getTable('TbContactperson')->findOneByCnpremail($sfGuardUser->getEmailAddress());
    $id_contactperson = $TbContactperson->getIdContactperson();

    $QUERY00 = Doctrine_Query::create()
            ->select("T.*")
            ->from("TbTrialgroupcontactperson T")
            ->where("T.id_trialgroup = $id_trialgroup")
            ->andWhere("T.id_contactperson = $id_contactperson");
    $Resultado00 = $QUERY00->execute();
    if (count($Resultado00) > 0) {
        $Return = true;
    }
    return $Return;
}

function CheckUserPermission($id_user, $permissions) {
    $Return = false;
    if ($id_user !== '') {
        $Arr_Permission = explode(",", $permissions);
        $SfGuardUserPermission = Doctrine::getTable('SfGuardUserPermission')->findByUserId($id_user);
        foreach ($SfGuardUserPermission AS $Permission) {
            foreach ($Arr_Permission AS $id_permission) {
                if ($Permission->permission_id == $id_permission) {
                    $Return = true;
                    break;
                }
            }
        }
    }
    return $Return;
}

function CheckedOption($trltrialpermissions, $valor) {
    $CheckedOption = "";
    if ($trltrialpermissions == $valor)
        $CheckedOption = "checked='checked'";
    return $CheckedOption;
}

function DirectoryFiles($DirUploads) {
    if (!is_dir($DirUploads)) {
        mkdir($DirUploads, 0777);
    }
}

function SaveTrialData($id_trialinfo, $UrlTemplate, $id_user, $id_crop) {

    set_time_limit(90000000);
    $connection = Doctrine_Manager::getInstance()->connection();
    $ExcelFile = new Spreadsheet_Excel_Reader();
    $ExcelFile->setOutputEncoding('UTF-8');
    $ExcelFile->read($UrlTemplate);
    error_reporting(E_ALL ^ E_NOTICE);
    $numRows = $ExcelFile->sheets[0]['numRows'];
    $numCols = $ExcelFile->sheets[0]['numCols'];

//AQUI CAPTURAMOS LAS VARIABLES MEDIDAS
    $Arr_variablesmeasured_id = null;
    for ($col = 3; $col <= $numCols; $col++) {
        $Vrmsname = $ExcelFile->sheets[0]['cells'][1][$col];
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

//print_r($Arr_variablesmeasured_id);
//AQUI CAPTURAMOS LAS VARIEDADES
    $Arr_variety_id = null;
    for ($row = 2; $row <= $numRows; ++$row) {
        $Vrtname = $ExcelFile->sheets[0]['cells'][$row][2];
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
    for ($row = 2; $row <= $numRows; ++$row) {
        $trnfdtreplication = "";
        $id_variety = "";
        $id_variablesmeasured = "";
        $trnfdtvalue = "";
        $trnfdtreplication = $ExcelFile->sheets[0]['cells'][$row][1];
        $id_variety = $Arr_variety_id[$row];
        for ($col = 3; $col <= $numCols; $col++) {
            $id_variablesmeasured = $Arr_variablesmeasured_id[$col];
            $trnfdtvalue = $ExcelFile->sheets[0]['cells'][$row][$col];
            $trnfdtvalue = mb_convert_encoding($trnfdtvalue, 'UTF-8');
            if (($id_trialinfo != '') && ($trnfdtreplication != '') && ($id_variety != '') && ($id_variablesmeasured != '') && ($trnfdtvalue != '')) {
                TbTrialinfodataTable::addTrialinfodata($id_trialinfo, $trnfdtreplication, $id_variety, $id_variablesmeasured, $trnfdtvalue);
            }
        }
    }
}

function GetIdAdministrativedivision($Name, $Type) {
    $IdAdministrativedivision = "";
    if (($Name != '') && ($Type != '')) {
        $connection = Doctrine_Manager::getInstance()->connection();
        $IdAdministrativedivision = "";
        $QUERY00 = "SELECT id_administrativedivision FROM tb_administrativedivision WHERE dmdvname = '$Name' AND id_administrativedivisiontype = $Type";
        $st = $connection->execute($QUERY00);
        $Result = $st->fetchAll();
        if (count($Result) > 0) {
            foreach ($Result AS $Value) {
                $IdAdministrativedivision = $Value['id_administrativedivision'];
                break;
            }
        }
    }
    return $IdAdministrativedivision;
}

function GetPermissionsUser($id_user) {
    $Permissions = "";
    $SfGuardUserPermission = Doctrine::getTable('SfGuardUserPermission')->findByUserId($id_user);
    foreach ($SfGuardUserPermission AS $Permission) {
        $SfGuardPermission = Doctrine::getTable('SfGuardPermission')->findOneById($Permission->permission_id);
        $Permissions .= $SfGuardPermission->getName() . " - ";
    }
    $Permissions = substr($Permissions, 0, strlen($Permissions) - 2);
    return $Permissions;
}

function GetGroupsUser($id_user) {
    $Groups = "";
    $SfGuardUserGroup = Doctrine::getTable('SfGuardUserGroup')->findByUserId($id_user);
    foreach ($SfGuardUserGroup AS $Group) {
        $SfGuardGroup = Doctrine::getTable('SfGuardGroup')->findOneById($Group->group_id);
        $Groups .= $SfGuardGroup->getName() . " - ";
    }
    $Groups = substr($Groups, 0, strlen($Groups) - 2);
    return $Groups;
}

function QuitarAcentos($cadena) {
    $no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
    $permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
    $texto = str_replace($no_permitidas, $permitidas, $cadena);
    return $texto;
}

function ValidaFecha($Fecha) {
    $ArrFecha = explode("-", $Fecha);
    $aaaa = $ArrFecha[0];
    $mm = $ArrFecha[1];
    $dd = $ArrFecha[2];
    if (@checkdate($mm, $dd, $aaaa)) {
        return true;
    } else {
        return false;
    }
}

function GenerateCode($lenght = 6) {
    $cadena = "[^A-Z0-9]";
    $code = substr(@eregi_replace($cadena, "", md5(rand())) . @eregi_replace($cadena, "", md5(rand())) . @eregi_replace($cadena, "", md5(rand())), 0, $lenght);
    return $code;
}

function rrmdir($dir) {
    foreach (glob($dir . '/*') as $file) {
        if (is_dir($file))
            rrmdir($file);
        else
            unlink($file);
    }
}

function CutString($String, $Length) {
    $VarLength = strlen($String);
    $VarCutted = "";
    if ($VarLength > $Length)
        $VarCutted = substr($String, 0, $Length) . "...";
    else
        $VarCutted = $String;
    return $VarCutted;
}

function UploadTrialProjectTemplate($File, $id_user) {
//PARAMETROS
    $Modulo = "Project";
    $Cols = 8;
    $MaxRecordsFile = 10000;
    $MaxSizeFile = 5; // ESTE VALOR ES EN MB

    $connection = Doctrine_Manager::getInstance()->connection();
    ini_set("memory_limit", "2048M");
    set_time_limit(900000000000);
    $UploadDir = sfConfig::get("sf_upload_dir");
    $uploadstrialgroup = $UploadDir . "/fileproject";
    if (!is_dir($uploadstrialgroup)) {
        mkdir($uploadstrialgroup, 0777);
    }

    //ARCHIVO
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

        if (is_file("$uploadstrialgroup"))
            unlink("$uploadstrialgroup");

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

function UploadTrialLocationTemplate($File, $id_user) {
//PARAMETROS
    $Modulo = "Trial location";
    $Cols = 8;
    $MaxRecordsFile = 10000;
    $MaxSizeFile = 5; // ESTE VALOR ES EN MB

    $connection = Doctrine_Manager::getInstance()->connection();
    ini_set("memory_limit", "2048M");
    set_time_limit(900000000000);
    $UploadDir = sfConfig::get("sf_upload_dir");
    $uploadstriallocation = $UploadDir . "/filetriallocation";
    if (!is_dir($uploadstriallocation)) {
        mkdir($uploadstriallocation, 0777);
    }

    //ARCHIVO
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

        if (is_file("$uploadstriallocation"))
            unlink("$uploadstriallocation");

        move_uploaded_file($FileTmpName, "$uploadstriallocation/$FileName");
        $inputFileName = "$uploadstriallocation/$FileName";

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
            $trlcname = trim($ArrayRow['A']);
            $trlclatitude = trim($ArrayRow['B']);
            $trlclongitude = trim($ArrayRow['C']);
            $trlcaltitude = trim($ArrayRow['D']);
            $Country = trim($ArrayRow['E']);
            $DistrictSatate = trim($ArrayRow['F']);
            $SubdistrictDivision = trim($ArrayRow['G']);
            $Village = trim($ArrayRow['H']);

            $Fields = '{"' . $trlcname . '","' . $trlclatitude . '","' . $trlclongitude . '","' . $trlcaltitude . '","' . $Country . '","' . $DistrictSatate . '","' . $SubdistrictDivision . '","' . $Village . '"}';

            $Fields = str_replace("'", "''", $Fields);
            $Fields = utf8_encode($Fields);
            $QUERY = "SELECT fc_checkfieldsbatchtriallocation('$Fields'::text[]) AS info;";
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
                $trlcname = utf8_encode($trlcname);
                $id_triallocation = TbTriallocationTable::addTriallocation($trlcname, $trlclatitude, $trlclongitude, $trlcaltitude);
                if ($id_triallocation != '' && $Country != '') {
                    $id_countrytriallocation = GetIdAdministrativedivision($Country, 1);
                    TbTriallocationadministrativedivisionTable::addTriallocationadministrativedivision($id_triallocation, $id_countrytriallocation);
                }
                if ($id_triallocation != '' && $DistrictSatate != '') {
                    $id_districttriallocation = GetIdAdministrativedivision($DistrictSatate, 2);
                    TbTriallocationadministrativedivisionTable::addTriallocationadministrativedivision($id_triallocation, $id_districttriallocation);
                }
                if ($id_triallocation != '' && $SubdistrictDivision != '') {
                    $id_subdistricttriallocation = GetIdAdministrativedivision($SubdistrictDivision, 3);
                    TbTriallocationadministrativedivisionTable::addTriallocationadministrativedivision($id_triallocation, $id_subdistricttriallocation);
                }
                if ($id_triallocation != '' && $Village != '') {
                    $id_villagetriallocation = GetIdAdministrativedivision($Village, 4);
                    TbTriallocationadministrativedivisionTable::addTriallocationadministrativedivision($id_triallocation, $id_villagetriallocation);
                }
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

function UploadTrialVarietiesTemplate($File, $id_user) {
    //PARAMETROS
    $Modulo = "Variety";
    $Cols = 5;
    $MaxRecordsFile = 10000;
    $MaxSizeFile = 5; // ESTE VALOR ES EN MB

    $connection = Doctrine_Manager::getInstance()->connection();
    ini_set("memory_limit", "2048M");
    set_time_limit(900000000000);
    $UploadDir = sfConfig::get("sf_upload_dir");
    $uploadsvariety = $UploadDir . "/filevariety";
    if (!is_dir($uploadsvariety)) {
        mkdir($uploadsvariety, 0777);
    }

    //ARCHIVO
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

        if (is_file("$uploadsvariety"))
            unlink("$uploadsvariety");

        move_uploaded_file($FileTmpName, "$uploadsvariety/$FileName");
        $inputFileName = "$uploadsvariety/$FileName";


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
            $id_crop = trim($ArrayRow['A']);
            $vrtorigin = trim($ArrayRow['B']);
            $vrtname = trim($ArrayRow['C']);
            $vrtsynonymous = trim($ArrayRow['D']);
            $vrtdescription = trim($ArrayRow['E']);

            $Fields = '{"' . $id_crop . '","' . $vrtorigin . '","' . $vrtname . '","' . $vrtsynonymous . '","' . $vrtdescription . '"}';

            $Fields = str_replace("'", "''", $Fields);
            $Fields = utf8_encode($Fields);
            $QUERY = "SELECT fc_checkfieldsbatchvariety('$Fields'::text[]) AS info;";
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
                $vrtorigin = utf8_encode($vrtorigin);
                $vrtname = utf8_encode($vrtname);
                $vrtsynonymous = utf8_encode($vrtsynonymous);
                $vrtdescription = utf8_encode($vrtdescription);
                TbVarietyTable::addVariety($id_crop, $vrtorigin, $vrtname, $vrtsynonymous, $vrtdescription, $id_user);
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

function UploadTrialVariablesMeasuredTemplate($File, $id_user) {

    //PARAMETROS
    $Modulo = "Variables measured";
    $Cols = 7;
    $MaxRecordsFile = 10000;
    $MaxSizeFile = 5; // ESTE VALOR ES EN MB

    $connection = Doctrine_Manager::getInstance()->connection();
    ini_set("memory_limit", "2048M");
    set_time_limit(900000000000);
    $UploadDir = sfConfig::get("sf_upload_dir");
    $uploadsvariablesmeasured = $UploadDir . "/filevariablesmeasured";
    if (!is_dir($uploadsvariablesmeasured)) {
        mkdir($uploadsvariablesmeasured, 0777);
    }

    //ARCHIVO
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

        if (is_file("$uploadsvariablesmeasured"))
            unlink("$uploadsvariablesmeasured");

        move_uploaded_file($FileTmpName, "$uploadsvariablesmeasured/$FileName");
        $inputFileName = "$uploadsvariablesmeasured/$FileName";


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
            $id_crop = trim($ArrayRow['A']);
            $id_traitclass = trim($ArrayRow['B']);
            $vrmsname = trim($ArrayRow['C']);
            $vrmsshortname = trim($ArrayRow['D']);
            $vrmsdefinition = trim($ArrayRow['E']);
            $vrmnmethod = trim($ArrayRow['F']);
            $vrmsunit = trim($ArrayRow['G']);

            $Fields = '{"' . $id_crop . '","' . $id_traitclass . '","' . $vrmsname . '","' . $vrmsshortname . '","' . $vrmsdefinition . '","' . $vrmnmethod . '","' . $vrmsunit . '"}';

            $Fields = str_replace("'", "''", $Fields);
            $Fields = utf8_encode($Fields);
            $QUERY = "SELECT fc_checkfieldsbatchvariablesmeasured('$Fields'::text[]) AS info;";
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
                $vrmsname = utf8_encode($vrmsname);
                $vrmsshortname = utf8_encode($vrmsshortname);
                $vrmsdefinition = utf8_encode($vrmsdefinition);
                $vrmnmethod = utf8_encode($vrmnmethod);
                $vrmsunit = utf8_encode($vrmsunit);
                TbVariablesmeasuredTable::addVariablesmeasured($id_crop, $id_traitclass, $vrmsname, $vrmsshortname, $vrmsdefinition, $vrmnmethod, $vrmsunit, $id_user);
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

function SortDataArrayAutocomplete($a, $b) {
    return strtotime($a['label']) - strtotime($b['label']);
}

function MessageNotice() {
    $Notice = sfContext::getInstance()->getUser()->getAttribute('Notice');
    sfContext::getInstance()->getUser()->setAttribute('Notice', "");
    return $Notice;
}

function FieldHelp($IdHelp) {
    $HTMLHelp = "";
    $connection = Doctrine_Manager::getInstance()->connection();
    $QUERY00 = "SELECT 'Help'||T.flhlmodule||T.id_fieldhelp AS idhelp,T.flhltexthelp AS texthelp ";
    $QUERY00 .= "FROM tb_fieldhelp T ";
    $QUERY00 .= "WHERE ('Help'||T.flhlmodule||T.id_fieldhelp) = '$IdHelp' ";
    $QUERY00 .= "AND T.flhltexthelp IS NOT NULL ";

    $st = $connection->execute($QUERY00);
    $Resultado00 = $st->fetchAll();
    foreach ($Resultado00 AS $fila) {
        $idhelp = $fila['idhelp'];
        $texthelp = $fila['texthelp'];
    }
    if ($texthelp != '') {
        $HTMLHelp = "&ensp;<span id='$idhelp' class='glyphicon glyphicon-question-sign'/>";
    }

    return $HTMLHelp;
}

function ModuleHelp($Module) {
    $HTMLHelp = "";
    $connection = Doctrine_Manager::getInstance()->connection();
    $QUERY00 = "SELECT T.mdhltexthelp AS texthelp ";
    $QUERY00 .= "FROM tb_modulehelp T ";
    $QUERY00 .= "WHERE T.mdhlmodule = '$Module' ";
    $st = $connection->execute($QUERY00);
    $Resultado00 = $st->fetchAll();
    foreach ($Resultado00 AS $fila) {
        $texthelp = $fila['texthelp'];
    }
    if ($texthelp != '') {

        $HTMLHelp = '<div class="alert alert-info alert-dismissible fade in" role="alert">';
        $HTMLHelp .= '<span style="font-size: 1.7em;color: #8a8a8a;" class="glyphicon glyphicon-info-sign pull-left">&ensp;</span>';
        $HTMLHelp .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $HTMLHelp .= '<span aria-hidden="true">&times;</span>';
        $HTMLHelp .= '</button>';
        $HTMLHelp .= '<a class="btn btn-sm btn-success pull-right" href="javascript:void(0);" onclick="startIntro();">Guided Tour</a>';

        $HTMLHelp .= $texthelp;


        $HTMLHelp .= '<div class="clearfix"></div>';
        $HTMLHelp .= '</div>';
    }

    return $HTMLHelp;
}

function CheckAPI($key) {
    $key = trim($key);
    $user_id = "";
    if ($key != "") {
        $QUERY00 = Doctrine_Query::create()
                ->from("SfGuardUserInformation UI")
                ->where("UI.key = '$key'");

        $Resultado00 = $QUERY00->execute();
        foreach ($Resultado00 AS $fila) {
            $user_id = $fila['user_id'];
        }
    }

    return $user_id;
}

?>
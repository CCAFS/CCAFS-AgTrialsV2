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
class homeActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $connection = Doctrine_Manager::getInstance()->connection();

        //REALIZAMOS LA CONSULTA DE LOS ULTIMOS TRIALS
        $QUERY = "SELECT T.id_trial AS id, T.trltrialname AS name, T.created_at AS date, TL.trlcname AS location ";
        $QUERY .= "FROM tb_trial T INNER JOIN tb_trialinfo TI ON T.id_trial = TI.id_trial ";
        $QUERY .= "INNER JOIN tb_triallocation TL ON T.id_triallocation = TL.id_triallocation ";
        $QUERY .= "ORDER BY T.created_at DESC LIMIT 4 ";

        $st = $connection->execute($QUERY);
        $Resultado = $st->fetchAll();
        $a = 1;
        foreach ($Resultado AS $Trial) {
            $Trials[$a]['id'] = $Trial['id'];
            $Trials[$a]['name'] = $Trial['name'];
            $Trials[$a]['date'] = $Trial['date'];
            $Trials[$a]['location'] = $Trial['location'];
            $a++;
        }
        $this->Trials = $Trials;
    }

    public function executeAbout(sfWebRequest $request) {
        
    }

    public function executeStatistics(sfWebRequest $request) {
        
    }

    public function executeContact(sfWebRequest $request) {
        
    }

    public function executeRegister(sfWebRequest $request) {
        $emailaddress = $request->getParameter('emailaddress');
        $firstname = $request->getParameter('firstname');
        $lastname = $request->getParameter('lastname');
        $institution = $request->getParameter('id_institution');
        $country = $request->getParameter('id_country');
        $city = $request->getParameter('city');
        $state = $request->getParameter('state');
        $address = $request->getParameter('address');
        $telephone = $request->getParameter('telephone');
        $motivation = $request->getParameter('motivation');
        $securitycode = trim($request->getParameter('securitycode'));
        $code = trim($request->getParameter('code'));

        if ($securitycode == $code) {
            $key = strtoupper(GenerateCode(15));
            $part_lastname = explode(" ", $lastname);
            $username = strtolower(substr($firstname, 0, 1) . QuitarAcentos($part_lastname[0]));

            if (($firstname != '') && ($lastname != '') && ($emailaddress != '') && ($username != '') && ($motivation != '') && ($code != '')) {
                $password = @GenerateCode(6);

                for ($a = 1; $a <= 20; $a++) {
                    $GuardUser = Doctrine::getTable('sfGuardUser')->findOneByUsername($username);
                    if (count($GuardUser) <= 1) {
                        break;
                    }
                    $username = $username . $a;
                }
                //die("$username *** $firstname *** $lastname *** $emailaddress *** $password");
                //INFORMACION BASICA
                $sfGuardUser = new sfGuardUser();
                $sfGuardUser->setFirstName($firstname);
                $sfGuardUser->setLastName($lastname);
                $sfGuardUser->setEmailAddress($emailaddress);
                $sfGuardUser->setUsername($username);
                $sfGuardUser->setIsActive(false);
                $sfGuardUser->save();
                //PERMISOS
                $iduser = $sfGuardUser->getId();
                $sfGuardUserPermission = new sfGuardUserPermission();
                $sfGuardUserPermission->setUserId($iduser);
                $sfGuardUserPermission->setPermissionId(2); // Permiso general
                $sfGuardUserPermission->save();

                //GRUPOS
                $sfGuardUserGroup = new sfGuardUserGroup();
                $sfGuardUserGroup->setUserId($iduser);
                $sfGuardUserGroup->setGroupId(1); // Grupo General
                $sfGuardUserGroup->save();

                //INFORMACION COMPLEMENTARIA
                $sfGuardUserInformation = new SfGuardUserInformation();
                $sfGuardUserInformation->setUserId($iduser);
                if ($institution != '')
                    $sfGuardUserInformation->setIdInstitution($institution);
                $sfGuardUserInformation->setIdCountry($country);
                $sfGuardUserInformation->setCity($city);
                if ($state != '')
                    $sfGuardUserInformation->setState($state);
                $sfGuardUserInformation->setAddress($address);
                $sfGuardUserInformation->setTelephone($telephone);
                $sfGuardUserInformation->setMotivation($motivation);
                $sfGuardUserInformation->setKey($key);
                $sfGuardUserInformation->setCreatedAt(date("Y-m-d") . " " . date("H:i:s"));
                $sfGuardUserInformation->setUpdatedAt(date("Y-m-d") . " " . date("H:i:s"));
                $sfGuardUserInformation->setVisits(0);
                $sfGuardUserInformation->save();

                if ($institution != '') {
                    $TbInstitution = Doctrine::getTable('TbInstitution')->findOneByIdInstitution($institution);
                    $NameInstitution = $TbInstitution->getInsname();
                }
                if ($country != '') {
                    $TbAdministrativedivision = Doctrine::getTable('TbAdministrativedivision')->findOneByIdAdministrativedivision($country);
                    $NameCountry = $TbAdministrativedivision->getDmdvname();
                }

                //ENVIO DE CORREO AL USUARIO QUE SE REGISTRO
                if ($emailaddress != '') {
                    $sent = date("d-M-Y") . " " . date("h:i:s");
                    $destinatario = trim($emailaddress);
                    $asunto = "Account Notification";
                    $cuerpo = "<html>";
                    $cuerpo .= "<body>";
                    $cuerpo .= "<h1>Welcome to AgTrilas!</h1>";
                    $cuerpo .= "<p>";
                    $cuerpo .= "<br><b>Thank you for Register, Your account will be activated soon.</b><br><br>";
                    $cuerpo .= "<a href='http://www.agtrials.org' target='blank'>www.agtrials.org</a><br><br>";
                    $cuerpo .= "</p>";
                    $cuerpo .= "<br><br><b>Sent:</b> $sent ";
                    $cuerpo .= "</body>";
                    $cuerpo .= "</html>";

                    $SendPHPMailer = SendPHPMailer();
                    $SendPHPMailer->AddAddress($destinatario);
                    $SendPHPMailer->Subject = $asunto;
                    $SendPHPMailer->Body = $cuerpo;
                    $SendPHPMailer->Send();
                }
                $this->Notice = "Thank you for Register, Your account will be activated soon. Information sent at email: $destinatario";


                //ENVIA CORREO A LAS PERSONAS QUE HABILITAN
                $sent = date("d-M-Y") . " " . date("h:i:s");
                $asunto = "Activation New User";
                $cuerpo = "<html>";
                $cuerpo .= "<head>";
                $cuerpo .= "<title>Activation New User</title>";
                $cuerpo .= "</head>";
                $cuerpo .= "<body>";
                $cuerpo .= "<h1>Activation New User</h1>";
                $cuerpo .= "<p>";
                $cuerpo .= "<b>Username: </b>$username<br>";
                $cuerpo .= "<b>Name: </b>$firstname $lastname<br>";
                $cuerpo .= "<b>Email address: </b>$emailaddress<br>";
                $cuerpo .= "<b>Institution: </b>$NameInstitution<br>";
                $cuerpo .= "<b>Country: </b>$NameCountry<br>";
                $cuerpo .= "<b>City: </b>$city<br>";
                $cuerpo .= "<b>State: </b>$state<br>";
                $cuerpo .= "<b>Address: </b>$address<br>";
                $cuerpo .= "<b>Telephone: </b>$telephone<br>";
                $cuerpo .= "<b>Motivation: </b>$motivation<br><br>";
                $cuerpo .= "<b>Security Code: </b>$code<br><br>";
                $cuerpo .= "<a href='http://www.agtrials.org/guard/users/" . $iduser . "/edit#sf_fieldset_permissions_and_groups' target='blank'><b>Go to activate</b></a><br><br>";
                $cuerpo .= "</p>";
                $cuerpo .= "<b>Sent:</b> $sent ";
                $cuerpo .= "</body>";
                $cuerpo .= "</html>";

                $SendPHPMailer = SendPHPMailer();
                $SendPHPMailer->AddAddress("herlin25@gmail.com");
                //$SendPHPMailer->AddAddress("g.hyman@cgiar.org");
                //$SendPHPMailer->AddAddress("andrewfarrow72@gmail.com");
                $SendPHPMailer->AddAddress("h.r.espinosa@cgiar.org");
                $SendPHPMailer->Subject = $asunto;
                $SendPHPMailer->Body = $cuerpo;
                $SendPHPMailer->Send();
            }
        }
    }

    public function executeMapindex(sfWebRequest $request) {
        $this->setLayout(false);
    }

    public function executeValidacorreo(sfWebRequest $request) {
        $emailaddress = $request->getParameter('emailaddress');
        $emailaddress = strtolower(trim($emailaddress));
        $sfGuardUser = Doctrine::getTable('sfGuardUser')->findOneByEmailAddress($emailaddress);
        if (count($sfGuardUser) > 1) {
            echo "Email address $emailaddress already exist!";
        } else {
            echo "";
        }
        die();
    }

    public function executeRefreshcode(sfWebRequest $request) {
        die(@GenerateCode(6));
    }

}

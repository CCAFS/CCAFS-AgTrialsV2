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


require_once dirname(__FILE__) . '/../lib/contactpersonGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/contactpersonGeneratorHelper.class.php';
require_once '../lib/functions/function.php';

/**
 * contactperson actions.
 *
 * @package    AgTrials
 * @subpackage contactperson
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contactpersonActions extends autoContactpersonActions {

    public function executeDelete(sfWebRequest $request) {

        //VERIFICAMOS LOS PERMISOS DE MODIFICACION
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_contactperson = $request->getParameter("id_contactperson");
        $Query00 = Doctrine::getTable('TbContactperson')->findOneByIdContactperson($id_contactperson);
        $id_user_registro = $Query00->getIdUser();
        $user = $this->getUser();

        //VERIFICA SI ES EL USUARIO CREADOR Ó TIENE PERMISOS DE ADMIN(1)
        if (!($id_user == $id_user_registro || (CheckUserPermission($id_user, "1")))) {
            $this->getUser()->setAttribute('Notice', "<b>Error: </b>Not have permission to Delete!");
            $this->redirect('@tb_contactperson');
        } else {
            $request->checkCSRFProtection();
            $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
            if ($this->getRoute()->getObject()->delete()) {
                $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
            }
            $this->redirect('@tb_contactperson');
        }
    }

    public function executeEdit(sfWebRequest $request) {
        $this->contactperson = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->contactperson);

        //VERIFICAMOS LOS PERMISOS DE MODIFICACION
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_contactperson = $request->getParameter("id_contactperson");
        $Query00 = Doctrine::getTable('TbContactperson')->findOneByIdContactperson($id_contactperson);
        $id_user_registro = $Query00->getIdUser();
        $user = $this->getUser();

        //VERIFICA SI ES EL USUARIO CREADOR Ó TIENE PERMISOS DE ADMIN(1)
        if (!($id_user == $id_user_registro || (CheckUserPermission($id_user, "1")))) {
            $this->getUser()->setAttribute('Notice', "<b>Error: </b>Not have permission to Edit!");
            $this->redirect('@tb_contactperson');
        }
    }

    public function executeAutocompletecontactperson(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $term = $request->getParameter('term');
        $QUERY = "SELECT T.id_contactperson AS value, T.cnprfirstname AS label, T.cnprmiddlename AS cnprmiddlename, T.cnprlastname AS cnprlastname, T.cnpremail AS cnpremail, T.cnprtelephone AS cnprtelephone, ";
        $QUERY .= "T2.id_institution AS id_institution, T2.insname AS insname, T3.id_administrativedivision AS id_countryinstitution, T3.dmdvname AS namecountryinstitution ";
        $QUERY .= "FROM tb_contactperson T ";
        $QUERY .= "INNER JOIN tb_institution T2 ON T.id_institution = T2.id_institution ";
        $QUERY .= "INNER JOIN tb_administrativedivision T3 ON T2.id_country = T3.id_administrativedivision ";
        $QUERY .= "WHERE UPPER(T.cnprfirstname) LIKE UPPER('$term%') ";
        $QUERY .= "ORDER BY T.cnprfirstname";
        $st = $connection->execute($QUERY);
        $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        return $this->renderText(json_encode($R_datos));
    }

    public function executeAutocompletesearhcontactperson(sfWebRequest $request) {
        $SearchWhere = sfContext::getInstance()->getUser()->getAttribute('SearchWhere');
        $Where = "";
        foreach ($SearchWhere AS $value) {
            $Where .= $value;
        }
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $term = $request->getParameter('term');
        $QUERY = "SELECT CP.id_contactperson AS value, fc_completename(CP.cnprfirstname,CP.cnprmiddlename,CP.cnprlastname) AS label ";
        $QUERY .= "FROM tb_contactperson CP ";
        $QUERY .= "INNER JOIN tb_trial T ON CP.id_contactperson = T.id_contactperson ";
        $QUERY .= "INNER JOIN tb_trialinfo TI ON T.id_trial = TI.id_trial ";
        $QUERY .= "WHERE fc_completename(CP.cnprfirstname,CP.cnprmiddlename,CP.cnprlastname) ILIKE ('%$term%') ";
        $QUERY .= "$Where ";
        $QUERY .= "GROUP BY CP.id_contactperson,CP.cnprfirstname,CP.cnprmiddlename,CP.cnprlastname ";
        $QUERY .= "ORDER BY 2";
        $st = $connection->execute($QUERY);
        $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        return $this->renderText(json_encode($R_datos));
    }

}

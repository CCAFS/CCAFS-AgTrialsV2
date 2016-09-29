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

require_once dirname(__FILE__) . '/../lib/donorGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/donorGeneratorHelper.class.php';
require_once '../lib/functions/function.php';

/**
 * donor actions.
 *
 * @package    AgTrials
 * @subpackage donor
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class donorActions extends autoDonorActions {

    public function executeDelete(sfWebRequest $request) {

        //VERIFICAMOS LOS PERMISOS DE MODIFICACION
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_donor = $request->getParameter("id_donor");
        $Query00 = Doctrine::getTable('TbDonor')->findOneByIdDonor($id_donor);
        $id_user_registro = $Query00->getIdUser();

        //VERIFICA SI ES EL USUARIO CREADOR Ó TIENE PERMISOS DE ADMIN(1)
        if (!($id_user == $id_user_registro || (CheckUserPermission($id_user, "1")))) {
            $this->getUser()->setAttribute('Notice', "<b>Error: </b>Not have permission to Delete!");
            $this->redirect('@tb_donor');
        } else {
            $request->checkCSRFProtection();
            $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
            if ($this->getRoute()->getObject()->delete()) {
                $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
            }
            $this->redirect('@tb_donor');
        }
    }

    public function executeEdit(sfWebRequest $request) {
        $this->donor = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->donor);

        //VERIFICAMOS LOS PERMISOS DE MODIFICACION
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_donor = $request->getParameter("id_donor");
        $Query00 = Doctrine::getTable('TbDonor')->findOneByIdDonor($id_donor);
        $id_user_registro = $Query00->getIdUser();

        //VERIFICA SI ES EL USUARIO CREADOR Ó TIENE PERMISOS DE ADMIN(1)
        if (!($id_user == $id_user_registro || (CheckUserPermission($id_user, "1")))) {
            $this->getUser()->setAttribute('Notice', "<b>Error: </b>Not have permission to Edit!");
            $this->redirect('@tb_donor');
        }
    }

    public function executeAutocompletedonor(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $term = $request->getParameter('term');
        $QUERY = "SELECT T.id_donor AS value, T.dnrname AS label ";
        $QUERY .= "FROM tb_donor T ";
        $QUERY .= "WHERE UPPER(T.dnrname) LIKE UPPER('$term%') ";
        $QUERY .= "ORDER BY T.dnrname";
        $st = $connection->execute($QUERY);
        $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        return $this->renderText(json_encode($R_datos));
    }

}

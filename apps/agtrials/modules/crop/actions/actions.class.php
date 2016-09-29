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

require_once dirname(__FILE__) . '/../lib/cropGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/cropGeneratorHelper.class.php';
require_once '../lib/functions/function.php';

/**
 * crop actions.
 *
 * @package    AgTrials
 * @subpackage crop
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cropActions extends autoCropActions {

    public function executeDelete(sfWebRequest $request) {

        //VERIFICAMOS LOS PERMISOS DE MODIFICACION
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_crop = $request->getParameter("id_crop");
        $Query00 = Doctrine::getTable('TbCrop')->findOneByIdCrop($id_crop);
        $id_user_registro = $Query00->getIdUser();

        //VERIFICA SI ES EL USUARIO CREADOR Ó TIENE PERMISOS DE ADMIN(1)
        if (!($id_user == $id_user_registro || (CheckUserPermission($id_user, "1")))) {
            $this->getUser()->setAttribute('Notice', "<b>Error: </b>Not have permission to Delete!");
            $this->redirect('@tb_crop');
        } else {
            $request->checkCSRFProtection();
            $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
            if ($this->getRoute()->getObject()->delete()) {
                $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
            }
            $this->redirect('@tb_crop');
        }
    }

    public function executeEdit(sfWebRequest $request) {
        $this->crop = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->crop);

        //VERIFICAMOS LOS PERMISOS DE MODIFICACION
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_crop = $request->getParameter("id_crop");
        $Query00 = Doctrine::getTable('TbCrop')->findOneByIdCrop($id_crop);
        $id_user_registro = $Query00->getIdUser();

        //VERIFICA SI ES EL USUARIO CREADOR Ó TIENE PERMISOS DE ADMIN(1)
        if (!($id_user == $id_user_registro || (CheckUserPermission($id_user, "1")))) {
            $this->getUser()->setAttribute('Notice', "<b>Error: </b>Not have permission to Edit!");
            $this->redirect('@tb_crop');
        }
    }

    public function executeAutocompletesearhcrop(sfWebRequest $request) {
        $SearchWhere = sfContext::getInstance()->getUser()->getAttribute('SearchWhere');
        $Where = "";
        foreach ($SearchWhere AS $value) {
            $Where .= $value;
        }
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $term = $request->getParameter('term');
        $QUERY = "SELECT C.id_crop AS value, C.crpname AS label ";
        $QUERY .= "FROM tb_trial T ";
        $QUERY .= "INNER JOIN tb_trialinfo TI ON T.id_trial = TI.id_trial ";
        $QUERY .= "INNER JOIN tb_crop C ON TI.id_crop = C.id_crop ";
        $QUERY .= "WHERE C.crpname ILIKE ('$term%') ";
        $QUERY .= "$Where ";
        $QUERY .= "GROUP BY C.id_crop,C.crpname ";
        $QUERY .= "ORDER BY C.crpname";
        $st = $connection->execute($QUERY);
        $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        return $this->renderText(json_encode($R_datos));
    }

}

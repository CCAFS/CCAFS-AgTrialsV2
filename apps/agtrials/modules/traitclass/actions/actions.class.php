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

require_once dirname(__FILE__) . '/../lib/traitclassGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/traitclassGeneratorHelper.class.php';
require_once '../lib/functions/function.php';

/**
 * traitclass actions.
 *
 * @package    AgTrials
 * @subpackage traitclass
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class traitclassActions extends autoTraitclassActions {

    public function executeDelete(sfWebRequest $request) {

        //VERIFICAMOS LOS PERMISOS DE MODIFICACION
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_traitclass = $request->getParameter("id_traitclass");
        $Query00 = Doctrine::getTable('TbTraitclass')->findOneByIdTraitclass($id_traitclass);
        $id_user_registro = $Query00->getIdUser();

        //VERIFICA SI ES EL USUARIO CREADOR Ó TIENE PERMISOS DE ADMIN(1)
        if (!($id_user == $id_user_registro || (CheckUserPermission($id_user, "1")))) {
            $this->getUser()->setAttribute('Notice', "<b>Error: </b>Not have permission to Delete!");
            $this->redirect('@tb_traitclass');
        } else {
            $request->checkCSRFProtection();
            $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
            if ($this->getRoute()->getObject()->delete()) {
                $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
            }
            $this->redirect('@tb_traitclass');
        }
    }

    public function executeEdit(sfWebRequest $request) {
        $this->traitclass = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->traitclass);

        //VERIFICAMOS LOS PERMISOS DE MODIFICACION
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_traitclass = $request->getParameter("id_traitclass");
        $Query00 = Doctrine::getTable('TbTraitclass')->findOneByIdTraitclass($id_traitclass);
        $id_user_registro = $Query00->getIdUser();

        //VERIFICA SI ES EL USUARIO CREADOR Ó TIENE PERMISOS DE ADMIN(1)
        if (!($id_user == $id_user_registro || (CheckUserPermission($id_user, "1")))) {
            $this->getUser()->setAttribute('Notice', "<b>Error: </b>Not have permission to Edit!");
            $this->redirect('@tb_traitclass');
        }
    }

}

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

require_once dirname(__FILE__) . '/../lib/administrativedivisionGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/administrativedivisionGeneratorHelper.class.php';

/**
 * administrativedivision actions.
 *
 * @package    AgTrials
 * @subpackage administrativedivision
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class administrativedivisionActions extends autoAdministrativedivisionActions {

    public function executeAutocompletecountry(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $term = $request->getParameter('term');
        $QUERY = "SELECT T.id_administrativedivision AS value, T.dmdvname AS label ";
        $QUERY .= "FROM tb_administrativedivision T ";
        $QUERY .= "WHERE UPPER(T.dmdvname) LIKE UPPER('$term%') ";
        $QUERY .= "AND T.id_administrativedivisiontype = 1 ";
        $QUERY .= "ORDER BY T.dmdvname";
        $st = $connection->execute($QUERY);
        $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        return $this->renderText(json_encode($R_datos));
    }

    public function executeAutocompletedistrict(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $term = $request->getParameter('term');
        $id_parent = $request->getParameter('id_parent');
        if ($id_parent != '') {
            $QUERY = "SELECT T.id_administrativedivision AS value, T.dmdvname AS label ";
            $QUERY .= "FROM tb_administrativedivision T ";
            $QUERY .= "WHERE UPPER(T.dmdvname) LIKE UPPER('$term%') ";
            $QUERY .= "AND T.id_administrativedivisiontype = 2 ";
            $QUERY .= "AND T.id_parent = $id_parent ";
            $QUERY .= "ORDER BY T.dmdvname";
            $st = $connection->execute($QUERY);
            $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $this->renderText(json_encode($R_datos));
    }

    public function executeAutocompletesubdistrict(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $term = $request->getParameter('term');
        $id_parent = $request->getParameter('id_parent');
        if ($id_parent != '') {
            $QUERY = "SELECT T.id_administrativedivision AS value, T.dmdvname AS label ";
            $QUERY .= "FROM tb_administrativedivision T ";
            $QUERY .= "WHERE UPPER(T.dmdvname) LIKE UPPER('$term%') ";
            $QUERY .= "AND T.id_administrativedivisiontype = 3 ";
            $QUERY .= "AND T.id_parent = $id_parent ";
            $QUERY .= "ORDER BY T.dmdvname";
            $st = $connection->execute($QUERY);
            $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $this->renderText(json_encode($R_datos));
    }

    public function executeAutocompletevillage(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $term = $request->getParameter('term');
        $id_parent = $request->getParameter('id_parent');
        if ($id_parent != '') {
            $QUERY = "SELECT T.id_administrativedivision AS value, T.dmdvname AS label ";
            $QUERY .= "FROM tb_administrativedivision T ";
            $QUERY .= "WHERE UPPER(T.dmdvname) LIKE UPPER('$term%') ";
            $QUERY .= "AND T.id_administrativedivisiontype = 4 ";
            $QUERY .= "AND T.id_parent = $id_parent ";
            $QUERY .= "ORDER BY T.dmdvname";
            $st = $connection->execute($QUERY);
            $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $this->renderText(json_encode($R_datos));
    }

    public function executeAddVillage(sfWebRequest $request) {

        $id_subdistricttriallocation = $request->getParameter('id_subdistricttriallocation');
        $VillageName = $request->getParameter('VillageName');
        $dmdviso = "";
        $id_administrativedivision = TbAdministrativedivisionTable::addAdministrativedivision(4, $id_subdistricttriallocation, $VillageName, $dmdviso);
        die($id_administrativedivision);
    }

    public function executeAutousers($request) {
        $dato = strtolower($request->getParameter('term'));
        $QUERY01 = Doctrine_Query::create()
                ->select("U.id AS id, (U.first_name||''||U.last_name) AS name")
                ->from("SfGuardUser U")
                ->where("LOWER((U.first_name||''||U.last_name)) LIKE '$dato%'")
                ->orderBy("U.first_name")
                ->limit(20);
        $Resultado01 = $QUERY01->execute();
        $rv = "";
        foreach ($Resultado01 AS $fila) {
            if ($rv != '')
                $rv .= ', ';
            $rv .= '{ title: "' . htmlspecialchars($fila['name'], ENT_QUOTES, 'UTF-8') . '"' . ', id: ' . $fila['id'] . ' } ';
        }
        return $this->renderText("[$rv]");
    }

    public function executeAutogroups($request) {
        $dato = strtolower($request->getParameter('term'));
        $QUERY01 = Doctrine_Query::create()
                ->select("G.id AS id, (G.name) AS name")
                ->from("SfGuardGroup G")
                ->where("LOWER(G.name) LIKE '$dato%'")
                ->orderBy("G.name")
                ->limit(20);
        $Resultado01 = $QUERY01->execute();
        $rv = "";
        foreach ($Resultado01 AS $fila) {
            if ($rv != '')
                $rv .= ', ';
            $rv .= '{ title: "' . htmlspecialchars($fila['name'], ENT_QUOTES, 'UTF-8') . '"' . ', id: ' . $fila['id'] . ' } ';
        }
        return $this->renderText("[$rv]");
    }

}

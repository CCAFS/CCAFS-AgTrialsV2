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

require_once dirname(__FILE__) . '/../lib/institutionGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/institutionGeneratorHelper.class.php';
require_once '../lib/functions/function.php';

/**
 * institution actions.
 *
 * @package    AgTrials
 * @subpackage institution
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class institutionActions extends autoInstitutionActions {

    public function executeAutocompleteinstitution(sfWebRequest $request) {
        $this->getResponse()->setContentType('application/json');
        $connection = Doctrine_Manager::getInstance()->connection();
        $term = $request->getParameter('term');
        $QUERY = "SELECT T.id_institution AS value, T.insname AS label, T2.id_administrativedivision AS id_countryinstitution, T2.dmdvname AS namecountryinstitution ";
        $QUERY .= "FROM tb_institution T ";
        $QUERY .= "INNER JOIN tb_administrativedivision T2 ON T.id_country = T2.id_administrativedivision ";
        $QUERY .= "WHERE UPPER(T.insname) LIKE UPPER('$term%') ";
        $QUERY .= "ORDER BY T.insname";
        $st = $connection->execute($QUERY);
        $R_datos = $st->fetchAll(PDO::FETCH_ASSOC);
        return $this->renderText(json_encode($R_datos));
    }

}

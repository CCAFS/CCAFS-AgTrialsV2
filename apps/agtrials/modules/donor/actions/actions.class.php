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

/**
 * donor actions.
 *
 * @package    AgTrials
 * @subpackage donor
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class donorActions extends autoDonorActions {

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

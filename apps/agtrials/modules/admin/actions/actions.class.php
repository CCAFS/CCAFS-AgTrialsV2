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
class adminActions extends sfActions {

    /**
     * Executes Batchuploadanother action
     *
     * @param sfRequest $request A request object
     */
    public function executeBatchuploadanother(sfWebRequest $request) {
        if (isset($_POST['Form'])) {
            $id_user = $this->getUser()->getGuardUser()->getId();
            $TemplateFile = $request->getFiles('TemplateFile');
            $SelectTemplate = $request->getParameter('SelectTemplate');
            if ($SelectTemplate == 'Trial Project Template') {
                UploadTrialProjectTemplate($TemplateFile, $id_user);
            }
            if ($SelectTemplate == 'Trial Location Template') {
                UploadTrialLocationTemplate($TemplateFile, $id_user);
            }
            if ($SelectTemplate == 'Trial Varieties Template') {
                UploadTrialVarietiesTemplate($TemplateFile, $id_user);
            }
            if ($SelectTemplate == 'Trial Variables Measured Template') {
                UploadTrialVariablesMeasuredTemplate($TemplateFile, $id_user);
            }
        }
    }

}

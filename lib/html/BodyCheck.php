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
sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
?>

<script language="javascript">
    function callprogress(vValor, vFila, vTotal) {
        document.getElementById("getprogress").innerHTML = vValor;
        document.getElementById("getprogressrecord").innerHTML = vFila + '/' + vTotal + ' Records';
        document.getElementById("getProgressBarFill").innerHTML = '<div class="ProgressBarFill" style="width: ' + vValor + '%;"></div>';
    }

    function counter(vGrabados, vErrores) {

    }
    function FinishedProcess() {
        document.getElementById("FinishedProcess").innerHTML = "<div>Process Finished Successfully</div><br>";
        document.getElementById("Downloadresultcheckbatch").style.display = 'block';
    }
</script>
<div class="row">
    <div class="col-md-2 left-column">
        <?php include_partial('admin/ProsessesCheckMenu') ?>
    </div>
    <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
        <span class="Title"><?php echo $Modulo; ?></span>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px; border-bottom-width: 0px; padding: 10px; border-top-width: 10px;">
            <fieldset>
                <div class="col-md-12 BatchTitle">
                    Information Processing <?php echo $Modulo; ?> Template File
                </div>
                <div class="col-md-12">
                    <div class="ProgressBar">
                        <div class="ProgressBarText">
                            <b><span id="getprogress"></span>&nbsp;% Completed</b></br>
                            <span id="getprogressrecord"></span>
                        </div>
                        <div id="getProgressBarFill"></div>
                    </div>
                </div>
                <div class="col-md-12 Center">
                    <span id="error" style="display:none;">
                        <a href="#" id="view" onclick = "mostrar(); return false">View errors</a>
                        <div id="errores" style="display:none; overflow:auto; width:800px; height:330px; align:left; border:1px; margin-top: 5px;"></div>
                    </span>
                </div>
                <div class="col-md-12 Center"style="margin-top: 10px;">
                    <div class="FinishedProcess" id="FinishedProcess"><img src='/images/loading.gif'><br><font color='#0000A0' face='Verdana'>Processing may take a few minutes, wait a moment. <br> Don't close the window during the process.</font></div>
                    <div id="Downloadresultcheckbatch" style="display:none;">
                        <button title='Download result check batch' onclick="window.location.href = '<?php echo $Downloadresultcheckbatch; ?>'" id='Downloadresultcheckbatch' name='Downloadresultcheckbatch' type='button' class='btn btn-action'><span class='glyphicon glyphicon-download' aria-hidden='true'></span>&ensp;Download result check batch</button>
                    </div>
                </div>
            </fieldset>
        </div>
        <fieldset>
            <div class="form-group control-type-text" style="margin-left: 0px; margin-right: 0px;">
                <button class="btn btn-action" type="button" title=" Back " id="Back" neme="Back" onclick="history.back();"> <span class ="glyphicon glyphicon-step-backward" aria-hidden="true"></span>&ensp;Back&ensp;</button>
            </div>
        </fieldset>
    </div>
</div>
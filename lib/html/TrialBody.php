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
    function ProgressTrial(vValor, vFila, vTotal) {
        document.getElementById("ProgressTrial").innerHTML = vValor;
        document.getElementById("ProgressTrialrecord").innerHTML = vFila + '/' + vTotal + ' Records';
        document.getElementById("ProgressBarFillTrial").innerHTML = '<div class="ProgressBarFill" style="width: ' + vValor + '%;"></div>';
    }
    function CounterTrial(vGrabados, vErrores) {
        document.getElementById("RecordedTrial").innerHTML = vGrabados;
        document.getElementById("RecordErrorTrial").innerHTML = vErrores;
    }
    function ErroresTrial(vError) {
        obj = document.getElementById("SpanErrorTrial");
        obj.style.display = 'block';
        document.getElementById("DivErroresTrial").innerHTML = vError;
    }
    function MostrarTrial() {
        obj = document.getElementById("DivErroresTrial");
        obj.style.display = (obj.style.display == 'none') ? 'block' : 'none';
        document.getElementById("ViewTrial").innerHTML = (obj.style.display == 'none') ? 'View errors' : 'Hide errors';
    }

    function ProgressTrialInfo(vValor, vFila, vTotal) {
        document.getElementById("ProgressTrialInfo").innerHTML = vValor;
        document.getElementById("ProgressTrialrecordInfo").innerHTML = vFila + '/' + vTotal + ' Records';
        document.getElementById("ProgressBarFillInfo").innerHTML = '<div class="ProgressBarFill" style="width: ' + vValor + '%;"></div>';
    }
    function CounterTrialInfo(vGrabados, vErrores) {
        document.getElementById("RecordedTrialInfo").innerHTML = vGrabados;
        document.getElementById("RecordErrorTrialInfo").innerHTML = vErrores;
    }
    function ErroresTrialInfo(vError) {
        obj = document.getElementById("SpanErrorTrialInfo");
        obj.style.display = 'block';
        document.getElementById("DivErroresTrialInfo").innerHTML = vError;
    }
    function MostrarTrialInfo() {
        obj = document.getElementById("DivErroresTrialInfo");
        obj.style.display = (obj.style.display == 'none') ? 'block' : 'none';
        document.getElementById("ViewTrialInfo").innerHTML = (obj.style.display == 'none') ? 'View errors' : 'Hide errors';
    }

    function ProgressTrialInfoData(vValor, vFila, vTotal) {
        document.getElementById("ProgressTrialInfoData").innerHTML = vValor;
        document.getElementById("ProgressTrialrecordInfoData").innerHTML = vFila + '/' + vTotal + ' Records';
        document.getElementById("ProgressBarFillInfoData").innerHTML = '<div class="ProgressBarFill" style="width: ' + vValor + '%;"></div>';
    }
    function CounterTrialInfoData(vGrabados, vErrores) {
        document.getElementById("RecordedTrialInfoData").innerHTML = vGrabados;
        document.getElementById("RecordErrorTrialInfoData").innerHTML = vErrores;
    }
    function ErroresTrialInfoData(vError) {
        obj = document.getElementById("SpanErrorTrialInfoData");
        obj.style.display = 'block';
        document.getElementById("DivErroresTrialInfoData").innerHTML = vError;
    }
    function MostrarTrialInfoData() {
        obj = document.getElementById("DivErroresTrialInfoData");
        obj.style.display = (obj.style.display == 'none') ? 'block' : 'none';
        document.getElementById("ViewTrialInfoData").innerHTML = (obj.style.display == 'none') ? 'View errors' : 'Hide errors';
    }

    function ReadingFile(file) {
        document.getElementById("FileTrialInfoData").innerHTML = '<b>Reading File:</b> ' + file + '...';
    }

    function FinishedProcess() {
        document.getElementById("ProgressTrialrecordInfoData").innerHTML = 'Read the completed files';
        document.getElementById("FileTrialInfoData").innerHTML = '';
        document.getElementById("FinishedProcess").innerHTML = 'Process Finished Successfully';
    }
</script>
<div class="row">
    <div class="col-md-2 left-column">
        <?php include_partial('trial/MenuLateral') ?>
    </div>
    <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
        <span class="Title">Batch Upload Trials</span>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px; border-bottom-width: 0px; padding: 10px; border-top-width: 10px;">
            <fieldset>
                <div class="col-md-12 BatchTitle">
                    Information Process Trial Template File
                </div>
                <div class="col-md-12">
                    <div class="ProgressBar">
                        <div class="ProgressBarText">
                            <b><span id="ProgressTrial">0</span>&nbsp;% Completed</b></br>
                            <span id="ProgressTrialrecord">0/0 Records</span>
                        </div>
                        <div id="ProgressBarFillTrial"></div>
                    </div>
                </div>
                <div class="col-md-12 Center" style="margin-top: 5px;">
                    <div>Recorded Records: <b><span id="RecordedTrial"></span></b></div>
                    <div>Records with error: <b><span id="RecordErrorTrial"></span></b></div>
                </div>
                <div class="col-md-12 Center">
                    <span id="SpanErrorTrial" style="display:none;">
                        <a href="#" id="ViewTrial" onclick = "MostrarTrial(); return false">View errors</a>
                        <div id="DivErroresTrial" style="display:none; overflow:auto; width:800px; height:330px; align:left; border:1px; margin-top: 5px;"></div>
                    </span>
                </div>
                <div class="col-md-12 BatchTitle" style="margin-top: 10px;">
                    Information Process Trial Info (Crops) Template File
                </div>
                <div class="col-md-12">
                    <div class="ProgressBar">
                        <div class="ProgressBarText">
                            <b><span id="ProgressTrialInfo">0</span>&nbsp;% Completed</b></br>
                            <span id="ProgressTrialrecordInfo">0/0 Records</span>
                        </div>
                        <div id="ProgressBarFillInfo"></div>
                    </div>
                </div>
                <div class="col-md-12 Center" style="margin-top: 5px;">
                    <div>Recorded Records: <b><span id="RecordedTrialInfo">0</span></b></div>
                    <div>Records with error: <b><span id="RecordErrorTrialInfo">0</span></b></div>
                </div>
                <div class="col-md-12 Center">
                    <span id="SpanErrorTrialInfo" style="display:none;">
                        <a href="#" id="ViewTrialInfo" onclick = "MostrarTrialInfo(); return false">View errors</a>
                        <div id="DivErroresTrialInfo" style="display:none; overflow:auto; width:800px; height:330px; align:left; border:1px; margin-top: 5px;"></div>
                    </span>
                </div>
                <div class="col-md-12 BatchTitle" style="margin-top: 10px;">
                    Information Process Trial Info (Crops) Data Template File
                </div>
                <div class="col-md-12">
                    <div class="ProgressBar">
                        <div class="ProgressBarText">
                            <b><span id="ProgressTrialInfoData">0</span>&nbsp;% Completed</b></br>
                            <span id="ProgressTrialrecordInfoData">0/0 Records</span>
                        </div>
                        <div id="ProgressBarFillInfoData"></div>
                    </div>
                </div>
                <div class="col-md-12 Center">
                    <span id="FileTrialInfoData"></span>
                </div>
                <div class="col-md-12 Center">
                    <span id="SpanErrorTrialInfoData" style="display:none;">
                        <a href="#" id="ViewTrialInfoData" onclick = "MostrarTrialInfoData(); return false">View errors</a>
                        <div id="DivErroresTrialInfoData" style="display:none; overflow:auto; width:800px; height:330px; align:left; border:1px; margin-top: 5px;"></div>
                    </span>
                </div>
                <div class="col-md-12 Center"style="margin-top: 10px;">
                    <div class="FinishedProcess" id="FinishedProcess"><img src='/images/loading.gif'><br><font color='#0000A0' face='Verdana'>Processing may take a few minutes, wait a moment. <br> Don't close the window during the process.</font></div>
                </div>
            </fieldset>
        </div>
        <fieldset>
            <div class="form-group control-type-text" style="margin-left: 0px; margin-right: 0px;">
                <button class="btn btn-action" type="button" title=" Back " id="Back" neme="Back" onclick="window.location.href = '/batchuploadtrials'"> <span class ="glyphicon glyphicon-step-backward" aria-hidden="true"></span>&ensp;Back&ensp;</button>
            </div>
        </fieldset>
    </div>
</div>
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
?>
<div> 
    <script language="javascript">
        function ProgressTrial(vValor, vFila, vTotal) {
            document.getElementById("ProgressTrial").innerHTML = vValor;
            document.getElementById("ProgressTrialrecord").innerHTML = vFila + '/' + vTotal + ' Records';
            document.getElementById("ProgressBarFill").innerHTML = '<div class="ProgressBarFill" style="width: ' + vValor + '%;"></div>';
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
    <style type="text/css">
        .ProgressBar { width: 22em; height: 3.5em; border: 1px solid black; background: #CEDAC0; display: block; }
        .ProgressBarText { width: 305px; height: 3.5em; position: absolute; font-size: 13px; color: #000000; font-family: Verdana; font-weight:bold; text-align: center; font-weight: normal; }
        .ProgressBarFill { height: 3.5em; background: #86A273; display: block; overflow: visible; }
        .FinishedProcess { font-size: 13px; color: red; font-family: Verdana; font-weight:bold; text-align: center;}
    </style>

    <div style="margin-top: 10px;">
        <span class="Title">Batch Upload Trials</span>
    </div>
    <div class="Session" style="margin-top: 10px; margin-bottom: 10px; border-bottom-width: 0px; padding: 10px; border-top-width: 10px;">
        <fieldset>
            <table class="Forma">
                <tr class="TRTDCenter">
                    <td class="TRTDCenter"><font color='#0000A0' face='Verdana' size='2'><B>*** Information Process Trial Template File ***</B></font></td>
                </tr>
                <tr><td></td></tr>
                <tr class="TRTDCenter">
                    <td class="TRTDCenter">
                        <div class="ProgressBar TRTDCenter">
                            <div class="ProgressBarText TRTDCenter">
                                <b><span class="TRTDCenter" id="ProgressTrial">0</span>&nbsp;% Completed</b></br>
                                <span class="TRTDCenter" id="ProgressTrialrecord">0/0 Records</span>
                            </div>
                            <div class="TRTDCenter" id="ProgressBarFill"></div>
                        </div>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr class="TRTDCenter">
                    <td class="TRTDCenter">
                        <ul>
                            <li><font color='#000000' face='Verdana' size='2'>Recorded records: <b><span id="RecordedTrial">0</span></b></font></li>
                        </ul>
                    </td>
                </tr>
                <tr class="TRTDCenter">
                    <td class="TRTDCenter">
                        <ul>
                            <li><font color='#000000' face='Verdana' size='2'>Records with error: <b><span id="RecordErrorTrial">0</span></b></font></li>
                        </ul>
                    </td>
                </tr>
                <tr class="TRTDCenter">
                    <td class="TRTDCenter">
                        <span id="SpanErrorTrial" style="display:none;">
                            <img src='/images/view-icon.png'> <a href="#" id="ViewTrial" onclick = "MostrarTrial();
                                    return false">View errors</a>
                        </span>
                    </td>
                </tr>
                <tr class="TRTDLeft">
                    <td class="TRTDLeft">
                        <div id="DivErroresTrial" style="display:none; white-space:nowrap; overflow:auto; max-width:800px; max-height:300px; align:left; border:1px;"></div>
                    </td>
                </tr>

                <tr><td>&nbsp;</td></tr>
                <tr class="TRTDCenter">
                    <td class="TRTDCenter"><font color='#0000A0' face='Verdana' size='2'><B>*** Information Process Trial Info (Crops) Template File ***</B></font></td>
                </tr>
                <tr><td></td></tr>
                <tr class="TRTDCenter">
                    <td class="TRTDCenter">
                        <div class="ProgressBar TRTDCenter">
                            <div class="ProgressBarText TRTDCenter">
                                <b><span class="TRTDCenter" id="ProgressTrialInfo">0</span>&nbsp;% Completed</b></br>
                                <span class="TRTDCenter" id="ProgressTrialrecordInfo">0/0 Records</span>
                            </div>
                            <div class="TRTDCenter" id="ProgressBarFillInfo"></div>
                        </div>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr class="TRTDCenter">
                    <td class="TRTDCenter">
                        <ul>
                            <li><font color='#000000' face='Verdana' size='2'>Recorded records: <b><span id="RecordedTrialInfo">0</span></b></font></li>
                        </ul>
                    </td>
                </tr>
                <tr class="TRTDCenter">
                    <td class="TRTDCenter">
                        <ul>
                            <li><font color='#000000' face='Verdana' size='2'>Records with error: <b><span id="RecordErrorTrialInfo">0</span></b></font></li>
                        </ul>
                    </td>
                </tr>
                <tr class="TRTDCenter">
                    <td class="TRTDCenter">
                        <span id="SpanErrorTrialInfo" style="display:none;">
                            <img src='/images/view-icon.png'> <a href="#" id="ViewTrialInfo" onclick = "MostrarTrialInfo();
                                    return false">View errors</a>
                        </span>
                    </td>
                </tr>
                <tr class="TRTDLeft">
                    <td class="TRTDLeft">
                        <div id="DivErroresTrialInfo" style="display:none; white-space:nowrap; overflow:auto; max-width:800px; max-height:300px; align:left; border:1px;"></div>
                    </td>
                </tr>
                <tr><td>&nbsp;</td></tr>

                <tr class="TRTDCenter">
                    <td class="TRTDCenter"><font color='#0000A0' face='Verdana' size='2'><B>*** Information Process Trial Info (Crops) Data Template File ***</B></font></td>
                </tr>
                <tr><td></td></tr>
                <tr class="TRTDCenter">
                    <td class="TRTDCenter">
                        <div class="ProgressBar TRTDCenter">
                            <div class="ProgressBarText TRTDCenter">
                                <b><span class="TRTDCenter" id="ProgressTrialInfoData">0</span>&nbsp;% Completed</b></br>
                                <span class="TRTDCenter" id="ProgressTrialrecordInfoData">0/0 Records</span>
                            </div>
                            <div class="TRTDCenter" id="ProgressBarFillInfoData"></div>
                        </div>
                    </td>
                </tr>
                <tr class="TRTDCenter">
                    <td class="TRTDCenter">
                        <span id="FileTrialInfoData"></span>
                    </td>
                </tr>

                <tr class="TRTDCenter">
                    <td class="TRTDCenter">
                        <span id="SpanErrorTrialInfoData" style="display:none;">
                            <img src='/images/view-icon.png'> <a href="#" id="ViewTrialInfoData" onclick = "MostrarTrialInfoData();
                                    return false">View errors</a>
                        </span>
                    </td>
                </tr>
                <tr class="TRTDLeft">
                    <td class="TRTDLeft">
                        <div id="DivErroresTrialInfoData" style="display:none; white-space:nowrap; overflow:auto; max-width:800px; max-height:300px; align:left; border:1px;"></div>
                    </td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr class="TRTDCenter">
                    <td class="TRTDCenter">
                        <div class="FinishedProcess" id="FinishedProcess"><img src='/images/loading.gif'><br><font color='#0000A0' face='Verdana'>Processing may take a few minutes, wait a moment. <br> Please, don't close the window during the process.</font></div>
                    </td>
                </tr>
            </table>
        </fieldset>
        <fieldset>
            <div class="form-group control-type-text" style="margin-left: 0px; margin-right: 0px;">
                <button class="btn btn-action" type="button" title=" Back " id="Back" neme="Back" onclick="window.location.href = '/batchuploadtrials'"> <span class ="glyphicon glyphicon-step-backward" aria-hidden="true"></span>&ensp;Back&ensp;</button>
            </div>
        </fieldset>
    </div>
</div>

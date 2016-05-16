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
<div style="margin-top: 10px;">
    <span class="Title"><?php echo $Modulo; ?> (Error Exceeds the maximum allowed records)</span>
</div>
<div class="Session" style="margin-top: 10px; margin-bottom: 10px; border-bottom-width: 0px; padding: 10px; border-top-width: 10px;">
    <fieldset>
        <legend align= "left">&ensp;<b>Error</b>&ensp;</legend>
        <span><img src='/images/attention-icon.png'><b> <?php echo $Modulo; ?> template file:</b> Exceeds the maximum allowed records <?php echo "($TotalRecord / $MaxRecordsFile)"; ?></span><br>
    </fieldset>
    <br><br>
    <fieldset>
        <legend>&ensp;<b>Remember</b>&ensp;</legend>
        <span><img src='/images/attention-icon.png'> Templates Files must have <b>.xls</b> extension and must be smaller than <b><?php echo $MaxSizeFile; ?> MB</b> maximum size </span><br>
        <span><img src="/images/attention-icon.png"> Max. <b><?php echo $MaxRecordsFile; ?> Records</b> for Template File</span><br>
        <span><img src="/images/attention-icon.png"> Exact number of columns <b>'<?php echo $Cols; ?>'</b> for Template File</span>
    </fieldset>
    <br><br>
    <fieldset>
        <div class="form-group control-type-text" style="margin-left: 0px; margin-right: 0px;">
            <button class="btn btn-action" type="button" title=" Back " id="Back" neme="Back" onclick="history.back();"> <span class ="glyphicon glyphicon-step-backward" aria-hidden="true"></span>&ensp;Back&ensp;</button>
        </div>
    </fieldset>
</div>
<?php
use_javascript('trial.js');
use_javascript('searchtrials.js');
?>
<div class="row">
    <!-- Left Menu -->
    <div class="col-md-2 left-column">
        <div class="MenuTrials">
            <div onclick="window.location.href = '/searchtrials'" class="MenuTrialsButton selected"> Search Trials</div>
            <div onclick="window.location.href = '/trial/new'" class="MenuTrialsButton">  Add new Trial</div>
            <div onclick="window.location.href = '/batchuploadtrials'" class="MenuTrialsButton"> Batch Upload Trials</div>
        </div>
    </div>
    <!-- Right Content -->
    <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
        <span class="Title">Search Trials</span>
        <form class="form-horizontal" id="FormSearchTrials" name="FormSearchTrials" action="" enctype="multipart/form-data" method="post" autocomplete="off">
            <div class="Session" style="margin-top: 10px;  margin-bottom: 0px; margin-bottom: 10px; padding-bottom: 0px;">
                <div class="form-group control-type-text">
                    <div class="col-sm-12" style="color: #93c47d; font-size: 16px;">Search terms:</div>      
                    <div class="col-sm-10 control-type-text" style="padding-right: 2px;">
                        <input class="form-control" type="text"  name="searchterms" id="searchterms" size="36" maxlength="255" value="<?php echo $searchterms; ?>">
                    </div>
                    <div class="col-sm-2" style="width: 70px; padding-left: 5px; padding-right: 5px; height: 34px;">
                        <select name="searchtermsoptions" id="searchtermsoptions" size="1" class="form-control" style="height: 33px;">
                            <option value="OR">OR &ensp;</option>
                            <option value="AND">AND</option>
                        </select>
                    </div>
                    <div class="DivColIcon">
                        <span id="CheckSearchterms"></span>                                
                    </div>
                </div>
                <div class="form-group control-type-text">
                    <div class="col-sm-12" style="color: #93c47d; font-size: 16px; padding-bottom: 8px;">Filter by:</div>   
                    <fieldset style="padding-left: 15px;">
                        <div class="form-group control-type-text col-sm-3" style="width: 250px;">
                            <div class="col-sm-12">Project:</div>      
                            <div class="col-sm-11 control-type-text" style="padding-right: 2px;">
                                <input name="id_project" id="id_project" type="hidden" value="<?php echo $id_project; ?>" /> 
                                <input class="form-control SearchInput" name="searchprjname" id="searchprjname" type="text" size="17" maxlength="150" value="<?php echo $searchprjname; ?>" />
                            </div>
                            <div class="DivColIcon">
                                <span id="CheckProject"></span>                                
                            </div>
                        </div>
                        <div class="form-group control-type-text col-sm-3" style="width: 250px;">
                            <div class="col-sm-12">Contact person:</div>      
                            <div class="col-sm-11 control-type-text" style="padding-right: 2px;">
                                <input name="id_contactperson" id="id_contactperson" type="hidden" value="<?php echo $id_contactperson; ?>" /> 
                                <input class="form-control SearchInput" name="searchcontactperson" id="searchcontactperson" type="text" size="17" maxlength="150" value="<?php echo $searchcontactperson; ?>" />                    
                            </div>
                            <div class="DivColIcon">
                                <span id="CheckContactperson"></span>                                
                            </div>
                        </div>
                        <div class="form-group control-type-text col-sm-3" style="width: 250px;">
                            <div class="col-sm-12">Crop / Technology:</div>      
                            <div class="col-sm-11 control-type-text" style="padding-right: 2px;">
                                <input name="id_crop" id="id_crop" type="hidden" value="<?php echo $id_crop; ?>" /> 
                                <input class="form-control SearchInput" name="searchcrpname" id="searchcrpname" type="text" size="17" maxlength="150" value="<?php echo $searchcrpname; ?>" />
                            </div>
                            <div class="DivColIcon">
                                <span id="CheckCrop"></span>                                
                            </div>
                        </div>
                        <div class="form-group control-type-text col-sm-3" style="width: 250px;">
                            <div class="col-sm-12">Trial name:</div>      
                            <div class="col-sm-11 control-type-text" style="padding-right: 2px;">
                                <input name="id_trial" id="id_trial" type="hidden" value="<?php echo $id_trial; ?>" /> 
                                <input class="form-control SearchInput" name="searchtrltrialname" id="searchtrltrialname" type="text" size="17" maxlength="150" value="<?php echo $searchtrltrialname; ?>" />   
                            </div>
                            <div class="DivColIcon">
                                <span id="CheckTrialname"></span>                                
                            </div>
                        </div>
                    </fieldset>
                    <div id="ShowHideDivAdvancedSearch" class="col-sm-3" style="color: #93c47d; font-size: 14px; padding-bottom: 8px; cursor: pointer; width: 160px;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Advanced Search</div>
                </div>
            </div>

            <div id="DivAdvancedSearch" class="Session col-sm-12 control-type-text" style="margin-top: 10px; margin-bottom: 10px; display:none;">
                <div class="col-sm-12" style="color: #93c47d; font-size: 16px; padding-bottom: 8px;">Advanced Search:</div>   
                <div class="col-sm-12">
                    <div class="form-group control-type-text col-sm-3"style="height: 60px; padding-top: 20px;">
                        <div class="col-sm-12">Planting/Sowing:</div>      
                    </div>
                    <div class="form-group control-type-text col-sm-4">
                        <div class="col-sm-12">From date</div>      
                        <div class="col-sm-12 control-type-text">
                            <input type="text" value="" onblur="ValidaFecha(this);" onkeyup="ValidaEscrituraFecha(this);" maxlength="10" size="11" id="trnfplantingsowingstartdate1" name="trnfplantingsowingstartdate1" placeholder="yyyy-mm-dd" class="DateInput form-control">                    
                        </div>
                    </div>
                    <div class="form-group control-type-text col-sm-4">
                        <div class="col-sm-12">To date</div>      
                        <div class="col-sm-12 control-type-text">
                            <input type="text" value="" onblur="ValidaFecha(this);" onkeyup="ValidaEscrituraFecha(this);" maxlength="10" size="11" id="trnfplantingsowingstartdate2" name="trnfplantingsowingstartdate2" placeholder="yyyy-mm-dd" class="DateInput form-control">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group control-type-text col-sm-3"style="height: 60px; padding-top: 20px;">
                        <div class="col-sm-12">Harvest:</div>      
                    </div>
                    <div class="form-group control-type-text col-sm-4">
                        <div class="col-sm-12">From date</div>      
                        <div class="col-sm-12 control-type-text">
                            <input type="text" value="" onblur="ValidaFecha(this);" onkeyup="ValidaEscrituraFecha(this);" maxlength="10" size="11" id="trnfharveststartdate1" name="trnfharveststartdate1" placeholder="yyyy-mm-dd" class="DateInput form-control">                    
                        </div>
                    </div>
                    <div class="form-group control-type-text col-sm-4">
                        <div class="col-sm-12">To date</div>      
                        <div class="col-sm-12 control-type-text">
                            <input type="text" value="" onblur="ValidaFecha(this);" onkeyup="ValidaEscrituraFecha(this);" maxlength="10" size="11" id="trnfharveststartdate2" name="trnfharveststartdate2" placeholder="yyyy-mm-dd" class="DateInput form-control">
                        </div>
                    </div>
                </div>
            </div>

            <fieldset style="margin-top: 10px; margin-left: 13px;">
                <div class="form-group control-type-text" style="margin-left: 0px;">
                    <button class="btn btn-action" type="button" title=" Search " id="SubmitSearch" neme="SubmitSearch"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&ensp;Search&ensp;</button>
                    <button class="btn btn-action" type="button" title=" Clear " id="ButtonClear" neme="ButtonClear"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span>&ensp;Clear&ensp;</button>
                    <input type="hidden" value="" id="FormAction" name="FormAction"/>
                </div>
            </fieldset>
        </form>

        <div id="DivTableResusltsSearch" class="col-sm-12 control-type-text" style="display:none;">
            <table id="TableResusltsSearch" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Project</th>
                        <th>Location</th>
                        <th>Crop</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#TableResusltsSearch').removeClass('display').addClass('table table-striped table-bordered');
</script>
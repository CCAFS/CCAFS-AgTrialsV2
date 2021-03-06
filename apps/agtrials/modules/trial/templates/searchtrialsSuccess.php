<?php
use_javascript('trial.js');
use_javascript('searchtrials.js');
use_javascript('introJs/searchTrials.js');

use_javascript('/datatables/js/jquery.dataTables.min.js');
use_stylesheet("/datatables/css/jquery.dataTables.min.css");

if ($id_project != '') {
    $TbProject = Doctrine::getTable('TbProject')->findByIdProject($id_project);
    $searchprjname = $TbProject[0]->prjname;
}
if ($id_contactperson != '') {
    $TbContactperson = Doctrine::getTable('TbContactperson')->findByIdContactperson($id_contactperson);
    $searchcontactperson = $TbContactperson[0]->cnprfirstname . " " . $TbContactperson[0]->cnprlastname;
}
if ($id_crop != '') {
    $TbCrop = Doctrine::getTable('TbCrop')->findByIdCrop($id_crop);
    $searchcrpname = $TbCrop[0]->crpname;
}
if ($trlname != '') {
    $TbTrial = Doctrine::getTable('TbTrial')->findByTrltrialname($trlname);
    $id_trial = $TbTrial[0]->id_trial;
    $searchtrltrialname = $TbTrial[0]->trltrialname;
}
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
        <?php echo ModuleHelp('Search Trials'); ?>
        <span class="Title">Search Trials</span>
        <form class="form-horizontal" id="FormSearchTrials" name="FormSearchTrials" action="" enctype="multipart/form-data" method="post" autocomplete="off">
            <div class="Session" style="margin-top: 10px;  margin-bottom: 0px; margin-bottom: 10px; padding-bottom: 0px;">
                <div id="searchterms-block" class="form-group control-type-text">
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
                <div id="filterby-block" class="form-group control-type-text">
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
                    <div  class="col-sm-12" style="text-align: right;">
                        <div id="ShowHideDivAdvancedSearch" class="col-sm-3" style="font-size: 14px; text-align: right; padding-bottom: 8px; cursor: pointer; width: 160px; text-decoration: underline; margin-left: 715px;" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Advanced Search</div>
                    </div>
                </div>
            </div>
            <div id="DivAdvancedSearch" class="Session col-sm-12 control-type-text" style="margin-top: 10px; margin-bottom: 10px; display:none;">
                <div class="col-sm-12" style="color: #93c47d; font-size: 16px; padding-bottom: 8px;">Advanced Search:</div>
                <div class="col-sm-12">
                    <fieldset id="varieties-block">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading Title1" style="color:#595959;">Varieties</div>
                            <div class="panel-body" style="padding-top: 5px; padding-bottom: 5px; background: #EEEEEE;">
                                <div class="col-sm-1" style="padding-left: 0px; padding-right: 0px; width: 50px;">Search:</div> 
                                <div class=" col-sm-4 control-type-text">
                                    <input class="SearchInput form-control"  name="Variety1" id="Variety1" onkeyup="FilterVarietyTrials(this, 1);" type="text" size="36" maxlength="255" value="">
                                </div>
                                <div class="DivColIcon">
                                    <span id="DivFilterVariety1" style="display:none;"><?php echo image_tag('loading4.gif', array('size' => '18x18')); ?></span>
                                    <span id="DivClearFilterVariety1" style="display:none;" class="Span-Action-Link" onclick="ClearFilterVariety(1);" title="Clear"><?php echo image_tag("/images/cross.png", array('size' => '18x18')); ?></span>
                                    <span id="DivCreateNewVariety" title="Create new Variety" data-toggle="modal" onclick="GetInfoRowV(1);" data-target="#ModalCreateNewVariety"><?php echo image_tag("/images/add-icon.png", array('size' => '18x18')); ?></span>
                                </div>
                            </div>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr style="background: #D6D6D6;">
                                        <th>Name</th>
                                        <th>Origin</th>
                                        <th>Synonymous</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody  id="InfoVariety1"></tbody>
                                <tbody  id="InfoVarietySelected1"></tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
                <div class="col-sm-12">
                    <fieldset id="variablesMeasured-block">
                        <div class="panel panel-default" style="margin-bottom: 5px;">
                            <!-- Default panel contents -->
                            <div class="panel-heading Title1" style="color:#595959;">Variables Measured</div>
                            <div class="panel-body" style="padding-top: 5px; padding-bottom: 5px; background: #EEEEEE;">
                                <div class="col-sm-1" style="padding-left: 0px; padding-right: 0px; width: 50px;">Search:</div> 
                                <div class=" col-sm-4 control-type-text">
                                    <input class="SearchInput form-control"  name="VariablesMeasured1" id="VariablesMeasured1" onkeyup="FilterVariablesMeasuredTrials(this, 1);" type="text" size="36" maxlength="255" value="">
                                </div>
                                <div class="DivColIcon">
                                    <span id="DivFilterVariablesMeasured1" style="display:none;"><?php echo image_tag('loading4.gif', array('size' => '18x18')); ?></span>
                                    <span id="DivClearFilterVariablesMeasured1" style="display:none;" class="Span-Action-Link" onclick="ClearFilterVariablesMeasured(1);" title="Clear"><?php echo image_tag("/images/cross.png", array('size' => '18x18')); ?></span>
                                    <span id="DivCreateNewVariablesMeasured" title="Create new variable measured" data-toggle="modal" onclick="GetInfoRowVM(1);" data-target="#ModalCreateNewVariablesMeasured"><?php echo image_tag("/images/add-icon.png", array('size' => '18x18')); ?></span>
                                </div>
                            </div>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr style="background: #D6D6D6;">
                                        <th>Name</th>
                                        <th>Trait class</th>
                                        <th>Definition</th>
                                        <th>Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody  id="InfoVariablesMeasured1"></tbody>
                                <tbody  id="InfoVariablesMeasuredSelected1"></tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>


                <div class="col-sm-12">
                    <div class="form-group control-type-text col-sm-3"style="height: 60px; padding-top: 20px;">
                        <div class="col-sm-12">Planting/Sowing:</div>      
                    </div>
                    <div class="form-group control-type-text col-sm-3">
                        <div class="col-sm-12">From date</div>      
                        <div class="col-sm-12 control-type-text" style="padding-right: 2px; width: 150px;">
                            <input type="text" value="" onblur="ValidaFecha(this);" onkeyup="ValidaEscrituraFecha(this);" maxlength="10" size="11" id="searchtrnfplantingsowingfrom" name="searchtrnfplantingsowingfrom" placeholder="yyyy-mm-dd" class="DateInput form-control">                    
                        </div>
                        <div class="DivColIcon">
                            <span id="CheckSowingFrom"></span>                                
                        </div>
                    </div>
                    <div class="form-group control-type-text col-sm-3">
                        <div class="col-sm-12">To date</div>      
                        <div class="col-sm-12 control-type-text" style="padding-right: 2px; width: 150px;">
                            <input type="text" value="" onblur="ValidaFecha(this);" onkeyup="ValidaEscrituraFecha(this);" maxlength="10" size="11" id="searchtrnfplantingsowingto" name="searchtrnfplantingsowingto" placeholder="yyyy-mm-dd" class="DateInput form-control">
                        </div>
                        <div class="DivColIcon">
                            <span id="CheckSowingTo"></span>                                
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group control-type-text col-sm-3"style="height: 60px; padding-top: 20px;">
                        <div class="col-sm-12">Harvest:</div>      
                    </div>
                    <div class="form-group control-type-text col-sm-3">
                        <div class="col-sm-12">From date</div>      
                        <div class="col-sm-12 control-type-text" style="padding-right: 2px; width: 150px;">
                            <input type="text" value="" onblur="ValidaFecha(this);" onkeyup="ValidaEscrituraFecha(this);" maxlength="10" size="11" id="searchtrnfharvestfrom" name="searchtrnfharvestfrom" placeholder="yyyy-mm-dd" class="DateInput form-control">                    
                        </div>
                        <div class="DivColIcon">
                            <span id="CheckHarvestFrom"></span>                                
                        </div>
                    </div>
                    <div class="form-group control-type-text col-sm-3">
                        <div class="col-sm-12">To date</div>      
                        <div class="col-sm-12 control-type-text" style="padding-right: 2px; width: 150px;">
                            <input type="text" value="" onblur="ValidaFecha(this);" onkeyup="ValidaEscrituraFecha(this);" maxlength="10" size="11" id="searchtrnfharvestto" name="searchtrnfharvestto" placeholder="yyyy-mm-dd" class="DateInput form-control">
                        </div>
                        <div class="DivColIcon">
                            <span id="CheckHarvestTo"></span>                                
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group control-type-text col-sm-3"style="height: 60px; padding-top: 20px;">
                        <div class="col-sm-12">Create at:</div>      
                    </div>
                    <div class="form-group control-type-text col-sm-3">
                        <div class="col-sm-12">From date</div>      
                        <div class="col-sm-12 control-type-text" style="padding-right: 2px; width: 150px;">
                            <input type="text" value="" onblur="ValidaFecha(this);" onkeyup="ValidaEscrituraFecha(this);" maxlength="10" size="11" id="searchcreatedatfrom" name="searchcreatedatfrom" placeholder="yyyy-mm-dd" class="DateInput form-control">                    
                        </div>
                        <div class="DivColIcon">
                            <span id="CheckCreatedatFrom"></span>                                
                        </div>
                    </div>
                    <div class="form-group control-type-text col-sm-3">
                        <div class="col-sm-12">To date</div>      
                        <div class="col-sm-12 control-type-text" style="padding-right: 2px; width: 150px;">
                            <input type="text" value="" onblur="ValidaFecha(this);" onkeyup="ValidaEscrituraFecha(this);" maxlength="10" size="11" id="searchcreatedatto" name="searchcreatedatto" placeholder="yyyy-mm-dd" class="DateInput form-control">
                        </div>
                        <div class="DivColIcon">
                            <span id="CheckCreatedatTo"></span>                                
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <fieldset  style="margin-top: 10px; margin-left: 13px;">
                <div id="buttons-block" class="form-group control-type-text" style="margin-left: 0px;">
                    <button class="btn btn-action" type="button" title=" Search " id="SubmitSearch" neme="SubmitSearch"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&ensp;Search&ensp; </button>
                    <button class="btn btn-action" type="button" title=" Clear " id="ButtonClear" neme="ButtonClear"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span>&ensp;Clear&ensp;</button>
                    <span id="ButtonResusltsSearch" style="display:none;">
                        &ensp;&ensp;&ensp;&ensp;
                        <button class="btn btn-action" type="button" title=" List " id="ButtonList" neme="ButtonList"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&ensp;List&ensp;</button>
                        <button class="btn btn-action" type="button" title=" Map " id="ButtonMap" neme="ButtonMap"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>&ensp;Map&ensp;</button>
                        <button class="btn btn-action" type="button" title=" Download data " id="ButtonDownloaddata" neme="ButtonDownloaddata"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>&ensp;Download data&ensp;</button>

                    </span>                    
                    <input type="hidden" value="" id="FormAction" name="FormAction"/>
                </div>
            </fieldset>
        </form>
        <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="ViewList">
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
            <div class="tab-pane active" id="ViewMap">
                <div id="DivTableResusltsSearchMaps" class="col-sm-12 control-type-text" style="display:none; height: 400px;">
                    <iframe id="ResusltsSearchMaps" width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=""></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#TableResusltsSearch').removeClass('display').addClass('table table-striped table-bordered');
    LoadStart();
</script>

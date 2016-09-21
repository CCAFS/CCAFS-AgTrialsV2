<?php
use_javascript('trial.js');
$id_trial = $form->getObject()->get('id_trial');
$InfoProject = GetInfoProject($form->getObject()->get('id_project'));
$InfoTrialManager = GetInfoTrialManager($form->getObject()->get('id_contactperson'));
$InfoTrialLocation = GetInfoTrialLocation($form->getObject()->get('id_triallocation'));
$PartCountry = explode(",", $InfoTrialLocation['country'], 2);
$PartDistrict = explode(",", $InfoTrialLocation['district'], 2);
$PartSubdistrict = explode(",", $InfoTrialLocation['subdistrict'], 2);
$PartVillage = explode(",", $InfoTrialLocation['village'], 2);
$ArrTrialInfo = GetInfoTrialCropInfo($form->getObject()->get('id_trial'));
?>


<div class="row">
    <div class="col-md-2 left-column">
        <div class="MenuTrials">
            <div onclick="window.location.href = '/searchtrials'" class="MenuTrialsButton"> Search Trials</div>
            <div onclick="window.location.href = '/trial/new'" class="MenuTrialsButton selected"> Show Trial
                <ul class="subMenu">
                    <li><a class="page-scroll" href="#ProjectTrialGroups">Project / Trial Groups</a></li>
                    <li><a class="page-scroll" href="#LeadofProject">Lead of Project</a></li>
                    <li><a class="page-scroll" href="#ProjectImplementingInstitutions">Project Implementing</a></li>
                    <li><a class="page-scroll" href="#FundingforProject">Funding for Project</a></li>
                    <li><a class="page-scroll" href="#ProjectInformation">Project Information</a></li>
                    <li><a class="page-scroll" href="#TrialManager">Trial Manager</a></li>
                    <li><a class="page-scroll" href="#TrialLocation">Trial Location</a></li>
                    <li><a class="page-scroll" href="#TrialCharacteristics">Trial Characteristics</a></li>
                    <li><a class="page-scroll" href="#AccesstoInformation">Access to Information</a></li>
                    <li><a class="page-scroll" href="#License">License</a></li>
                    <li><a class="page-scroll" href="#TrialCropInfo">Trial Crop Info</a></li>
                </ul>
            </div>
            <div onclick="window.location.href = '/batchuploadtrials'" class="MenuTrialsButton"> Batch Upload Trials</div>            
        </div>
    </div>
    <div class="col-md-10 sf_admin_form">
        <?php $Notice = MessageNotice(); ?>
        <?php if ($Notice != ""): ?>
            </br>
            <div class="alert alert-danger alert-block">
                <a href="#" class="close fade" data-dismiss="alert">&times;</a>
                <?php echo $Notice; ?>
            </div>
        <?php endif; ?>
        <div id="ProjectTrialGroups" class="label ui-helper-clearfix">
            <span class="Title">Project / Trial Groups</span>
        </div>
        <div class="Session">
            <div class="form-group control-type-text">
                <table class="TableModule"> 
                    <tbody><tr>
                            <td>Name of the Project:&ensp;</td>
                            <td>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoProject['prjname']; ?>">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group control-type-text Title0" id="LeadofProject">
                <span class="Title1">Project Lead</span>
            </div>
            <hr class="LineModule">

            <div class="form-group control-type-text">
                <table class="TableModule">
                    <tbody><tr>
                            <td>Name:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivName">First name</div>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoProject['cnprfirstname']; ?>">
                                </div>
                            </td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivName">Middle name</div>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoProject['cnprmiddlename']; ?>">
                                </div>
                            </td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivName">Last name</div>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoProject['cnprlastname']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Institution:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivName">Name</div>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoProject['insnameleadofproject']; ?>">
                                </div>
                            </td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivName">Country</div>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoProject['namecountryinstitutionleadofproject']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoProject['cnpremail']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> Telephone:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoProject['cnprtelephone']; ?>">
                                </div>
                            </td>
                        </tr>
                    </tbody></table>
            </div>
            <div class="form-group control-type-text Title0" id="ProjectImplementingInstitutions">
                <span class="Title1">Project Implementing Institutions</span>
            </div>
            <hr class="LineModule">

            <div class="form-group control-type-text">
                <table class="TableModule">
                    <tbody><tr>
                            <td> Institution:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivName">Name</div>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoProject['insnameprojectimplementinginstitutions']; ?>">
                                </div>
                            </td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivName">Country</div>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoProject['namecountryprojectimplementinginstitutions']; ?>">
                                </div>
                            </td>
                        </tr>
                    </tbody></table>
            </div>
            <div class="form-group control-type-text Title0" id="ProjectImplementingPeriod">
                <span class="Title1">Project Implementing Period</span>
            </div>
            <hr class="LineModule">
            <div class="form-group control-type-text">
                <table class="TableModule">
                    <tbody><tr>
                            <td> Start Date:&ensp;</td>
                            <td>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoProject['prjprojectimplementingperiodstartdate']; ?>">
                                </div>
                            </td>
                            <td>&ensp;&ensp;</td>
                            <td> End Date:&ensp;</td>
                            <td>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoProject['prjprojectimplementingperiodenddate']; ?>">
                                </div>
                            </td>
                        </tr>
                    </tbody></table>
            </div>
            <div class="form-group control-type-text Title0" id="FundingforProject">
                <span class="Title1">Funding for Project</span>
            </div>
            <hr class="LineModule">
            <div class="form-group control-type-text">
                <table class="TableModule">
                    <tbody><tr>
                            <td> Donor Name:&ensp;</td>
                            <td>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoProject['dnrname']; ?>">
                                </div>
                            </td>
                        </tr>
                    </tbody></table>
            </div>
            <div class="form-group control-type-text Title0" id="ProjectInformation">
                <span class="Title1">Project Information</span>
            </div>
            <hr class="LineModule">
            <div class="form-group control-type-text">
                <table class="TableModule">
                    <tbody><tr>
                            <td> Abstract:&ensp;</td>
                            <td>
                                <div>
                                    <textarea disabled="" rows="3" cols="36" name="prjabstract" id="prjabstract" class="form-control"><?php echo $InfoProject['prjabstract']; ?></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> Keywords:&ensp;</td>
                            <td>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoProject['prjkeywords']; ?>">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="form-group control-type-text">
            <span class="Title">Trial Info</span>
        </div>

        <div class="Session">
            <div style="padding-top: 15px;" class="form-group control-type-text Title0" id="TrialManager">
                <span class="Title1">Trial Manager</span>
            </div>
            <hr class="LineModule">
            <div class="form-group control-type-text">
                <table class="TableModule">
                    <tbody><tr>
                            <td> Name:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivName">First name</div>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoTrialManager['cnprfirstname']; ?>">
                                </div>
                            </td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivName">Middle name</div>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoTrialManager['cnprmiddlename']; ?>">
                                </div>
                            </td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivName">Last name</div>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoTrialManager['cnprlastname']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> Institution:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivName">Name</div>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoTrialManager['insname']; ?>">
                                </div>
                            </td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivName">Country</div>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoTrialManager['namecountryinstitution']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> Email:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoTrialManager['cnpremail']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> Telephone:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoTrialManager['cnprtelephone']; ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> Primary Role of Contact Person:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo GetInfoRoleContactperson($form->getObject()->get('id_rolecontactperson')); ?>">
                                </div>
                            </td>
                        </tr>
                    </tbody></table>
            </div>
            <div class="form-group control-type-text Title0" id="TrialImplementingPeriod">
                <span class="Title1">Trial Implementing Period</span>
            </div>
            <hr class="LineModule">
            <div class="form-group control-type-text">
                <table class="TableModule">
                    <tbody><tr>
                            <td> Start Date:&ensp;</td>
                            <td>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $form->getObject()->get('trlimplementingperiodstartdate'); ?>">
                                </div>
                            </td>
                            <td>&ensp;&ensp;</td>
                            <td> End Date:&ensp;</td>
                            <td>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $form->getObject()->get('trlimplementingperiodenddate'); ?>">
                                </div>
                            </td>
                        </tr>
                    </tbody></table>
            </div>
            <div class="form-group control-type-text Title0" id="TrialLocation">
                <span class="Title1">Trial Location</span>
            </div>
            <hr class="LineModule">
            <div class="form-group control-type-text">
                <table class="TableModule">
                    <tbody><tr>
                            <td> Name:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div>
                                    <input class="form-control" type="text" disabled="" value="<?php echo $InfoTrialLocation['trlcname']; ?>">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td> Country:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivRow">
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" disabled="" value="<?php echo $PartCountry[1]; ?>">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> District/Satate/Province Level:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivRow">
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" disabled="" value="<?php echo $PartDistrict[1]; ?>">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> Sub-district/Division Level:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivRow">
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" disabled="" value="<?php echo $PartSubdistrict[1]; ?>">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> Village Level:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivRow">
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" disabled="" value="<?php echo $PartVillage[1]; ?>">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Coordinates:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivName">Latitude</div>
                                <div>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" disabled="" value="<?php echo $InfoTrialLocation['trlclatitude']; ?>">
                                    </div>
                                </div>
                            </td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivName">Longitude</div>
                                <div>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" disabled="" value="<?php echo $InfoTrialLocation['trlclongitude']; ?>">
                                    </div>
                                </div>
                            </td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="DivName">Altitude</div>
                                <div>
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" disabled="" value="<?php echo $InfoTrialLocation['trlcaltitude']; ?>">
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </tbody></table>
            </div>
            <div class="form-group control-type-text Title0" id="TrialCharacteristics">
                <span class="Title1">Trial Characteristics</span>
            </div>
            <hr class="LineModule">
            <div class="form-group control-type-text">
                <table class="TableModule">
                    <tbody>
                        <tr>
                            <td> Trial Name:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="col-sm-12">
                                    <input class="form-control" type="text" size="36" disabled="" value="<?php echo $form->getObject()->get('trltrialname'); ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td> Trial Objectives:</td>
                            <td>&ensp;&ensp;</td>
                            <td>
                                <div class="col-sm-12">
                                    <input class="form-control" type="text" size="69" disabled="" value="<?php echo $form->getObject()->get('trltrialobjectives'); ?>">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group control-type-text Title0" id="AccesstoInformation">
                <span class="Title1">Access to Information</span>
            </div>
            <hr class="LineModule">
            <div class="form-group control-type-text">
                <table class="TableModule">
                    <tbody>
                        <tr>
                            <td> <?php echo $form->getObject()->get('trltrialpermissions'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group control-type-text" id="License">
                <span class="Title1">License</span>
            </div>
            <div class="form-group control-type-text">
                <table class="TableModule">
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <?php echo $form->getObject()->get('trltriallicense'); ?>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="form-group control-type-text" id="TrialCropInfo">
            <span class="Title">Trial Crop Info</span>
        </div>

        <div class="Session">
            <div id="TrialCharacteristics" class="form-group control-type-text Title0" style="padding-top: 15px;">
                <span class="Title1">Trial Design</span>
            </div>
            <hr class="LineModule">
            <?php
            if (count($ArrTrialInfo)) {
                foreach ($ArrTrialInfo AS $TrialInfo) {
                    $id_trialinfo = $TrialInfo['id_trialinfo'];
                    ?>
                    <div id="DivResults">
                        <div id="DivCrop1" class="form-group control-type-text" style="margin-bottom: 0px;">
                            <fieldset>
                                <div class="col-sm-12 form-group control-type-text">
                                    <div class="col-sm-2">Crop:</div> 
                                    <div class="col-sm-4 control-type-text">
                                        <input class="form-control" type="text" value="<?php echo $TrialInfo['crpname']; ?>" disabled="true">
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group control-type-text">
                                    <div class="col-sm-2">Number of Replicates:</div> 
                                    <div class="col-sm-1 control-type-text">
                                        <input class="form-control" type="text" value="<?php echo $TrialInfo['trnfnumberofreplicates']; ?>" disabled="true">
                                    </div>                                
                                </div>
                                <div class="col-sm-12 form-group control-type-text">
                                    <div class="col-sm-2">Experimental Design:</div> 
                                    <div class="col-sm-4 control-type-text">
                                        <input class="form-control" type="text" value="<?php echo $TrialInfo['xpdsname']; ?>" disabled="true">                                    
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group control-type-text">
                                    <div class="col-sm-2">Treatment Number:</div> 
                                    <div class=" col-sm-1 control-type-text">
                                        <input class="form-control" type="text" value="<?php echo $TrialInfo['trnftreatmentnumber']; ?>" disabled="true">
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group control-type-text">
                                    <div class="col-sm-2">Treatment Name and Code:</div> 
                                    <div class=" col-sm-4 control-type-text">
                                        <input class="form-control" type="text" value="<?php echo $TrialInfo['trnftreatmentnameandcode']; ?>" disabled="true">                                   
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group control-type-text">
                                    <div class="col-sm-4">Planting/Sowing Start Date:</div> 
                                    <div class=" col-sm-4 control-type-text">
                                        <input class="form-control" placeholder="yyyy-mm-dd" value="<?php echo $TrialInfo['trnfplantingsowingstartdate']; ?>" disabled="true">                                
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group control-type-text">
                                    <div class="col-sm-4">Planting/Sowing End Date:</div> 
                                    <div class=" col-sm-4 control-type-text">
                                        <input class="form-control" placeholder="yyyy-mm-dd" type="text" value="<?php echo $TrialInfo['trnfplantingsowingenddate']; ?>" disabled="true">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group control-type-text">
                                    <div class="col-sm-4">Physiological Maturity Start Date:</div> 
                                    <div class=" col-sm-4 control-type-text">
                                        <input class="form-control" placeholder="yyyy-mm-dd" type="text" value="<?php echo $TrialInfo['trnfphysiologicalmaturitystardate']; ?>" disabled="true">                                
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group control-type-text">
                                    <div class="col-sm-4">Physiological Maturity End Date:</div> 
                                    <div class=" col-sm-4 control-type-text">
                                        <input class="form-control" placeholder="yyyy-mm-dd" type="text" value="<?php echo $TrialInfo['trnfphysiologicalmaturityenddate']; ?>" disabled="true">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group control-type-text">
                                    <div class="col-sm-4">Harvest Start Date:</div> 
                                    <div class=" col-sm-4 control-type-text">
                                        <input class="form-control" placeholder="yyyy-mm-dd" type="text" value="<?php echo $TrialInfo['trnfharveststartdate']; ?>" disabled="true">                                
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group control-type-text">
                                    <div class="col-sm-4">Harvest End Date:</div> 
                                    <div class=" col-sm-4 control-type-text">
                                        <input class="form-control" placeholder="yyyy-mm-dd" type="text" value="<?php echo $TrialInfo['trnfharvestenddate']; ?>" disabled="true">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="panel panel-default">
                                    <div class="panel-heading Title1" style="color:#595959;">Varieties</div>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr style="background: #EEEEEE;">
                                                <th>Name</th>
                                                <th>Origin</th>
                                                <th>Synonymous</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo GetVariety($id_trialinfo); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="panel panel-default">
                                    <div class="panel-heading Title1" style="color:#595959;">Variables Measured</div>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr style="background: #EEEEEE;">
                                                <th>Name</th>
                                                <th>Trait class</th>
                                                <th>Definition</th>
                                                <th>Unit</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo GetVariablesMeasured($id_trialinfo); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="panel panel-default" style="margin-bottom: 0px;">
                                    <div class="panel-heading Title1" style="color:#595959;">Data Information</div>
                                    <div class="panel-body" style="padding-top: 15px; padding-bottom: 5px; padding-left: 0px; background: #EEEEEE;">
                                        <?php if ($TrialInfo['trnfdatafile'] != '') { ?>

                                            <div class="col-sm-12 form-group control-type-text">
                                                <div class="col-sm-3">Data:</div>
                                                <div class=" col-sm-4 control-type-text">
                                                    <span class="Span-Action-Link" name="Download" id="Download" title="Download Data File" onclick="DownloadFileTrial(<?php echo $id_trial; ?>,<?php echo $TrialInfo['id_crop']; ?>, 'Data File');"><?php echo image_tag("/images/download-icon.png", array('size' => '13x13')); ?> Download</span>
                                                </div>
                                            </div>
                                        <?php } if ($TrialInfo['trnfdataorresultsfile'] != '') { ?>
                                            <div class="col-sm-12 form-group control-type-text">
                                                <div class="col-sm-3">Results File:</div>
                                                <div class=" col-sm-4 control-type-text">
                                                    <span class="Span-Action-Link" name="Download" id="Download" title="Download Results File" onclick="DownloadFileTrial(<?php echo $id_trial; ?>,<?php echo $TrialInfo['id_crop']; ?>, 'Results File');"><?php echo image_tag("/images/download-icon.png", array('size' => '13x13')); ?> Download</span>
                                                </div>
                                            </div>
                                        <?php } if ($TrialInfo['trnfsuppplementalinformationfile'] != '') { ?>
                                            <div class="col-sm-12 form-group control-type-text">
                                                <div class="col-sm-3">Suppplemental Information File:</div>
                                                <div class=" col-sm-4 control-type-text">
                                                    <span class="Span-Action-Link" name="Download" id="Download" title="Download Suppplemental Information File" onclick="DownloadFileTrial(<?php echo $id_trial; ?>,<?php echo $TrialInfo['id_crop']; ?>, 'Suppplemental Information File');"><?php echo image_tag("/images/download-icon.png", array('size' => '13x13')); ?> Download</span>
                                                </div>
                                            </div>
                                        <?php } if ($TrialInfo['trnfweatherdatafile'] != '') { ?>
                                            <div class="col-sm-12 form-group control-type-text">
                                                <div class="col-sm-3">Weather File:</div>
                                                <div class=" col-sm-4 control-type-text">
                                                    <span class="Span-Action-Link" name="Download" id="Download" title="Download Weather File" onclick="DownloadFileTrial(<?php echo $id_trial; ?>,<?php echo $TrialInfo['id_crop']; ?>, 'Weather File');"><?php echo image_tag("/images/download-icon.png", array('size' => '13x13')); ?> Download</span>
                                                </div>
                                            </div>
                                        <?php } if ($TrialInfo['trnfsoildatafile'] != '') { ?>
                                            <div class="col-sm-12 form-group control-type-text">
                                                <div class="col-sm-3">Soil File:</div>
                                                <div class=" col-sm-4 control-type-text">
                                                    <span class="Span-Action-Link" name="Download" id="Download" title="Download Soil File" onclick="DownloadFileTrial(<?php echo $id_trial; ?>,<?php echo $TrialInfo['id_crop']; ?>, 'Soil File');"><?php echo image_tag("/images/download-icon.png", array('size' => '13x13')); ?> Download</span>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <br>
                        <div class="form-group control-type-text">
                            <table class="TableModule">
                                <tr>
                                    <td>Created user:&ensp;</td>
                                    <td>
                                        <?php
                                        $User = Doctrine::getTable('SfGuardUser')->findOneById($form->getObject()->get('id_user'));
                                        echo "{$User->getFirst_name()} {$User->getLast_name()}";
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Created date:&ensp;</td>
                                    <td><?php echo $form->getObject()->get('created_at'); ?></td>
                                </tr>
                                <tr>
                                    <td>Updated date:&ensp;</td>
                                    <td><?php echo $form->getObject()->get('updated_at'); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <?php
                }
            }
            ?>
        </div>

    </div>
</div>
<div class="BotonAcciones">
    <?php include_partial('trial/form_actions', array('tb_trial' => $tb_trial, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</div>
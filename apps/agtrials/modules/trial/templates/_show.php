<?php
$InfoProject = GetInfoProject($form->getObject()->get('id_project'));
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
        <div id="ProjectTrialGroups" class="label ui-helper-clearfix">
            <span class="Title">Project / Trial Groups</span>
        </div>
        <div class="Session">
            <div class="form-group control-type-text">
                <table class="TableModule"> 
                    <tr>
                        <td>Name of the Project:&ensp;</td>
                        <td><div class="ShowField"><?php echo $InfoProject['prjname']; ?></div></td>
                    </tr>
                </table>
            </div>
            <div id="LeadofProject" class="form-group control-type-text Title0">
                <span class="Title1">Project Lead</span>
            </div>
            <hr class="LineModule">

            <div class="form-group control-type-text">
                <table class="TableModule">
                    <tr>
                        <td>Name:</td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName">First name</div>
                            <div class="ShowField"><?php echo $InfoProject['cnprfirstname']; ?></div>
                        </td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName">Middle name</div>
                            <div>
                                <input class="form-control" name="cnprmiddlename" id="cnprmiddlename" type="text" size="36" maxlength="100" value="<?php echo $InfoProject['cnprmiddlename']; ?>" <?php echo $DisabledFieldProject; ?>>
                            </div>
                        </td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName">Last name</div>
                            <div><input class="form-control" name="cnprlastname" id="cnprlastname" type="text" size="36" maxlength="100" value="<?php echo $InfoProject['cnprlastname']; ?>" <?php echo $DisabledFieldProject; ?>></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Institution:</td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName">Name</div>
                            <div>
                                <input name="id_institutionleadofproject" id="id_institutionleadofproject" type="hidden" value="<?php echo $InfoProject['id_institutionleadofproject']; ?>">
                                <input class="SearchInput form-control" name="insnameleadofproject" id="insnameleadofproject" type="text" size="36" maxlength="150" value="<?php echo $InfoProject['insnameleadofproject']; ?>" <?php echo $DisabledFieldProject; ?>>
                            </div>
                        </td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName">Country</div>
                            <div>
                                <input name="id_countryinstitutionleadofproject" id="id_countryinstitutionleadofproject" type="hidden" value="<?php echo $InfoProject['id_countryinstitutionleadofproject']; ?>">
                                <input class="SearchInput form-control" name="namecountryinstitutionleadofproject" id="namecountryinstitutionleadofproject" type="text" size="32" maxlength="50" value="<?php echo $InfoProject['namecountryinstitutionleadofproject']; ?>" <?php echo $DisabledFieldProject; ?>>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div><input class="EmailInput form-control" name="cnpremail" id="cnpremail" type="text" size="36" maxlength="150" value="<?php echo $InfoProject['cnpremail']; ?>" onblur="ValidaEmail(this);" <?php echo $DisabledFieldProject; ?>></div>
                        </td>
                    </tr>
                    <tr>
                        <td> Telephone:</td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div><input class="PhoneInput form-control" name="cnprtelephone" id="cnprtelephone" type="text" size="36" maxlength="20" value="<?php echo $InfoProject['cnprtelephone']; ?>" <?php echo $DisabledFieldProject; ?>></div>
                        </td>
                    </tr>
                </table>
            </div>







        </div>
    </div>
</div>
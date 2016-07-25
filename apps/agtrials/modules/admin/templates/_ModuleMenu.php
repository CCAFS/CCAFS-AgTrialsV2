<?php
require_once '../lib/functions/function.php';
$id_user = sfContext::getInstance()->getUser()->getGuardUser()->getId();

$Modulo = sfContext::getInstance()->getRequest()->getParameterHolder()->get('module');
if ($Modulo == 'contactperson')
    $Selectedcontactperson = "selected";
if ($Modulo == 'crop')
    $Selectedcrop = "selected";
if ($Modulo == 'donor')
    $Selecteddonor = "selected";
if ($Modulo == 'experimentaldesign')
    $Selectedexperimentaldesign = "selected";
if ($Modulo == 'institution')
    $Selectedinstitution = "selected";
if ($Modulo == 'admin')
    $Selectedmodulehelp = "selected";
if ($Modulo == 'project')
    $Selectedproject = "selected";
if ($Modulo == 'rolecontactperson')
    $Selectedrolecontactperson = "selected";
if ($Modulo == 'traitclass')
    $Selectedtraitclass = "selected";
if ($Modulo == 'triallocation')
    $Selectedtriallocation = "selected";
if ($Modulo == 'variablesmeasured')
    $Selectedvariablesmeasured = "selected";
if ($Modulo == 'variety')
    $Selectedvariety = "selected";
if ($Modulo == 'sfGuardUser')
    $SelectedUsers = "selected";
?>
<div class="MenuTrials">
    <span style="font-size:16px; font-weight: bold;  padding-left: 35px;">Database Tables</span>
    <div onclick="window.location.href = '/contactperson'" class="MenuButtonLeft <?php echo $Selectedcontactperson; ?>"> Contact person </div>
    <div onclick="window.location.href = '/crop'" class="MenuButtonLeft <?php echo $Selectedcrop; ?>"> Crop </div>
    <div onclick="window.location.href = '/donor'" class="MenuButtonLeft <?php echo $Selecteddonor; ?>"> Donor </div>
    <div onclick="window.location.href = '/experimentaldesign'" class="MenuButtonLeft <?php echo $Selectedexperimentaldesign; ?>"> Experimental design </div>
    <div onclick="window.location.href = '/institution'" class="MenuButtonLeft <?php echo $Selectedinstitution; ?>"> Institution </div>
    <div onclick="window.location.href = '/modulehelp'" class="MenuButtonLeft <?php echo $Selectedmodulehelp; ?>"> Module help </div>
    <div onclick="window.location.href = '/project'" class="MenuButtonLeft <?php echo $Selectedproject; ?>"> Project </div>
    <div onclick="window.location.href = '/rolecontactperson'" class="MenuButtonLeft <?php echo $Selectedrolecontactperson; ?>"> Role contact person </div>
    <div onclick="window.location.href = '/traitclass'" class="MenuButtonLeft <?php echo $Selectedtraitclass; ?>"> Trait class </div>
    <div onclick="window.location.href = '/triallocation'" class="MenuButtonLeft <?php echo $Selectedtriallocation; ?>"> Trial location </div>
    <div onclick="window.location.href = '/variablesmeasured'" class="MenuButtonLeft <?php echo $Selectedvariablesmeasured; ?>"> Variables measured </div>
    <div onclick="window.location.href = '/variety'" class="MenuButtonLeft <?php echo $Selectedvariety; ?>"> Variety </div>
    <?php if (CheckUserPermission($id_user, 1)) { ?>
        <div onclick="window.location.href = '/sfGuardUser'" class="MenuButtonLeft <?php echo $SelectedUsers; ?>"> Users </div>
    <?php } ?>
</div>
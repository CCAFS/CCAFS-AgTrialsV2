<?php
$Modulo = sfContext::getInstance()->getRequest()->getParameterHolder()->get('module');
$Action = sfContext::getInstance()->getRequest()->getParameterHolder()->get('action');
if ($Modulo == 'variablesmeasured' && $Action == 'checkvariablesmeasured')
    $selectedcheckvariablesmeasured = "selected-a";
if ($Modulo == 'variablesmeasured' && $Action == 'checkbatchvariablesmeasured')
    $selectedcheckbatchvariablesmeasured = "selected-a";
?>
<?php echo ModuleHelp('Explore and verify - Variables measured'); ?>
<span class="Title">Explore and verify - Variables measured</span>
<div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
    <fieldset>
        <div class="row RowDownloadTemplate">
            <div onclick="window.location.href = '/checkvariablesmeasured'" class="DownloadTemplate">
                <img width="60" height="50" border="0" src="/images/document-check-icon.png">
                <div class="<?php echo $selectedcheckvariablesmeasured; ?>">&ensp;&ensp;Simple: on the database&ensp;&ensp;</div>
            </div>
            <div onclick="window.location.href = '/checkbatchvariablesmeasured'" class="DownloadTemplate">
                <img width="60" height="50" border="0" src="/images/database-check-icon.png">
                <div class="<?php echo $selectedcheckbatchvariablesmeasured; ?>">&ensp;&ensp;Multiple: on the batch&ensp;&ensp;</div>
            </div>
        </div>
    </fieldset>
</div> 
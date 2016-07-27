<?php
$Modulo = sfContext::getInstance()->getRequest()->getParameterHolder()->get('module');
$Action = sfContext::getInstance()->getRequest()->getParameterHolder()->get('action');
if ($Modulo == 'variety' && $Action == 'checkvariety')
    $selectedcheckvariety = "selected-a";
if ($Modulo == 'variety' && $Action == 'checkbatchvariety')
    $selectedcheckbatchvariety = "selected-a";
?>
<?php echo ModuleHelp('Explore and verify - Variety'); ?>
<span class="Title">Explore and verify - Variety</span>
<div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
    <fieldset>
        <div class="row RowDownloadTemplate">
            <div onclick="window.location.href = '/checkvariety'" class="DownloadTemplate">
                <img width="60" height="50" border="0" src="/images/document-check-icon.png">
                <div class="<?php echo $selectedcheckvariety; ?>">&ensp;&ensp;Simple: on the database&ensp;&ensp;</div>
            </div>
            <div onclick="window.location.href = '/checkbatchvariety'" class="DownloadTemplate">
                <img width="60" height="50" border="0" src="/images/database-check-icon.png">
                <div class="<?php echo $selectedcheckbatchvariety; ?>">&ensp;&ensp;Multiple: on the batch&ensp;&ensp;</div>
            </div>
        </div>
    </fieldset>
</div> 
<?php
$Modulo = sfContext::getInstance()->getRequest()->getParameterHolder()->get('module');
$Action = sfContext::getInstance()->getRequest()->getParameterHolder()->get('action');
if ($Modulo == 'triallocation' && $Action == 'checktriallocation')
    $selectedchecktriallocation = "selected-a";
if ($Modulo == 'triallocation' && $Action == 'checkbatchtriallocation')
    $selectedcheckbatchtriallocation = "selected-a";
?>

<span class="Title">Explore and verify - Trial Location</span>
<div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
    <fieldset>
        <div class="row RowDownloadTemplate">
            <div onclick="window.location.href = '/checktriallocation'" class="DownloadTemplate">
                <img width="60" height="50" border="0" src="/images/document-check-icon.png">
                <div class="<?php echo $selectedchecktriallocation; ?>">&ensp;&ensp;Simple: on the database&ensp;&ensp;</div>
            </div>
            <div onclick="window.location.href = '/checkbatchtriallocation'" class="DownloadTemplate">
                <img width="60" height="50" border="0" src="/images/database-check-icon.png">
                <div class="<?php echo $selectedcheckbatchtriallocation; ?>">&ensp;&ensp;Multiple: on the batch&ensp;&ensp;</div>
            </div>
        </div>
    </fieldset>
</div>
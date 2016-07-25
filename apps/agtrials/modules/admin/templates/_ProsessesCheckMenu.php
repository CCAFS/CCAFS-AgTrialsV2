<?php
$Modulo = sfContext::getInstance()->getRequest()->getParameterHolder()->get('module');
if ($Modulo == 'triallocation')
    $selectedtriallocation = "selected-a";
if ($Modulo == 'variablesmeasured')
    $selectedvariablesmeasured = "selected-a";
if ($Modulo == 'variety')
    $selectedvariety = "selected-a";
?>
<div class="MenuTrials">
    <div onclick="window.location.href = '/batchuploadanother'" class="MenuTrialsButton"> Batch uploads </div>
    <div onclick="window.location.href = '#'" class="MenuTrialsButton selected"> Explore and verify
        <ul class="subMenu">
            <li><a class="page-scroll <?php echo $selectedtriallocation; ?>" href="#" onclick="window.location.href = '/checktriallocation'">Trial location</a></li>
            <li><a class="page-scroll <?php echo $selectedvariablesmeasured; ?>" href="#" onclick="window.location.href = '/checkvariablesmeasured'">Variables measured</a></li>
            <li><a class="page-scroll <?php echo $selectedvariety; ?>" href="#" onclick="window.location.href = '/checkvariety'">Variety</a></li>
        </ul>
    </div>
</div>
<div class="row HomePart1">
    <div class="container row HomeButtons">
        <div class="HomeButton"> 
            <div class="button" onclick="window.location.href = '/searchtrials'"> 
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search Trials
            </div>
            <span class="HomeButtonText">Text AgTrials Test</span>
        </div>
        <div class="HomeButton" style=""> 
            <div class="button" onclick="window.location.href = '/trial/new'">             
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Add New Trial
            </div>
            <span class="HomeButtonText">Text</span>        
        </div>
        <div class="HomeButton" style=""> 
            <div class="button" onclick="window.location.href = '/batchuploadtrials'">             
                <span class="glyphicon glyphicon-open" aria-hidden="true"></span>Upload Batch of Trials
            </div>
            <span class="HomeButtonText">Text</span>        
        </div>
    </div>
</div>

<div class="row HomePart2">
    <div class="container">
        <div class="HomePart2Div">
            <h1 class="HomeTit">What is AgTrials?</h1>
            <p class="WhatAgTrialsTex">Agtrials.org is an information portal developed by the CGIAR Research Program on Climate Change, Agriculture and Food Security (CCAFS) which provides access to a database on the performance of agricultural technologies at sites across the developing world. It builds on decades of evaluation trials, mostly of varieties, but includes any agricultural technology for developing world farmers. </p> 
        </div>
        <div class="HomePart2Map">
            <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="/home/mapindex"></iframe>
        </div>     
    </div>
</div>

<div class="row HomePart3">
    <div class="container HomePart31">
        <span class="HomeTit">What you can do</span><br>
        <div class="row HomeBoxs">   
            <div class="HomeBox" style="margin-left: 35px;" onclick="window.location.href = '/#'"> Share data and information on evaluations of agricultural technology.</div>
            <div class="HomeBox" style="margin-left: 30px;" onclick="window.location.href = '/#'"> Acquire agricultural evaluation date sets for your own research.</div>
            <div class="HomeBox" style="margin-left: 30px;" onclick="window.location.href = '/#'"> Explore the geographic dimensions of agricultural evaluation.</div>
        </div>
    </div>
</div>

<div class="row HomePart4">
    <div class="row HomePart41">
        <span class="HomeTit">Latest Trials</span><br>
        <div class="LatestTrials" onclick="window.location.href = '/trial/<?php echo $Trials[1]['id']; ?>'">  
            <div class="IconTrial"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></div>
            <span class="NameTrial"><?php echo CutString($Trials[1]['name'], 50); ?></span><br>
            <span class="DateLocationTrial"><?php echo $Trials[1]['date'] . " " . $Trials[1]['location']; ?></span>
        </div>
        <div class="LatestTrials" style="margin-left: 15px;" onclick="window.location.href = '/trial/<?php echo $Trials[2]['id']; ?>'">  
            <div class="IconTrial"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></div>
            <span class="NameTrial"><?php echo CutString($Trials[2]['name'], 50); ?></span><br>
            <span class="DateLocationTrial"><?php echo $Trials[2]['date'] . " " . $Trials[2]['location']; ?></span>
        </div>
    </div>
    <div class="row HomePart41">
        <div class="LatestTrials" onclick="window.location.href = '/trial/<?php echo $Trials[3]['id']; ?>'">  
            <div class="IconTrial"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></div>
            <span class="NameTrial"><?php echo CutString($Trials[3]['name'], 50); ?></span><br>
            <span class="DateLocationTrial"><?php echo $Trials[3]['date'] . " " . $Trials[3]['location']; ?></span>
        </div>
        <div class="LatestTrials" style="margin-left: 15px;" onclick="window.location.href = '/trial/<?php echo $Trials[4]['id']; ?>'">  
            <div class="IconTrial"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></div>
            <span class="NameTrial"><?php echo CutString($Trials[4]['name'], 50); ?></span><br>
            <span class="DateLocationTrial"><?php echo $Trials[4]['date'] . " " . $Trials[4]['location']; ?></span>
        </div>
    </div>
</div>

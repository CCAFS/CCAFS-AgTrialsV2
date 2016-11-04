<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>

        <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="/jquery-ui-1.11.4/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/js/functions.js"></script>
        <script type="text/javascript" src="/js/searchtrials.js"></script>

        <link rel="stylesheet" type="text/css" media="screen" href="/bootstrapAdminThemePlugin/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap-personalized.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" />
        <body>
            <header>
                <div class="container" onclick="window.location.href = '/'">
                    <div class="row">
                        <div class="LogoAgTrias">AgTrials</div>
                    </div>
                </div>
            </header>
            <header class="Menu1">
                <div class="container">
                    <div class="row MenuPPl"><div id="Home" class="MenuPPlOpc ">&ensp;</div></div>
                </div>
            </header>
            <div class="container">
                <div class="alert alert-info alert-dismissible fade in" role="alert" style="margin-top: 10px;"><span style="font-size: 1.7em;color: #8a8a8a;" class="glyphicon glyphicon-info-sign pull-left">&ensp;</span>Each link contains a maximum of 100 trials with data.</p><div class="clearfix"></div></div>
                <input type="hidden" name="Listdownloaded" id="Listdownloaded" value=""/>
                <div class="row" style="padding-top: 15px;">
                    <?php
                    $Tmp = 100;
                    for ($a = 1; $a <= $Cursormax; $a++) {
                        $Ini = $Tmp - 99;
                        $Fin = $Tmp;
                        if ($a == $Cursormax)
                            $Fin = $Count;
                        $Downloaddata = "$Ini-$Fin";
                        $Tmp = $Tmp + 100;
                        ?>
                        <div id="DivDownloaddatapart<?php echo $a; ?>" class=" col-sm-4 control-type-text">
                            <span id="SpanDownloaddatapart<?php echo $a; ?>" class="Span-Action-Link" title="Download data (<?php echo $Downloaddata; ?> trials)" onclick="Downloaddatapart(<?php echo $a; ?>,<?php echo $Cursormax; ?>);">Download data (<?php echo $Downloaddata; ?> trials)</span>
                            <div style="font-size: 12px; font-weight: bold;" id="Downloading<?php echo $a; ?>"></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <br>
        </body>
    </head>
</html>
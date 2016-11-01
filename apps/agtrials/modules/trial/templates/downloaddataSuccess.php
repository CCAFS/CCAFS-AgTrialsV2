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
                <div class="alert alert-info alert-dismissible fade in" role="alert" style="margin-top: 10px;"><span style="font-size: 1.7em;color: #8a8a8a;" class="glyphicon glyphicon-info-sign pull-left">&ensp;</span><p>Each <b>Download data part</b> contains 100 folders maximum with information from each trial.</p><div class="clearfix"></div></div>
                <div class="row" style="padding-top: 15px;">
                    <?php for ($a = 1; $a <= $Cursormax; $a++) { ?>
                        <div class=" col-sm-4 control-type-text">
                            <span class="Span-Action-Link" title="Download data part <?php echo $a; ?>" onclick="Downloaddatapart(<?php echo $a; ?>);"><img src="/images/download-icon.png" width="13" height="13"> Download data part <?php echo $a; ?></span>
                            <span id="Downloading<?php echo $a; ?>"></span>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </body>
    </head>
</html>
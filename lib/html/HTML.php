<?php
/*
 *  This file is part of AgTrials
 *
 *  AgTrials is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  at your option) any later version.
 *
 *  AgTrials is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with DMSP.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Copyright 2012 (C) Climate Change, Agriculture and Food Security (CCAFS)
 * 
 * Created on : OCT - 2014
 * @author    :  Herlin R. Espinosa G. - herlin25@gmail.com
 * @version   :  ~
 */

if (sfContext::getInstance()->getUser()->isAuthenticated()) {
    $id_user = sfContext::getInstance()->getUser()->getGuardUser()->getId();
    $Username = sfContext::getInstance()->getUser()->getUsername();
    $CompleteName = sfContext::getInstance()->getUser()->getAttribute('CompleteName');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="title" content="The Global Agricultural Trial Repository - CGIAR - CCAFS - CIAT" />
<meta name="description" content="The Global Agricultural Trial Repository" />
<meta name="keywords" content="Trials, Sites, Bibliography, CGIAR, CCAFS, CIAT" />
<meta name="language" content="en" />
<meta name="robots" content="index, follow" />
<title>The Global Agricultural Trial Repository - CGIAR - CCAFS - CIAT</title>
<script type="text/javascript" src="/js/jquery-ui-1.11.3/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/bootstrapAdminThemePlugin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/jquery.alerts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/jquery.alerts/jquery.alerts.mod.js"></script>
<script type="text/javascript" src="/js/functions.js"></script>
<script type="text/javascript" src="/js/modulesvalidate.js"></script>
<script type="text/javascript" src="/js/batchuploadtrials.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="/bootstrapAdminThemePlugin/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/jquery-ui-1.11.4/jquery-ui.min.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/jquery.alerts/jquery.alerts.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap-personalized.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" />
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <link rel="shortcut icon" href="/images/favicon.ico" />
        <script type="text/javascript">
            $(document).ready(function () {
                $("#navmenu-h li,#navmenu-v li").hover(function () {
                    $(this).addClass("iehover");
                }, function () {
                    $(this).removeClass("iehover");
                });
            });
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-22429807-1']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

        </script>
        <style type="text/css">
            .Banner{
                font-family: Verdana;
                font-weight:bold;
                text-align: center;
                font-size:25px;
                width: 970px;
            }

            .Cuerpo {
                border-collapse:collapse;
                border:0px solid #B9E895;
                top: 50%;
                left: 50%;
                width: 90%;
                height: 10%;
                margin: auto;
                text-align: center;
                width: 950px;
            }

            .Forma {
                margin-left: auto;
                margin-right: auto;
                text-align: center;
                width: 80%;
            }

            .TRTDCenter {
                margin-left: auto;
                margin-right: auto;
                text-align: center;
            }

            .TRTDLeft {
                margin-left: auto;
                margin-right: auto;
                text-align: left;
            }



            .Buttons{
                margin-left: auto;
                margin-right: auto;
                text-align: center;
                width: 15%;
            }

            .Pie {
                width: 970px;
                text-align: center;
                margin: 0 auto;
                font-size:11;
            }

        </style>
    </head>
    <body>
        <style type="text/css">
            .ProgressBar { width: 22em; height: 3.5em; border: 1px solid black; background: #CEDAC0; display: block; }
            .ProgressBarText { width: 305px; height: 3.5em; position: absolute; font-size: 13px; color: #000000; font-family: Verdana; font-weight:bold; text-align: center; font-weight: normal; }
            .ProgressBarFill { height: 3.5em; background: #86A273; display: block; overflow: visible; }
            .FinishedProcess { font-size: 13px; color: red; font-family: Verdana; font-weight:bold; text-align: center;}
        </style>
        <header>
            <div class="container">
                <div class="row">
                    <div class="LogoAgTrias">AgTrials</div>
                    <div class="LogoNombre">The Global Agricultural Trial Repository and Database</div>
                    <div class="LogoCCAFS"><img width="293" height="90" border="0" src="/images/ccafs1.png"></div>
                </div>
            </div>
        </header>
        <header class="Menu1">
            <div class="container">
                <div class="row MenuPPl">
                    <div onclick="window.location.href = '/home'" class="MenuPPlOpc " id="Home">Home</div>
                    <div onclick="window.location.href = '/about'" class="MenuPPlOpc ">About Us</div>
                    <div onclick="window.location.href = '/trial/new'" class="MenuPPlOpc ">Trial</div>
                    <div onclick="window.location.href = '/batchuploadanother'" class="MenuPPlOpc selected">Processes</div>
                    <div onclick="window.location.href = '/statistics'" class="MenuPPlOpc ">Statistics</div>
                    <div onclick="window.location.href = '/contact'" class="MenuPPlOpc ">Contact Us</div>
                    <div class="MenuPPlOpcUser">
                        <ul class="nav navbar-nav navbar-right">
                            <?php if (sfContext::getInstance()->getUser()->isAuthenticated()) { ?>
                                <li class="dropdown" id="fat-menu">
                                    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" id="drop3">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $CompleteName; ?><span class="caret"></span>
                                    </a>
                                    <ul aria-labelledby="drop3" class="dropdown-menu">
                                        <li><a href="/user">Profile</a></li>
                                        <li><a href="/changepassword">Change password</a></li>
                                        <li><a href="http://gisweb.ciat.cgiar.org/trialsitesblog/wp-login.php" target="_blank">Login Blog</a></li>
                                        <li class="divider" role="separator"></li>
                                        <li><a href="/logout">Log Out</a></li>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="/login">
                                        <span class="glyphicon glyphicon-share-alt"></span>
                                        Sign In
                                    </a>
                                </li>
                                <li>
                                    <a href="/register">
                                        <span class="glyphicon glyphicon-user"></span>
                                        Sign Up
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <?php
            //AQUI LLAMAMOS LA FORMA PARA EL ERROR -> TrialFileErrorZip
            if ($Forma == "TrialFileErrorZip")
                include("TrialFileErrorZip.php");
            //AQUI LLAMAMOS LA FORMA PARA EL ERROR -> TrialFileErrorZipUncompress
            if ($Forma == "TrialFileErrorZipUncompress")
                include("TrialFileErrorZipUncompress.php");
            //AQUI LLAMAMOS LA FORMA PARA EL ERROR -> TrialFileErrorTemplates
            if ($Forma == "TrialFileErrorTemplates")
                include("TrialFileErrorTemplates.php");
            //AQUI LLAMAMOS LA FORMA PARA EL ERROR -> TrialFileErrorTemplatesCols
            if ($Forma == "TrialFileErrorTemplatesCols")
                include("TrialFileErrorTemplatesCols.php");
            //AQUI LLAMAMOS LA FORMA PARA EL ERROR -> TrialFileErrorTemplatesRecord
            if ($Forma == "TrialFileErrorTemplatesRecord")
                include("TrialFileErrorTemplatesRecord.php");
            //AQUI LLAMAMOS LA FORMA PARA EL ERROR -> TrialBody
            if ($Forma == "TrialBody")
                include("TrialBody.php");

            //AQUI LLAMAMOS LA FORMA PARA EL ERROR -> FileErrorTemplates
            if ($Forma == "FileErrorTemplates")
                include("FileErrorTemplates.php");
            //AQUI LLAMAMOS LA FORMA PARA EL ERROR -> FileErrorTemplatesCols
            if ($Forma == "FileErrorTemplatesCols")
                include("FileErrorTemplatesCols.php");
            //AQUI LLAMAMOS LA FORMA PARA EL ERROR -> FileErrorTemplatesRecords
            if ($Forma == "FileErrorTemplatesRecords")
                include("FileErrorTemplatesRecords.php");
            //AQUI LLAMAMOS LA FORMA GENERAL -> Body
            if ($Forma == "Body")
                include("Body.php");

            //AQUI LLAMAMOS LA FORMA PARA EL ERROR -> FileErrorCheckTemplates
            if ($Forma == "FileErrorCheckTemplates")
                include("FileErrorCheckTemplates.php");
            //AQUI LLAMAMOS LA FORMA PARA EL ERROR -> FileErrorCheckTemplatesCols
            if ($Forma == "FileErrorCheckTemplatesCols")
                include("FileErrorCheckTemplatesCols.php");
            //AQUI LLAMAMOS LA FORMA PARA EL ERROR -> FileErrorCheckTemplatesRecords
            if ($Forma == "FileErrorCheckTemplatesRecords")
                include("FileErrorCheckTemplatesRecords.php");
            //AQUI LLAMAMOS LA FORMA GENERAL -> BodyCheck
            if ($Forma == "BodyCheck")
                include("BodyCheck.php");
            ?>
        </div>
        <footer>
            <div class="container">
                <p>
                    Please report any system problems and send us your feedback here. </br>
                    @ Copyright 2016 </br>
                    Current version 2.0 
                </p>
                </br>
                <h4 class="our-partners-title">Our partners</h4>
                <div class="FooterPartners"> 
                    <div class="partner-logo"><img alt="CIAT" src="/images/logos/logo_01.png"></div>
                    <div class="partner-logo"><img alt="CIP" src="/images/logos/logo_02.png"></div>
                    <div class="partner-logo"><img alt="ICARDA" src="/images/logos/logo_03.png"></div>
                    <div class="partner-logo"><img alt="ILRI" src="/images/logos/logo_04.png"></div>
                    <div class="partner-logo"><img alt="IRRI" src="/images/logos/logo_05.png"></div>
                    <div class="partner-logo"><img alt="Bioversity" src="/images/logos/logo_06.png"></div>
                    <div class="partner-logo"><img alt="Africa Rice" src="/images/logos/logo_07.png"></div>
                    <div class="partner-logo"><img alt="IITA" src="/images/logos/logo_08.png"></div>
                    <div class="partner-logo"><img alt="CIMMYT" src="/images/logos/logo_09.png"></div>
                    <div class="partner-logo"><img alt="ICRISAT" src="/images/logos/logo_10.png"></div>
                    <div class="partner-logo"><img alt="" src="/images/logos/logo_11.png"></div>
                </div>  
            </div>
        </footer>
    </body>
</html>


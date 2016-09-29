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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <link rel="shortcut icon" href="/images/favicon.ico" />
        <meta http-equiv="content-type" content="text/html" />
        <meta name="title" content="The Global Agricultural Trial Repository - CGIAR - CCAFS - CIAT" />
        <meta name="description" content="The Global Agricultural Trial Repository" />
        <meta name="keywords" content="Trial, Site, Bibliography, CGIAR, CCAFS, CIAT, Crop, Technology, Variety/Race, Variables measured" />
        <meta name="language" content="en" />
        <meta name="robots" content="index, follow" />
        <title>The Global Agricultural Trial Repository - CGIAR - CCAFS - CIAT</title>
        <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="/bootstrapAdminThemePlugin/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="/jquery-ui-1.11.4/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/jQueryModalAlert/modal-alerts.js"></script>
        <script type="text/javascript" src="/jqueryConfirm/jquery-confirm.min.js"></script>
        <script type="text/javascript" src="/datatables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="/autocomplete/autocomplete.js"></script>
        <script type="text/javascript" src="/js/functions.js"></script>
        <script type="text/javascript" src="/js/modulesvalidate.js"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="/bootstrapAdminThemePlugin/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/jquery-ui-1.11.4/jquery-ui.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/bootstrapAdminThemePlugin/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/jQueryModalAlert/modal-alerts.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/jqueryConfirm/jquery-confirm.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/datatables/jquery.dataTables.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/autocomplete/autocomplete.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap-personalized.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="/css/main.css" />
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
        <!-- Add IntroJs styles -->
        <link href="/intro.js-2.2.0/minified/introjs.min.css" rel="stylesheet">
    </head>
    <body> 
        <header >
            <div class="container">
                <div class="row">
                    <div class="LogoAgTrias">AgTrials</div>
                    <div class="LogoNombre">The Global Agricultural Trial Repository and Database</div>
                    <div class="LogoCCAFS"><img border="0" width="293" height="90" src="/images/ccafs1.png"/></div>
                </div>
            </div>
        </header>
        <header class="Menu1">
            <div class="container">
                <div class="row MenuPPl">
                    <div id="Home" class="MenuPPlOpc selected" onclick="window.location.href = '/home'">Home</div>
                    <div class="MenuPPlOpc " onclick="window.location.href = '/about'">About Us</div>
                    <div class="MenuPPlOpc " onclick="window.location.href = '/searchtrials'">Trial</div>
                    <div class="MenuPPlOpc " onclick="window.location.href = '/batchuploadanother'">Processes</div>
                    <div class="MenuPPlOpc " onclick="window.location.href = '/contactperson'">Database</div>
                    <div class="MenuPPlOpc " onclick="window.location.href = '/statistics'">Statistics</div>
                    <div class="MenuPPlOpc " onclick="window.location.href = '/contact'">Contact Us</div>
                    <div class="MenuPPlOpcUser">
                        <ul class="nav navbar-nav navbar-right">
                            <?php if (sfContext::getInstance()->getUser()->isAuthenticated()) { ?>
                                <li class="dropdown" id="fat-menu">
                                    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" id="drop3">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true">&ensp;</span><?php echo $CompleteName; ?><span class="caret"></span>
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
            <style type="text/css">
                .control-type-date select {width:auto;}
            </style>  

            <div class="row">
                <div class="col-md-2 left-column">
                    <div class="MenuTrials">
                        <span style="font-size:16px; font-weight: bold;  padding-left: 30px;">Database Tables</span>
                        <div onclick="window.location.href = '/contactperson'" class="MenuButtonLeft "> Contact person </div>
                        <div onclick="window.location.href = '/crop'" class="MenuButtonLeft "> Crop </div>
                        <div onclick="window.location.href = '/donor'" class="MenuButtonLeft "> Donor </div>
                        <div onclick="window.location.href = '/experimentaldesign'" class="MenuButtonLeft "> Experimental design </div>
                        <div onclick="window.location.href = '/fieldhelp'" class="MenuButtonLeft "> Field help </div>
                        <div onclick="window.location.href = '/institution'" class="MenuButtonLeft "> Institution </div>
                        <div onclick="window.location.href = '/modulehelp'" class="MenuButtonLeft "> Module help </div>
                        <div onclick="window.location.href = '/project'" class="MenuButtonLeft "> Project </div>
                        <div onclick="window.location.href = '/rolecontactperson'" class="MenuButtonLeft "> Role contact person </div>
                        <div onclick="window.location.href = '/traitclass'" class="MenuButtonLeft "> Trait class </div>
                        <div onclick="window.location.href = '/triallocation'" class="MenuButtonLeft "> Trial location </div>
                        <div onclick="window.location.href = '/variablesmeasured'" class="MenuButtonLeft "> Variables measured </div>
                        <div onclick="window.location.href = '/variety'" class="MenuButtonLeft selected"> Variety </div>
                        <div onclick="window.location.href = '/sfGuardUser'" class="MenuButtonLeft "> Users </div>
                    </div>    </div>
                <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
                    <span class="Title">Error</span>
                </div>
            </div>              
        </div>
        <footer>
            <div class="container">
                <p>
                    Please report any system problems and send us your feedback here. <br/>
                    @ Copyright 2016 <br/>
                    Current version 2.0 
                </p>
                <br />
                <h4 class="our-partners-title">Our partners</h4>
                <div class="FooterPartners"> 
                    <div class="partner-logo"><img src="/images/logos/logo_09.png" alt="CIMMYT" /></div>
                    <div class="partner-logo"><img src="/images/logos/logo_01.png" alt="CIAT" /></div>
                    <div class="partner-logo"><img src="/images/logos/logo_08.png" alt="IITA" /></div>
                    <div class="partner-logo"><img src="/images/logos/logo_10.png" alt="ICRISAT" /></div>
                    <div class="partner-logo"><img src="/images/logos/logo_05.png" alt="IRRI" /></div>
                    <div class="partner-logo"><img src="/images/logos/logo_02.png" alt="CIP" /></div>
                    <div class="partner-logo"><img src="/images/logos/logo_03.png" alt="ICARDA" /></div>
                    <div class="partner-logo"><img src="/images/logos/logo_04.png" alt="ILRI" /></div>
                    <div class="partner-logo"><img src="/images/logos/logo_06.png" alt="Bioversity" /></div>
                    <div class="partner-logo"><img src="/images/logos/logo_07.png" alt="Africa Rice" /></div>
                    <div class="partner-logo"><img src="/images/logos/logo_11.png" alt="" /></div>
                </div>        
            </div>
        </footer>
    </body>
</html>
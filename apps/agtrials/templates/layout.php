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

$Modulos = array('contactperson', 'crop', 'donor', 'experimentaldesign', 'institution', 'project', 'rolecontactperson', 'traitclass', 'triallocation', 'variablesmeasured', 'variety', 'sfGuardUser', 'admin');
$Actions = array('index', 'new', 'edit', 'modulehelp', 'fieldhelp');
$ActionProsesses = array('batchuploadanother', 'checktriallocation', 'checkbatchtriallocation', 'checkvariablesmeasured', 'checkbatchvariablesmeasured', 'checkvariety', 'checkbatchvariety');

$Container = true;
$Modulo = sfContext::getInstance()->getRequest()->getParameterHolder()->get('module');
$Action = sfContext::getInstance()->getRequest()->getParameterHolder()->get('action');
if (($Modulo == 'home') && ($Action == 'index')) {
    $Home = "selected";
    $Container = false;
}
if ($Modulo == 'trial')
    $Trial = "selected";
if ((in_array($Action, $ActionProsesses)))
    $Processes = "selected";
if (($Modulo == 'home') && ($Action == 'about'))
    $About = "selected";
if (($Modulo == 'home') && ($Action == 'statistics'))
    $Statistics = "selected";
if (($Modulo == 'home') && ($Action == 'contact'))
    $Contact = "selected";
if (in_array($Modulo, $Modulos) && in_array($Action, $Actions))
    $Modules = "selected";

if ($sf_user->isAuthenticated()) {
    $id_user = sfContext::getInstance()->getUser()->getGuardUser()->getId();
    $Username = sfContext::getInstance()->getUser()->getUsername();
    $CompleteName = sfContext::getInstance()->getUser()->getAttribute('CompleteName');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <link rel="shortcut icon" href="/images/favicon.ico" />
        <?php include_http_metas(); ?>
        <?php include_metas(); ?>
        <?php include_title(); ?>
        <?php include_javascripts(); ?>
        <?php include_stylesheets(); ?>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
        <!-- Add IntroJs styles -->
        <link href="/intro.js-2.2.0/minified/introjs.min.css" rel="stylesheet"/>
        <script type="text/javascript">
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
    </head>
    <body> 
        <header >
            <div class="container" onclick="window.location.href = '/'">
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
                    <div id="Home" class="MenuPPlOpc <?php echo $Home ?>" onclick="window.location.href = '/'">Home</div>
                    <div class="MenuPPlOpc <?php echo $About ?>" onclick="window.location.href = '/about'">About Us</div>
                    <div class="MenuPPlOpc <?php echo $Trial ?>" onclick="window.location.href = '/searchtrials'">Trial</div>
                    <?php if ($sf_user->isAuthenticated()) { ?>
                        <div class="MenuPPlOpc <?php echo $Processes ?>" onclick="window.location.href = '/batchuploadanother'">Processes</div>
                        <div class="MenuPPlOpc <?php echo $Modules ?>" onclick="window.location.href = '/contactperson'">Database</div>
                    <?php } ?>
                    <div class="MenuPPlOpc <?php echo $Statistics ?>" onclick="window.location.href = '/statistics'">Statistics</div>
                    <div class="MenuPPlOpc <?php echo $Contact ?>" onclick="window.location.href = '/contact'">Contact Us</div>
                    <div class="MenuPPlOpcUser">
                        <ul class="nav navbar-nav navbar-right">
                            <?php if ($sf_user->isAuthenticated()) { ?>
                                <li class="dropdown" id="fat-menu">
                                    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" id="drop3">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true">&ensp;</span><?php echo $CompleteName; ?><span class="caret"></span>
                                    </a>
                                    <ul aria-labelledby="drop3" class="dropdown-menu">
                                        <li><a href="/user">Profile</a></li>
                                        <li><a href="/changepassword">Change password</a></li>
                                        <li><a href="http://blog.agtrials.org/wp-login.php" target="_blank">Login Blog</a></li>
                                        <li><a href="/api">API</a></li>
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
        <?php if ($Container) { ?>
            <div class="container"> 
                <?php echo $sf_content; ?>
            </div>
            <?php
        } else {
            echo $sf_content;
        }
        ?>
        <footer>
            <div class="container">

                <p>
                    Please report any system problems and send us your feedback <a href="/contact" target="_blank">here</a>. <br/>
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
        <!-- Add IntroJs Javascript -->
        <script type="text/javascript" src="/intro.js-2.2.0/minified/intro.min.js"></script>
    </body>
</html>
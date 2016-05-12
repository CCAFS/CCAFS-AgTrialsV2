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
$Container = true;
$Modulo = sfContext::getInstance()->getRequest()->getParameterHolder()->get('module');
$Action = sfContext::getInstance()->getRequest()->getParameterHolder()->get('action');
if (($Modulo == 'home') && ($Action == 'index')) {
    $Home = "style='background : #2a9a60;'";
    $Container = false;
}
if ($Modulo == 'trial') {
    $Trial = "style='background : #2a9a60;'";
    $ContainerWidth = "style=''";
}
if (($Modulo == 'home') && ($Action == 'about'))
    $About = "style='background : #2a9a60;'";
if (($Modulo == 'home') && ($Action == 'statistics'))
    $Statistics = "style='background : #2a9a60;'";
if (($Modulo == 'home') && ($Action == 'contact'))
    $Contact = "style='background : #2a9a60;'";

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
                    <div id="Home" class="MenuPPlOpc" <?php echo $Home ?> onclick="window.location.href = '/home'">Home</div>
                    <div class="MenuPPlOpc" <?php echo $About ?> onclick="window.location.href = '/about'">About Us</div>
                    <div class="MenuPPlOpc" <?php echo $Trial ?> onclick="window.location.href = '/trial/new'">Trial</div>

                    <?php if ($sf_user->isAuthenticated()) { ?>
                        <div class="MenuPPlOpc">
                            <ul class="nav navbar-nav navbar-right" style="margin-right: 0px;">
                                <li class="dropdown" id="fat-menu">
                                    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" id="drop3">
                                        Processes
                                    </a>
                                    <ul aria-labelledby="drop3" class="dropdown-menu">
                                        <li><a href="#">xxx</a></li>
                                        <li><a href="#">xxx</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>

                    <div class="MenuPPlOpc" <?php echo $Statistics ?> onclick="window.location.href = '/statistics'">Statistics</div>
                    <div class="MenuPPlOpc" <?php echo $Contact ?> onclick="window.location.href = '/contact'">Contact Us</div>
                    <div class="MenuPPlOpcUser">
                        <ul class="nav navbar-nav navbar-right">
                            <?php if ($sf_user->isAuthenticated()) { ?>
                                <li class="dropdown" id="fat-menu">
                                    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" id="drop3">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        <?php echo $CompleteName; ?>
                                        <span class="caret"></span>
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

        <?php if ($Container) { ?>
            <div class="container"  <?php echo $ContainerWidth; ?>> 
                <div class=""> 
                    <?php echo $sf_content; ?>
                </div>
            </div>
            <footer>
                <div class="FooterContainer">
                    <span>Please report any system problems and send us your feedback here.</span><br/>
                    <span>@ Copyright 2016</span><br/>
                    <span>Current version 2.0</span>
                </div>
                <div class="FooterPartners"> 
                    <span style="color: #34495e; font-weight: bold;">Our partners</span>
                </div>
            </footer>
            <?php
        } else {
            echo $sf_content;
        }
        ?>


    </body>
</html>

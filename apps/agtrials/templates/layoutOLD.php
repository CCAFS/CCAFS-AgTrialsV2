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
                    <div class="MenuPPlOpc">Home</div>
                    <div class="MenuPPlOpc">About Us</div>
                    <div class="MenuPPlOpc">Trial</div>
                    <div class="MenuPPlOpc">Statistics</div>
                    <div class="MenuPPlOpc">Contact Us</div>
                    <div class="MenuPPlOpcUser">
                        <?php if ($sf_user->isAuthenticated()) { ?>
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?php echo $CompleteName; ?>
                        <?php } else { ?>
                            <span class="glyphicon glyphicon-log-in"></span>
                            Sign in
                            </a>

                        <?php } ?>
                    </div>
                </div>
            </div> 
        </header>
        <div class="container"> 
            <nav class="navbar navbar-default navbar-static" id="navbar-example">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button data-target=".bs-example-js-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="#" class="navbar-brand">AgTrials2</a>
                    </div>
                    <div id="Home" class="collapse navbar-collapse bs-example-js-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="/">
                                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                    Home
                                </a>
                            </li>
                            <?php if ($sf_user->isAuthenticated()) { ?>
                                <li>
                                    <a href="/trial/new">
                                        <span class="glyphicon glyphicon-modal-window"></span>
                                        Trial
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" id="drop2">
                                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                                        Modules
                                        <span class="caret"></span>
                                    </a>
                                    <ul aria-labelledby="drop1" class="dropdown-menu">
                                        <li><a href="/contactperson">Contact person</a></li>
                                        <li><a href="/crop">Crop</a></li>
                                        <li><a href="/donor">Donor</a></li>
                                        <li><a href="/experimentaldesign">Experimental design</a></li>
                                        <li><a href="/institution">Institution</a></li>
                                        <li><a href="/project">Project</a></li>
                                        <li><a href="/rolecontactperson">Role contact person</a></li>
                                        <li><a href="/traitclass">Trait class</a></li>
                                        <li><a href="/triallocation">Trial location</a></li>
                                        <li><a href="/variablesmeasured">Variables measured</a></li>
                                        <li><a href="/variety">Variety</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" id="drop2">
                                        <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                        Processes
                                        <span class="caret"></span>
                                    </a>
                                    <ul aria-labelledby="drop2" class="dropdown-menu">
                                        <li><a target="_blank" href="/checkbatchtriallocation">Check batch trial location</a></li>
                                        <li><a target="_blank" href="/checkbatchvariablesmeasured">Check batch variables measured</a></li>
                                        <li><a target="_blank" href="/checkbatchvariety">Check batch variety</a></li>
                                        <li><a target="_blank" href="/checktriallocation">Check trial location</a></li>
                                        <li><a target="_blank" href="/checkvariablesmeasured">Check variables measured</a></li>
                                        <li><a target="_blank" href="/checkvariety">Check variety</a></li>
                                        <li><a target="_blank" href="/batchuploadtrials">Upload trials</a></li>
                                        <li><a target="_blank" href="/batchuploadproject">Upload project</a></li>
                                        <li><a target="_blank" href="/batchuploadtriallocation">Upload trial location</a></li>
                                        <li><a target="_blank" href="/batchuploadvariablesmeasured">Upload variables measured</a></li>
                                        <li><a target="_blank" href="/batchuploadvariety">Upload variety</a></li>

                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>

                    </div><!-- /.nav-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <div class="container"> 
            <div class="row"> 
                <div class="col-md-12"> 
                    <?php echo $sf_content; ?>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="FooterContainer">
                    Copyright © The CGIAR Research Program on Climate Change, Agriculture and Food Security (<a title="CCAFS" target="_new" href="http://ccafs.cgiar.org/">CCAFS</a>). All rights reserved. <br />&nbsp;
                </div>
            </div>
        </footer>
    </body>
</html>

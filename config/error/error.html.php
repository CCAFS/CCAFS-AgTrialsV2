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
                    <div id="Home" class="MenuPPlOpc " onclick="window.location.href = '/home'">Home</div>
                    <div class="MenuPPlOpc " onclick="window.location.href = '/about'">About Us</div>
                    <div class="MenuPPlOpc " onclick="window.location.href = '/searchtrials'">Trial</div>
                                            <div class="MenuPPlOpc " onclick="window.location.href = '/batchuploadanother'">Processes</div>
                        <div class="MenuPPlOpc selected" onclick="window.location.href = '/contactperson'">Database</div>
                                        <div class="MenuPPlOpc " onclick="window.location.href = '/statistics'">Statistics</div>
                    <div class="MenuPPlOpc " onclick="window.location.href = '/contact'">Contact Us</div>
                    <div class="MenuPPlOpcUser">
                        <ul class="nav navbar-nav navbar-right">
                                                            <li class="dropdown" id="fat-menu">
                                    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#" id="drop3">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true">&ensp;</span>Herlin Espinosa<span class="caret"></span>
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
        <span class="Title">Variety</span>
        <form class="form-horizontal" id="FormVariety" enctype="multipart/form-data" method="post" action="/variety/97604"><input type="hidden" name="sf_method" value="put" />        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <div class="form-group control-type-text" style="margin-left: 0px;">All fields marked with <span class="Mandatory">*</span> are required.</div>
            <input type="hidden" name="tb_variety[id_variety]" value="97604" id="tb_variety_id_variety" /><input type="hidden" name="tb_variety[_csrf_token]" value="7550b4fab2c31ea4068c9aa5b5eae6ec" id="tb_variety__csrf_token" />             
                            <fieldset>

  
                  <div class="form-group control-type-foreignkey control-name-id_crop ">
        <div class="col-sm-2"><span class='Mandatory'>*</span> Crop:</div>
        <div class=" col-sm-4 control-type-foreignkey control-name-id_crop">
                                                <select name="tb_variety[id_crop]" class="form-control" id="tb_variety_id_crop">
<option value=""></option>
<option value="38">Animals</option>
<option value="56">Bambara groundnut</option>
<option value="47">Banana</option>
<option value="13">Barley</option>
<option value="10">Bean common(dry)</option>
<option value="1" selected="selected">Cassava</option>
<option value="37">Cattle</option>
<option value="55">Cattle and mice</option>
<option value="43">Cattle and sheep</option>
<option value="44">Cattle, sheep, goat</option>
<option value="2">Chickpea</option>
<option value="4">Cowpea</option>
<option value="59">Crop allocation</option>
<option value="71">Crotalaria</option>
<option value="48">Durum wheat</option>
<option value="53">Epidemology</option>
<option value="60">Fields</option>
<option value="61">Finger millet</option>
<option value="22">Forage</option>
<option value="21">Forage grass</option>
<option value="41">Gis database</option>
<option value="30">Goat</option>
<option value="51">Grass pea</option>
<option value="66">Groundnut</option>
<option value="72">Jack bean</option>
<option value="69">Lablab</option>
<option value="46">Land</option>
<option value="58">Land use</option>
<option value="50">Lentil</option>
<option value="68">Lima bean</option>
<option value="42">Livestock technologies</option>
<option value="11">Maize</option>
<option value="54">Mice</option>
<option value="65">Millet</option>
<option value="64">Mucuna</option>
<option value="7">Pearl millet</option>
<option value="62">Pigeonpea</option>
<option value="5">Potato</option>
<option value="39">Research</option>
<option value="14">Rice</option>
<option value="28">Sheep</option>
<option value="40">Sheep and goat</option>
<option value="45">Soil</option>
<option value="57">Soil samples</option>
<option value="8">Sorghum</option>
<option value="15">Soybean</option>
<option value="3">Sweet potato </option>
<option value="63">Tephrosia</option>
<option value="70">Velvet bean</option>
<option value="67">Weather</option>
<option value="12">Wheat</option>
<option value="75">Yam</option>
</select>                                    </div>
    </div>
              <div class="form-group control-type-text control-name-vrtorigin ">
        <div class="col-sm-2"><span class='Mandatory'>*</span> Origin:</div>
        <div class=" col-sm-4 control-type-text control-name-vrtorigin">
                                                <input type="text" name="tb_variety[vrtorigin]" value="ssss" class="form-control" id="tb_variety_vrtorigin" />                                    </div>
    </div>
              <div class="form-group control-type-text control-name-vrtname ">
        <div class="col-sm-2"><span class='Mandatory'>*</span> Name:</div>
        <div class=" col-sm-4 control-type-text control-name-vrtname">
                                                <input type="text" name="tb_variety[vrtname]" value="aaaaaaaaaa" class="form-control" id="tb_variety_vrtname" />                                    </div>
    </div>
              <div class="form-group control-type-text control-name-vrtsynonymous ">
        <div class="col-sm-2">Synonymous:</div>
        <div class=" col-sm-4 control-type-text control-name-vrtsynonymous">
                                                <input type="text" name="tb_variety[vrtsynonymous]" value="" class="form-control" id="tb_variety_vrtsynonymous" />                                    </div>
    </div>
              <div class="form-group control-type-text control-name-vrtdescription ">
        <div class="col-sm-2">Description:</div>
        <div class=" col-sm-4 control-type-text control-name-vrtdescription">
                                                <input type="text" name="tb_variety[vrtdescription]" value="" class="form-control" id="tb_variety_vrtdescription" />                                    </div>
    </div>
        
</fieldset>
                    </div>
        <div class="form-actions">
            <a class="btn btn-action pull-right" onclick="if (confirm('Are you sure?')) { var f = document.createElement('form'); f.style.display = 'none'; this.parentNode.appendChild(f); f.method = 'post'; f.action = this.href;var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', 'sf_method'); m.setAttribute('value', 'delete'); f.appendChild(m);var m = document.createElement('input'); m.setAttribute('type', 'hidden'); m.setAttribute('name', '_csrf_token'); m.setAttribute('value', '225ba5b567499722420290c258e747cd'); f.appendChild(m);f.submit(); };return false;" href="/variety/97604"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a><div class="btn-group">
            <a class="btn btn-action" href="/variety"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Back to list</a><button type="submit" class="btn btn-action"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Save</button></div>
        </div>
        </form>
    </div>
</div>              </div>
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
        <!-- Add IntroJs Javascript -->
        <script type="text/javascript" src="/intro.js-2.2.0/minified/intro.min.js"></script>
    </body>
</html>
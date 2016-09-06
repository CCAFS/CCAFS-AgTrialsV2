<?php
if ($sf_user->isAuthenticated()) {
    $sfGuardUser = Doctrine::getTable('sfGuardUser')->findOneBy("Username", sfContext::getInstance()->getUser()->getUsername());
    $sfGuardUserInformation = Doctrine::getTable('sfGuardUserInformation')->findOneByUserId($sfGuardUser->id);
    $key = $sfGuardUserInformation->key;
}
$url = sfContext::getInstance()->getRequest()->getHost();
?>
<script language="JavaScript">
    function muestra_oculta(id) {
        if (document.getElementById) { //se obtiene el id
            var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
            el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
        }
    }
</script>
<div style="margin-top: 10px;">
    <span class="Title">Api</span>
</div>
<div class="Session" style="margin-top: 10px; margin-bottom: 10px; border-bottom-width: 0px; padding: 10px; border-top-width: 10px;">

    <fieldset>
        <div class="col-sm-12 form-group control-type-text">

            <fieldset>
                <div><strong>Key:</strong> Generated key for each user <span><a target="_blank" href="/sfGuardUser/user">View your Key</a></span></div>
                <div><strong>Options:</strong> You can use one or more options separated by '&'</div>
                <div><strong>Values:</strong> You can use one or more values separated by ','</div>
                <div><strong>Value:</strong> You can use only one value numeric</div>
                <div><strong>Returns:</strong> JSON Format</div>
            </fieldset>
            <br>
            <b>Retrieve Trials</b> <a href="#" onclick="muestra_oculta('ApiTrials')" title="">View Info</a>
            <div id="ApiTrials" class="InfoApi" style="display:none;">
                <br>
                <div><strong>URL:</strong> <code>http://<?php echo $url; ?>/api/apitrials?key=<?php echo $key; ?>&{Options}</code></div>
                <div><strong>Options:</strong> <code>trial=values&=project=values&contactperson=values&triallocation=values&technology=values&country=values&latitude=value1|value2&longitude=value1|value2&dates=yyyy-mm-dd|yyyy-mm-dd&latest=value &ensp;</code> </div>
                <div><strong>Return:</strong> <code>id,trialgroup,contactperson,country,trialsite,latitude,longitude,crop,trialname,varieties,variablesmeasured,sowdate,harvestdate,url</code> </div>
                <div><strong>Example:</strong> <code><a target="_blank" href="http://<?php echo $url; ?>/api/apitrials?key=<?php echo $key; ?>&projects=4,86">http://<?php echo $url; ?>/api/apitrials?key=<?php echo $key; ?>&projects=4,86</a></code> </div>
                <br>
            </div>
            <br>
            <b>Retrieve Project</b> <a href="#" onclick="muestra_oculta('ApiProject')" title="">View Info</a>
            <div id="ApiProject" class="InfoApi" style="display:none;">
                <div><strong>URL:</strong> <code>http://<?php echo $url; ?>/api/apiproject?key=<?php echo $key; ?></code></div>
                <div><strong>Return:</strong> <code>id,name,leadofproject,institution,donor,abstract,keywords</code> </div>
                <div><strong>Example:</strong> <code><a target="_blank" href="http://<?php echo $url; ?>/api/apiproject?key=<?php echo $key; ?>">http://<?php echo $url; ?>/api/apiproject?key=<?php echo $key; ?></a></code> </div>
            </div>
            <br>
            <b>Retrieve Contact Person</b> <a href="#" onclick="muestra_oculta('ApiContactPerson')" title="">View Info</a>
            <div id="ApiContactPerson" class="InfoApi" style="display:none;">
                <div><strong>URL:</strong> <code>http://<?php echo $url; ?>/api/apicontactperson?key=<?php echo $key; ?></code></div>
                <div><strong>Return:</strong> <code>id,firstname,middlename,lastname,institution</code> </div>
                <div><strong>Example:</strong> <code><a target="_blank" href="http://<?php echo $url; ?>/api/apicontactperson?key=<?php echo $key; ?>">http://<?php echo $url; ?>/api/apicontactperson?key=<?php echo $key; ?></a></code> </div>
            </div>
            <br>
            <b>Retrieve Country</b> <a href="#" onclick="muestra_oculta('ApiCountry')" title="">View Info</a>
            <div id="ApiCountry" class="InfoApi" style="display:none;">
                <div><strong>URL:</strong> <code>http://<?php echo $url; ?>/api/apicountry?key=<?php echo $key; ?></code></div>
                <div><strong>Return:</strong> <code>id,countryname</code> </div>
                <div><strong>Example:</strong> <code><a target="_blank" href="http://<?php echo $url; ?>/api/apicountry?key=<?php echo $key; ?>">http://<?php echo $url; ?>/api/apicountry?key=<?php echo $key; ?></a></code> </div>
            </div>
            <br>
            <b>Retrieve Trial Location</b> <a href="#" onclick="muestra_oculta('TrialLocation')" title="">View Info</a>
            <div id="TrialLocation" class="InfoApi" style="display:none;">
                <div><strong>URL:</strong> <code>http://<?php echo $url; ?>/api/apitriallocation?key=<?php echo $key; ?>&{Options}</code></div>
                <div><strong>Options:</strong> <code>date=yyyy-mm-dd</code> </div>
                <div><strong>Return:</strong> <code>id,name,latitude,longitude,altitude,country,districtsatate,subdistrictsatate,village</code> </div>
                <div><strong>Example:</strong> <code><a target="_blank" href="http://<?php echo $url; ?>/api/apitriallocation?key=<?php echo $key; ?>">http://<?php echo $url; ?>/api/apitriallocation?key=<?php echo $key; ?></a></code> </div>
            </div>
            <br>
            <b>Retrieve Technology (Crops)</b> <a href="#" onclick="muestra_oculta('ApiTechnology')" title="">View Info</a>
            <div id="ApiTechnology" class="InfoApi" style="display:none;">
                <div><strong>URL:</strong> <code>http://<?php echo $url; ?>/api/apitechnology?key=<?php echo $key; ?></code></div>
                <div><strong>Return:</strong> <code>id,technologyname,scientificname</code> </div>
                <div><strong>Example:</strong> <code><a target="_blank" href="http://<?php echo $url; ?>/api/apitechnology?key=<?php echo $key; ?>">http://<?php echo $url; ?>/api/apitechnology?key=<?php echo $key; ?></a></code> </div>
            </div>
            <br>
            <b>Retrieve Variety</b> <a href="#" onclick="muestra_oculta('ApiVariety')" title="">View Info</a>
            <div id="ApiVariety" class="InfoApi" style="display:none;">
                <div><strong>URL:</strong> <code>http://<?php echo $url; ?>/api/apivariety?key=<?php echo $key; ?>&technology=values</code></div>
                <div><strong>Return:</strong> <code>id,technology,origin,varietyname,synonymous,description</code> </div>
                <div><strong>Example:</strong> <code><a target="_blank" href="http://<?php echo $url; ?>/api/apivariety?key=<?php echo $key; ?>&technology=10">http://<?php echo $url; ?>/api/apivariety?key=<?php echo $key; ?>&technology=10</a></code> </div>
            </div>
            <br>
            <b>Retrieve Variables Measured</b> <a href="#" onclick="muestra_oculta('ApiVariablesMeasured')" title="">View Info</a>
            <div id="ApiVariablesMeasured" class="InfoApi" style="display:none;">
                <div><strong>URL:</strong> <code>http://<?php echo $url; ?>/api/apivariablesmeasured?key=<?php echo $key; ?>&technology=values</code></div>
                <div><strong>Return:</strong> <code>id,technology,traitclass,variablesmeasuredname,shortname,definition,unit</code> </div>
                <div><strong>Example:</strong> <code><a target="_blank" href="http://<?php echo $url; ?>/api/apivariablesmeasured?key=<?php echo $key; ?>&technology=1">http://<?php echo $url; ?>/api/apivariablesmeasured?key=<?php echo $key; ?>&technology=1</a></code> </div>
            </div>


        </div>
    </fieldset>
</div>

<link rel="stylesheet" href="/autocomplete/css/autocomplete.css">
<script src="/autocomplete/lib/jquery.1.7.1.js"></script>
<script src="/autocomplete/lib/jquery.ui.1.8.16.js"></script>
<script src="/autocomplete/autocomplete.js"></script>
<script>
    $(document).ready(function () {

        //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO
        $("#SubmitSearch").click(function () {
            var searchterms = $('#searchterms').val();
            var id_project = $('#id_project').val();
            var id_contactperson = $('#id_contactperson').val();
            var id_crop = $('#id_crop').val();
            var id_trial = $('#id_trial').val();

            var Ico = "<img src='/images/bullet-black-icon.png'> ";
            var BanderaFaltantes = false;
            var MensajeFaltantes = "";

            if ((searchterms == '') && (id_project === '') && (id_contactperson === '') && (id_crop === '') && (id_trial === '')) {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + " Select a search criterion!<br>";
            }

            //VERIFICACION MENSAJE DE ALERTA
            if (BanderaFaltantes) {
                Mensaje(MensajeFaltantes);
            } else {
                $('#FormAction').val('true');
                $('#div_loading').show();
                $('#FormSearchTrials').submit();
            }
        });
    });
</script>
<div class="row">
    <!-- Left Menu -->
    <div class="col-md-2 left-column">
        <div class="MenuTrials">
            <div onclick="window.location.href = '/searchtrials'" class="MenuTrialsButton selected"> Search Trials</div>
            <div onclick="window.location.href = '/trial/new'" class="MenuTrialsButton">  Add new Trial</div>
            <div onclick="window.location.href = '/batchuploadtrials'" class="MenuTrialsButton"> Batch Upload Trials</div>
        </div>
    </div>
    <!-- Right Content -->
    <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
        <span class="Title">Search Trials</span>
        <div id="div_loading" class="loading" align="center" style="display:none;">
            <?php echo image_tag('loading.gif'); ?>
            <br>Please Wait...
        </div>
        <form class="form-horizontal" id="FormSearchTrials" name="FormSearchTrials" action="" enctype="multipart/form-data" method="post" autocomplete="off">
            <div class="Session"style="margin-top: 10px; margin-bottom: 10px;">
                <div class="form-group control-type-text">
                    <div class="col-sm-12">Search terms:</div>      
                    <div class="col-sm-11 control-type-text">
                        <input class="form-control" type="text"  name="searchterms" id="searchterms" size="36" maxlength="255" value="">
                    </div>
                </div>
                <div class="form-group control-type-text">
                    <div class="col-sm-12">Filter by:</div>   
                    <fieldset style="padding-left: 15px;">
                        <div class="form-group control-type-text col-sm-3">
                            <div class="col-sm-12">Project:</div>      
                            <div class="col-sm-12 control-type-text">
                                <input name="id_project" id="id_project" type="hidden"value="" /> 
                                <input class="form-control SearchInput" name="searchprjname" id="searchprjname" type="text" size="17" maxlength="150" value="" />
                            </div>
                        </div>
                        <div class="form-group control-type-text col-sm-3">
                            <div class="col-sm-12">Contact person:</div>      
                            <div class="col-sm-12 control-type-text">
                                <input name="id_contactperson" id="id_contactperson" type="hidden"value="" /> 
                                <input class="form-control SearchInput" name="searchcontactperson" id="searchcontactperson" type="text" size="17" maxlength="150" value="" />                    
                            </div>
                        </div>
                        <div class="form-group control-type-text col-sm-3">
                            <div class="col-sm-12">Crop / Technology:</div>      
                            <div class="col-sm-12 control-type-text">
                                <input name="id_crop" id="id_crop" type="hidden"value="" /> 
                                <input class="form-control SearchInput" name="searchcrpname" id="searchcrpname" type="text" size="17" maxlength="150" value="" />
                            </div>
                        </div>
                        <div class="form-group control-type-text col-sm-3">
                            <div class="col-sm-12">Trial name:</div>      
                            <div class="col-sm-12 control-type-text">
                                <input name="id_trial" id="id_trial" type="hidden"value="" /> 
                                <input class="form-control SearchInput" name="searchtrltrialname" id="searchtrltrialname" type="text" size="17" maxlength="150" value="" />   
                            </div>
                        </div>
                    </fieldset>
                    <fieldset style="padding-left: 15px;">


                    </fieldset>
                </div>

            </div>
            <fieldset style="margin-top: 10px; margin-left: 13px;">
                <div class="form-group control-type-text" style="margin-left: 0px;">
                    <button class="btn btn-action" type="button" title=" Search " id="SubmitSearch" neme="SubmitSearch"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&ensp;Search&ensp;</button>
                    <input type="hidden" value="" id="FormAction" name="FormAction"/>
                </div>
            </fieldset>
        </form>


    </div>
</div>
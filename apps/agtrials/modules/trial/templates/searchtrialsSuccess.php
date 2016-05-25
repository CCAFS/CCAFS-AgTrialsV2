<?php use_javascript('trial.js'); ?>
<script>
    jQuery(document).ready(function () {
        //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO
        jQuery("#SubmitSearch").click(function () {
            var searchterms = jQuery('#searchterms').val();
            var id_project = jQuery('#id_project').val();
            var id_contactperson = jQuery('#id_contactperson').val();
            var id_crop = jQuery('#id_crop').val();
            var id_trial = jQuery('#id_trial').val();

            //CAMPOS BUSQUEDA AVANZADA
            var trnfplantingsowingstartdate = jQuery('#trnfplantingsowingstartdate1').val();
            var trnfplantingsowingenddate = jQuery('#trnfplantingsowingenddate1').val();
            var trnfharveststartdate = jQuery('#trnfharveststartdate1').val();
            var trnfharvestenddate = jQuery('#trnfharvestenddate1').val();

            var Ico = "<img src='/images/bullet-black-icon.png'> ";
            var BanderaFaltantes = false;
            var MensajeFaltantes = "";
            if ((searchterms == '') && (id_project === '') && (id_contactperson === '') && (id_crop === '') && (id_trial === '')) {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + " Select a search criterion!<br>";
            }

            //VERIFICACION MENSAJE DE ALERTA
            if (BanderaFaltantes) {
                alerts.show({css: 'error', title: 'Importat!', message: MensajeFaltantes});
            } else {
                jQuery('#DivTableResusltsSearch').show();
                jQuery('#TableResusltsSearch').DataTable({
                    "bDestroy": true,
                    "language": {
                        "lengthMenu": "Display _MENU_ records per page",
                        "info": "Showing page _PAGE_ of _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtered from _MAX_ total records)"
                    },
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    "ajax": {
                        'type': 'POST',
                        'url': 'trial/resultsearchtrials/',
                        'data': {
                            searchterms: searchterms,
                            id_project: id_project,
                            id_contactperson: id_contactperson,
                            id_crop: id_crop,
                            id_trial: id_trial,
                            trnfplantingsowingstartdate: trnfplantingsowingstartdate,
                            trnfplantingsowingenddate: trnfplantingsowingenddate,
                            trnfharveststartdate: trnfharveststartdate,
                            trnfharvestenddate: trnfharvestenddate
                        }
                    },
                    "fnRowCallback": function (nRow, aData) {
                        jQuery('td:eq(0)', nRow).html('<a target="_blank" href="/trial/' + aData[4] + '">' + aData[0] + '</a>');
                        return nRow;
                    }
                });
            }
        });
        jQuery("#ButtonClear").click(function () {
            jQuery('#searchterms').val('');
            jQuery('#CheckSearchterms').html("");
            jQuery('#id_project').val('');
            jQuery('#searchprjname').val('');
            jQuery('#CheckProject').html("");
            jQuery('#id_contactperson').val('');
            jQuery('#searchcontactperson').val('');
            jQuery('#CheckContactperson').html("");
            jQuery('#id_crop').val('');
            jQuery('#searchcrpname').val('');
            jQuery('#CheckCrop').html("");
            jQuery('#id_trial').val('');
            jQuery('#searchtrltrialname').val('');
            jQuery('#CheckTrialname').html("");

            jQuery('#trnfplantingsowingstartdate1').val('');
            jQuery('#trnfplantingsowingenddate1').val('');
            jQuery('#trnfharveststartdate1').val('');
            jQuery('#trnfharvestenddate1').val('');

            jQuery('#DivTableResusltsSearch').hide();

            jQuery.ajax({
                type: "GET",
                url: "/trial/AssingWhere/",
                data: "field=reset&value=",
                success: function () {
                }
            });
        });

        jQuery("#ShowHideDivAdvancedSearch").on('click', function () {
            jQuery("#DivAdvancedSearch").toggle();
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
        <form class="form-horizontal" id="FormSearchTrials" name="FormSearchTrials" action="" enctype="multipart/form-data" method="post" autocomplete="off">
            <div class="Session" style="margin-top: 10px;  margin-bottom: 0px; margin-bottom: 10px; padding-bottom: 0px;">
                <div class="form-group control-type-text">
                    <div class="col-sm-12" style="color: #93c47d; font-size: 16px;">Search terms:</div>      
                    <div class="col-sm-10 control-type-text" style="padding-right: 2px;">
                        <input class="form-control" type="text"  name="searchterms" id="searchterms" size="36" maxlength="255" value="<?php echo $searchterms; ?>">
                    </div>
                    <div class="col-sm-2" style="width: 70px; padding-left: 5px; padding-right: 5px;">
                        <select name="searchtermsoptions" id="searchtermsoptions" size="1" class="form-control">
                            <option value="OR">OR &ensp;</option>
                            <option value="AND">AND</option>
                        </select>
                    </div>
                    <div class="DivColIcon">
                        <span id="CheckSearchterms"></span>                                
                    </div>
                </div>
                <div class="form-group control-type-text">
                    <div class="col-sm-12" style="color: #93c47d; font-size: 16px; padding-bottom: 8px;">Filter by:</div>   
                    <fieldset style="padding-left: 15px;">
                        <div class="form-group control-type-text col-sm-3" style="width: 250px;">
                            <div class="col-sm-12">Project:</div>      
                            <div class="col-sm-11 control-type-text" style="padding-right: 2px;">
                                <input name="id_project" id="id_project" type="hidden" value="<?php echo $id_project; ?>" /> 
                                <input class="form-control SearchInput" name="searchprjname" id="searchprjname" type="text" size="17" maxlength="150" value="<?php echo $searchprjname; ?>" />
                            </div>
                            <div class="DivColIcon">
                                <span id="CheckProject"></span>                                
                            </div>
                        </div>
                        <div class="form-group control-type-text col-sm-3" style="width: 250px;">
                            <div class="col-sm-12">Contact person:</div>      
                            <div class="col-sm-11 control-type-text" style="padding-right: 2px;">
                                <input name="id_contactperson" id="id_contactperson" type="hidden" value="<?php echo $id_contactperson; ?>" /> 
                                <input class="form-control SearchInput" name="searchcontactperson" id="searchcontactperson" type="text" size="17" maxlength="150" value="<?php echo $searchcontactperson; ?>" />                    
                            </div>
                            <div class="DivColIcon">
                                <span id="CheckContactperson"></span>                                
                            </div>
                        </div>
                        <div class="form-group control-type-text col-sm-3" style="width: 250px;">
                            <div class="col-sm-12">Crop / Technology:</div>      
                            <div class="col-sm-11 control-type-text" style="padding-right: 2px;">
                                <input name="id_crop" id="id_crop" type="hidden" value="<?php echo $id_crop; ?>" /> 
                                <input class="form-control SearchInput" name="searchcrpname" id="searchcrpname" type="text" size="17" maxlength="150" value="<?php echo $searchcrpname; ?>" />
                            </div>
                            <div class="DivColIcon">
                                <span id="CheckCrop"></span>                                
                            </div>
                        </div>
                        <div class="form-group control-type-text col-sm-3" style="width: 250px;">
                            <div class="col-sm-12">Trial name:</div>      
                            <div class="col-sm-11 control-type-text" style="padding-right: 2px;">
                                <input name="id_trial" id="id_trial" type="hidden" value="<?php echo $id_trial; ?>" /> 
                                <input class="form-control SearchInput" name="searchtrltrialname" id="searchtrltrialname" type="text" size="17" maxlength="150" value="<?php echo $searchtrltrialname; ?>" />   
                            </div>
                            <div class="DivColIcon">
                                <span id="CheckTrialname"></span>                                
                            </div>
                        </div>
                    </fieldset>
                    <div id="ShowHideDivAdvancedSearch" class="col-sm-3" style="color: #93c47d; font-size: 14px; padding-bottom: 8px; cursor: pointer; width: 160px;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Advanced Search</div>
                </div>
            </div>

            <div id="DivAdvancedSearch" class="Session col-sm-12 control-type-text" style="margin-top: 10px; margin-bottom: 10px; display:none;">
                <div class="col-sm-12" style="color: #93c47d; font-size: 16px; padding-bottom: 8px;">Advanced Search:</div>   
                <div class="col-sm-12">
                    <div class="form-group control-type-text col-sm-4">
                        <div class="col-sm-12">Planting/Sowing Start Date:</div>      
                        <div class="col-sm-12 control-type-text">
                            <input type="text" value="" onblur="ValidaFecha(this);" onkeyup="ValidaEscrituraFecha(this);" maxlength="10" size="11" id="trnfplantingsowingstartdate1" name="trnfplantingsowingstartdate1" placeholder="yyyy-mm-dd" class="DateInput form-control">                    
                        </div>
                    </div>
                    <div class="form-group control-type-text col-sm-4">
                        <div class="col-sm-12">Planting/Sowing End Date:</div>      
                        <div class="col-sm-12 control-type-text">
                            <input type="text" value="" onblur="ValidaFecha(this);" onkeyup="ValidaEscrituraFecha(this);" maxlength="10" size="11" id="trnfplantingsowingenddate1" name="trnfplantingsowingenddate1" placeholder="yyyy-mm-dd" class="DateInput form-control">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group control-type-text col-sm-4">
                        <div class="col-sm-12">Harvest Start Date:</div>      
                        <div class="col-sm-12 control-type-text">
                            <input type="text" value="" onblur="ValidaFecha(this);" onkeyup="ValidaEscrituraFecha(this);" maxlength="10" size="11" id="trnfharveststartdate1" name="trnfharveststartdate1" placeholder="yyyy-mm-dd" class="DateInput form-control">                    
                        </div>
                    </div>
                    <div class="form-group control-type-text col-sm-4">
                        <div class="col-sm-12">Harvest End Date:</div>      
                        <div class="col-sm-12 control-type-text">
                            <input type="text" value="" onblur="ValidaFecha(this);" onkeyup="ValidaEscrituraFecha(this);" maxlength="10" size="11" id="trnfharvestenddate1" name="trnfharvestenddate1" placeholder="yyyy-mm-dd" class="DateInput form-control">
                        </div>
                    </div>
                </div>
            </div>

            <fieldset style="margin-top: 10px; margin-left: 13px;">
                <div class="form-group control-type-text" style="margin-left: 0px;">
                    <button class="btn btn-action" type="button" title=" Search " id="SubmitSearch" neme="SubmitSearch"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&ensp;Search&ensp;</button>
                    <button class="btn btn-action" type="button" title=" Clear " id="ButtonClear" neme="ButtonClear"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span>&ensp;Clear&ensp;</button>
                    <input type="hidden" value="" id="FormAction" name="FormAction"/>
                </div>
            </fieldset>
        </form>

        <div id="DivTableResusltsSearch" class="col-sm-12 control-type-text" style="display:none;">
            <table id="TableResusltsSearch" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Project</th>
                        <th>Location</th>
                        <th>Crop</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#TableResusltsSearch').removeClass('display').addClass('table table-striped table-bordered');
</script>
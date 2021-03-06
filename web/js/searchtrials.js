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
 * Created on :  @2016
 * @author    :  Herlin R. Espinosa G. - herlin25@gmail.com
 * @version   :  ~
 */
jQuery(document).ready(function () {

    jQuery("#SubmitSearch").click(function () {
        SubmitSearch();
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
        jQuery('#searchtrnfplantingsowingfrom').val('');
        jQuery('#CheckSowingFrom').html("");
        jQuery('#searchtrnfplantingsowingto').val('');
        jQuery('#CheckSowingTo').html("");
        jQuery('#searchtrnfharvestfrom').val('');
        jQuery('#CheckHarvestFrom').html("");
        jQuery('#searchtrnfharvestto').val('');
        jQuery('#CheckHarvestTo').html("");
        jQuery('#searchcreatedatfrom').val('');
        jQuery('#CheckCreatedatFrom').html("");
        jQuery('#searchcreatedatto').val('');
        jQuery('#CheckCreatedatTo').html("");
        jQuery('#ButtonResusltsSearch').hide();
        jQuery('#DivTableResusltsSearch').hide();
        jQuery('#DivTableResusltsSearchMaps').hide();
        jQuery("#ResusltsSearchMaps").attr('src', "");
        jQuery.ajax({
            type: "GET",
            url: "/trial/AssingWhere/",
            data: "field=reset&value=",
            success: function () {
            }
        });
        var i = 1;
        jQuery('#InfoVariety' + i).val('');
        jQuery("#InfoVarietySelected" + i).load("/trial/DeleteVarietySelected/?i=" + i, function () {
            jQuery("#InfoVarietySelected" + i).html("");
        });
        jQuery("#InfoVariablesMeasuredSelected" + i).load("/trial/DeleteVariablesMeasuredSelected/?i=" + i, function () {
            jQuery("#InfoVariablesMeasured" + i).html("");
        });
    });
    jQuery("#ButtonList").click(function () {
        jQuery('#DivTableResusltsSearch').show();
        jQuery('#DivTableResusltsSearchMaps').hide();
    });
    jQuery("#ButtonMap").click(function () {
        jQuery('#DivTableResusltsSearch').hide();
        jQuery('#DivTableResusltsSearchMaps').show();
        jQuery("#ResusltsSearchMaps").attr('src', "/trial/mapsearchtrials/");
    });
    jQuery("#ButtonDownloaddata").click(function () {
        var License = '<div><a href="http://creativecommons.org/licenses/by-nc-nd/3.0/" rel="license"><img src="http://i.creativecommons.org/l/by-nc-nd/3.0/88x31.png" style="border-width:0; width: 88px; height: 31px;" alt="Creative Commons License"></a><br>This <span rel="dct:type" href="http://purl.org/dc/dcmitype/Text" xmlns:dct="http://purl.org/dc/terms/">work</span> is licensed under a <a href="http://creativecommons.org/licenses/by-nc-nd/3.0/" rel="license">Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License</a>.</div>';
        License += "<br><br><b>Do you agree with the license?</b>";
        $.confirm({
            icon: "glyphicon glyphicon-subtitles",
            columnClass: "col-md-8 col-md-offset-2",
            closeIconClass: 'fa fa-close',
            autoClose: 'cancel|31000',
            title: "Agreement Licence",
            confirmButton: "I accept the licence",
            cancelButton: "I don't accept the licence",
            content: License,
            confirm: function () {
                window.open("/downloaddata", null, "height=400,width=800,scrollbars, status=yes,toolbar=no,menubar=no,location=no");
            },
            cancel: function () {}
        });
    });
    jQuery("#ShowHideDivAdvancedSearch").on('click', function () {
        jQuery("#DivAdvancedSearch").toggle();
    });
    jQuery("#searchterms").blur(function () {
        ValidSearchterms();
    });
    jQuery("#searchtermsoptions").change(function () {
        if (jQuery('#searchterms').val() !== '')
            ValidSearchterms();
    });
    jQuery("#searchprjname").focus(function () {
        ClearFieldAutocomplete("id_project", "searchprjname", "CheckProject");
    });
    jQuery("#searchcontactperson").focus(function () {
        ClearFieldAutocomplete("id_contactperson", "searchcontactperson", "CheckContactperson");
    });
    jQuery("#searchcrpname").focus(function () {
        ClearFieldAutocomplete("id_crop", "searchcrpname", "CheckCrop");
        var i = 1;
        jQuery('#InfoVariety' + i).val('');
        jQuery("#InfoVarietySelected" + i).load("/trial/DeleteVarietySelected/?i=" + i, function () {
            jQuery("#InfoVarietySelected" + i).html("");
        });
        jQuery("#InfoVariablesMeasuredSelected" + i).load("/trial/DeleteVariablesMeasuredSelected/?i=" + i, function () {
            jQuery("#InfoVariablesMeasured" + i).html("");
        });
    });
    jQuery("#searchtrltrialname").focus(function () {
        ClearFieldAutocomplete("id_trial", "searchtrltrialname", "CheckTrialname");
    });
    jQuery("#searchprjname").blur(function () {
        AssignFieldAutocomplete("id_project", "searchprjname", "CheckProject");
    });
    jQuery("#searchcontactperson").blur(function () {
        AssignFieldAutocomplete("id_contactperson", "searchcontactperson", "CheckContactperson");
    });
    jQuery("#searchcrpname").blur(function () {
        AssignFieldAutocomplete("id_crop", "searchcrpname", "CheckCrop");
    });
    jQuery("#searchtrltrialname").blur(function () {
        AssignFieldAutocomplete("id_trial", "searchtrltrialname", "CheckTrialname");
    });
    jQuery("#searchtrnfplantingsowingfrom").blur(function () {
        if (jQuery('#searchtrnfplantingsowingfrom').val() !== '') {
            jQuery('#CheckSowingFrom').html("<img width='18' height='18' src='/images/success.png'>");
        } else {
            jQuery('#searchtrnfplantingsowingfrom').val('');
            jQuery('#CheckSowingFrom').html("");
        }
        jQuery.ajax({
            type: "GET",
            url: "/trial/AssingWhere/",
            data: "field=trnfplantingsowingstartdate&value=" + jQuery('#searchtrnfplantingsowingfrom').val() + '&value2=' + jQuery('#searchtrnfplantingsowingto').val(),
            success: function () {
            }
        });
    });
    jQuery("#searchtrnfplantingsowingto").blur(function () {
        if (jQuery('#searchtrnfplantingsowingto').val() !== '') {
            jQuery('#CheckSowingTo').html("<img width='18' height='18' src='/images/success.png'>");
        } else {
            jQuery('#searchtrnfplantingsowingto').val('');
            jQuery('#CheckSowingTo').html("");
        }
        jQuery.ajax({
            type: "GET",
            url: "/trial/AssingWhere/",
            data: "field=trnfplantingsowingstartdate&value=" + jQuery('#searchtrnfplantingsowingfrom').val() + '&value2=' + jQuery('#searchtrnfplantingsowingto').val(),
            success: function () {
            }
        });
    });
    jQuery("#searchtrnfharvestfrom").blur(function () {
        if (jQuery('#searchtrnfharvestfrom').val() !== '') {
            jQuery('#CheckHarvestFrom').html("<img width='18' height='18' src='/images/success.png'>");
        } else {
            jQuery('#searchtrnfharvestfrom').val('');
            jQuery('#CheckHarvestFrom').html("");
        }
        jQuery.ajax({
            type: "GET",
            url: "/trial/AssingWhere/",
            data: "field=trnfharveststartdate&value=" + jQuery('#searchtrnfharvestfrom').val() + '&value2=' + jQuery('#searchtrnfharvestto').val(),
            success: function () {
            }
        });
    });
    jQuery("#searchtrnfharvestto").blur(function () {
        if (jQuery('#searchtrnfharvestto').val() !== '') {
            jQuery('#CheckHarvestTo').html("<img width='18' height='18' src='/images/success.png'>");
        } else {
            jQuery('#searchtrnfharvestto').val('');
            jQuery('#CheckHarvestTo').html("");
        }
        jQuery.ajax({
            type: "GET",
            url: "/trial/AssingWhere/",
            data: "field=trnfharveststartdate&value=" + jQuery('#searchtrnfharvestfrom').val() + '&value2=' + jQuery('#searchtrnfharvestto').val(),
            success: function () {
            }
        });
    });
    jQuery("#searchcreatedatfrom").blur(function () {
        if (jQuery('#searchcreatedatfrom').val() !== '') {
            jQuery('#CheckCreatedatFrom').html("<img width='18' height='18' src='/images/success.png'>");
        } else {
            jQuery('#searchtrnfharvestfrom').val('');
            jQuery('#CheckCreatedatFrom').html("");
        }
        jQuery.ajax({
            type: "GET",
            url: "/trial/AssingWhere/",
            data: "field=created_at&value=" + jQuery('#searchcreatedatfrom').val() + '&value2=' + jQuery('#searchcreatedatto').val(),
            success: function () {
            }
        });
    });
    jQuery("#searchcreatedatto").blur(function () {
        if (jQuery('#searchcreatedatto').val() !== '') {
            jQuery('#CheckCreatedatTo').html("<img width='18' height='18' src='/images/success.png'>");
        } else {
            jQuery('#searchcreatedatto').val('');
            jQuery('#CheckCreatedatTo').html("");
        }
        jQuery.ajax({
            type: "GET",
            url: "/trial/AssingWhere/",
            data: "field=created_at&value=" + jQuery('#searchcreatedatfrom').val() + '&value2=' + jQuery('#searchcreatedatto').val(),
            success: function () {
            }
        });
    });
});
function LoadStart() {
    if (jQuery('#id_project').val() !== '') {
        AssignFieldAutocomplete("id_project", "searchprjname", "CheckProject");
    }
    if (jQuery('#id_contactperson').val() !== '') {
        AssignFieldAutocomplete("id_contactperson", "searchcontactperson", "CheckContactperson");
    }
    if (jQuery('#id_crop').val() !== '') {
        AssignFieldAutocomplete("id_crop", "searchcrpname", "CheckCrop");
    }
    if (jQuery('#id_trial').val() !== '') {
        AssignFieldAutocomplete("id_trial", "searchtrltrialname", "CheckTrialname");
    }
    SubmitSearch();
}


function AssignFieldAutocomplete(id, name, check) {
    if ((jQuery('#' + id).val() !== '') && (jQuery('#' + name).val() !== '')) {
        jQuery('#' + check).html("<img width='18' height='18' src='/images/success.png'>");
    } else {
        jQuery('#' + id).val('');
        jQuery('#' + name).val('');
        jQuery('#' + check).html("");
    }
    jQuery.ajax({
        type: "GET",
        url: "/trial/AssingWhere/",
        data: "field=" + id + "&value=" + jQuery('#' + id).val(),
        success: function () {}
    });
}

function ClearFieldAutocomplete(id, name, check) {
    jQuery('#' + id).val('');
    jQuery('#' + name).val('');
    jQuery('#' + check).html('');
    jQuery.ajax({
        type: "GET",
        url: "/trial/AssingWhere/",
        data: "field=" + id + "&value=" + jQuery('#' + id).val(),
        success: function () {}
    });
}



function ValidSearchterms() {
    var Return = false;
    var searchterms = jQuery('#searchterms').val();
    var searchtermsoptions = jQuery('#searchtermsoptions').val();
    if (searchterms !== '') {
        searchterms = searchterms.replace('+', '%2B');
        if (jQuery('#searchterms').val() !== '') {
            jQuery('#CheckSearchterms').html("<img width='18' height='18' src='/images/success.png'>");
        } else {
            jQuery('#searchterms').val('');
            jQuery('#CheckSearchterms').html("");
        }
        jQuery.ajax({
            type: "GET",
            url: "/trial/ValidSearchterms/",
            data: "searchterms=" + searchterms + "&searchtermsoptions=" + searchtermsoptions,
            success: function (data) {
                if (data) {
                    jQuery('#searchterms').val('');
                    jQuery('#CheckSearchterms').html("");
                    alerts.show({css: 'error', title: 'Search Terms', message: 'Not found information, for terms written.!'});
                    Return = true;
                }
            }
        });
    }
    return Return;
}

function SubmitSearch() {
    var searchterms = jQuery('#searchterms').val();
    var id_project = jQuery('#id_project').val();
    var id_contactperson = jQuery('#id_contactperson').val();
    var id_crop = jQuery('#id_crop').val();
    var id_trial = jQuery('#id_trial').val();
    //CAMPOS BUSQUEDA AVANZADA
    var searchtrnfplantingsowingfrom = jQuery('#searchtrnfplantingsowingfrom').val();
    var searchtrnfplantingsowingto = jQuery('#searchtrnfplantingsowingto').val();
    var searchtrnfharvestfrom = jQuery('#searchtrnfharvestfrom').val();
    var searchtrnfharvestto = jQuery('#searchtrnfharvestto').val();
    var searchcreatedatfrom = jQuery('#searchcreatedatfrom').val();
    var searchcreatedatto = jQuery('#searchcreatedatto').val();
    var Ico = "<img src='/images/bullet-black-icon.png'> ";
    var BanderaFaltantes = false;
    var MensajeFaltantes = "";
    if ((searchterms === '') && (id_project === '') && (id_contactperson === '') && (id_crop === '') && (id_trial === '') && (searchtrnfplantingsowingfrom === '') && (searchtrnfplantingsowingto === '') && (searchtrnfharvestfrom === '') && (searchtrnfharvestto === '') && (searchcreatedatfrom === '') && (searchcreatedatto === '')) {
        BanderaFaltantes = true;
        MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + " Select a search criterion!<br>";
    }

    if (((searchtrnfplantingsowingfrom !== '') && (searchtrnfplantingsowingto === '')) || ((searchtrnfplantingsowingfrom === '') && (searchtrnfplantingsowingto !== ''))) {
        BanderaFaltantes = true;
        MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + " Incomplete information to Planting/Sowing!<br>";
    }

    if (((searchtrnfharvestfrom !== '') && (searchtrnfharvestto === '')) || ((searchtrnfharvestfrom === '') && (searchtrnfharvestto !== ''))) {
        BanderaFaltantes = true;
        MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + " Incomplete information to Harvest!<br>";
    }

    if (((searchcreatedatfrom !== '') && (searchcreatedatto === '')) || ((searchcreatedatfrom === '') && (searchcreatedatto !== ''))) {
        BanderaFaltantes = true;
        MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + " Incomplete information to Created at!<br>";
    }

//VERIFICACION MENSAJE DE ALERTA
    if (BanderaFaltantes) {
        alerts.show({css: 'error', title: 'Importat!', message: MensajeFaltantes});
    } else {
        jQuery("#SubmitSearch").html("<span class='glyphicon glyphicon-search' aria-hidden='true'></span>&ensp;Search&ensp; <img width='18' height='18' src='/images/loading4.gif'>");
        jQuery('#DivTableResusltsSearch').show();
        jQuery('#ButtonResusltsSearch').show();
        jQuery('#TableResusltsSearch').DataTable({
            bDestroy: true,
            language: {
                "lengthMenu": "Display _MENU_ records per page",
                "info": "Showing page _PAGE_ of _PAGES_",
                "loadingRecords": "Loading...",
                "infoEmpty": "",
                "infoFiltered": "(filtered from _MAX_ total records)"
            },
            ajax: {
                'type': 'POST',
                'url': '/trial/resultsearchtrials/',
                'data': {}
            },
            fnRowCallback: function (nRow, aData) {
                jQuery('td:eq(0)', nRow).html('<a target="_blank" href="/trial/' + aData[4] + '">' + aData[0] + '</a>');
                return nRow;
            },
            initComplete: function () {
                jQuery("#SubmitSearch").html("<span class='glyphicon glyphicon-search' aria-hidden='true'></span>&ensp;Search&ensp; ");
            }

        });
    }
}

function Downloaddatapart(num, cursormax) {
    for (var i = 1; i <= cursormax; i++) {
        if (num !== i) {
            jQuery('#SpanDownloaddatapart' + i).css('pointer-events', 'none');
        }
    }

    jQuery('#Downloading' + num).html("Downloading <img width='14' height='14' src='/images/loading4.gif'>");
    jQuery("#DivDownloaddatapart" + num).css("background-color", "#FCF8E3");
    jQuery.ajax({
        type: "GET",
        url: "/downloaddata/part/" + num,
        data: "",
        success: function (data) {
            var Listdownloaded = jQuery('#Listdownloaded').val();
            Listdownloaded = Listdownloaded + "," + num;
            var ArrListdownloaded = Listdownloaded.split(',');
            window.location.href = "/trial/downloadingdata/tmp/" + data;
            jQuery('#Downloading' + num).html("");
            jQuery("#DivDownloaddatapart" + num).css("background-color", "#FFFFFF");
            jQuery('#SpanDownloaddatapart' + num).append(" <img src='/images/Ok-icon.png' width='13' height='13'>");
            for (var i = 1; i <= cursormax; i++) {
                if (jQuery.inArray(i.toString(), ArrListdownloaded) === -1) {
                    jQuery('#SpanDownloaddatapart' + i).css('pointer-events', 'auto');
                }
            }
            jQuery('#SpanDownloaddatapart' + num).css('pointer-events', 'none');
            jQuery('#Listdownloaded').val(Listdownloaded);
        }
    });
}

//BUSQUEDA DE VARIEDADES
function FilterVarietyTrials(Campo, i) {
    var Value = Campo.value;
    var id_crop = jQuery("#id_crop").val();
    var Value = Value.replace(" ", "*quot*");
    if (id_crop !== '') {
        if (Value !== '') {
            jQuery("#DivFilterVariety" + i).show();
            jQuery("#InfoVariety" + i).load("/trial/FilterVarietyTrials/?txt=" + Value + '&id_crop=' + id_crop + "&i=" + i, function () {
                jQuery("#DivFilterVariety" + i).hide();
                jQuery("#DivFilterVarietyOK" + i).show();
                jQuery("#DivClearFilterVariety" + i).show();
            });
        } else {
            jQuery("#InfoVariety" + i).html("");
            jQuery("#DivFilterVarietyOK" + i).hide();
            jQuery("#DivClearFilterVariety" + i).hide();
        }
    } else {
        alerts.show({css: 'error', title: 'Important', message: 'Before adding, specify the Crop.! '});
        jQuery('#Variety' + i).val('');
        jQuery("#InfoVariety" + i).html("");
        jQuery("#DivVariety" + i).removeClass("DivListSelect");
    }
}

//BUSQUEDA DE Variables Measured
function FilterVariablesMeasuredTrials(Campo, i) {
//var id = Campo.id;
    var Value = Campo.value;
    var id_crop = jQuery("#id_crop").val();
    var Value = Value.replace(" ", "*quot*");
    if (id_crop !== '') {
        if (Value !== '') {
            jQuery("#DivFilterVariablesMeasured" + i).show();
            jQuery("#InfoVariablesMeasured" + i).addClass("DivListSelect");
            jQuery("#InfoVariablesMeasured" + i).load("/trial/FilterVariablesMeasuredTrials/?txt=" + Value + '&id_crop=' + id_crop + "&i=" + i, function () {
                jQuery("#DivFilterVariablesMeasured" + i).hide();
                jQuery("#DivFilterVariablesMeasuredOK" + i).show();
                jQuery("#DivClearFilterVariablesMeasured" + i).show();
            });
        } else {
            jQuery("#InfoVariablesMeasured" + i).html("");
            jQuery("#DivFilterVariablesMeasuredOK" + i).hide();
            jQuery("#DivClearFilterVariablesMeasured" + i).hide();
            jQuery("#InfoVariablesMeasured" + i).removeClass("DivListSelect");
        }
    } else {
        alerts.show({css: 'error', title: 'Important', message: 'Before adding, specify the Crop.! '});
        jQuery('#VariablesMeasured' + i).val('');
        jQuery("#InfoVariablesMeasured" + i).html("");
        jQuery("#InfoVariablesMeasured" + i).removeClass("DivListSelect");
    }
}
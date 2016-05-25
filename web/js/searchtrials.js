jQuery(document).ready(function () {

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

    jQuery("#searchterms").blur(function () {
        ValidSearchterms();
    });

    jQuery("#searchtermsoptions").change(function () {
        if (jQuery('#searchterms').val() !== '')
            ValidSearchterms();
    });

    jQuery("#searchprjname").blur(function () {
        if ((jQuery('#id_project').val() !== '') && (jQuery('#searchprjname').val() !== '')) {
            jQuery('#CheckProject').html("<img width='18' height='18' src='/images/success.png'>");
        } else {
            jQuery('#id_project').val('')
            jQuery('#searchprjname').val('')
            jQuery('#CheckProject').html("");
        }
        jQuery.ajax({
            type: "GET",
            url: "/trial/AssingWhere/",
            data: "field=id_project&value=" + jQuery('#id_project').val(),
            success: function () {
            }
        });
    });

    jQuery("#searchcontactperson").blur(function () {
        if ((jQuery('#id_contactperson').val() !== '') && (jQuery('#searchcontactperson').val() !== '')) {
            jQuery('#CheckContactperson').html("<img width='18' height='18' src='/images/success.png'>");
        } else {
            jQuery('#id_contactperson').val('')
            jQuery('#searchcontactperson').val('')
            jQuery('#CheckContactperson').html("");
        }
        jQuery.ajax({
            type: "GET",
            url: "/trial/AssingWhere/",
            data: "field=id_contactperson&value=" + jQuery('#id_contactperson').val(),
            success: function () {
            }
        });
    });

    jQuery("#searchcrpname").blur(function () {
        if ((jQuery('#id_crop').val() !== '') && (jQuery('#searchcrpname').val() !== '')) {
            jQuery('#CheckCrop').html("<img width='18' height='18' src='/images/success.png'>");
        } else {
            jQuery('#id_crop').val('')
            jQuery('#searchcrpname').val('')
            jQuery('#CheckCrop').html("");
        }
        jQuery.ajax({
            type: "GET",
            url: "/trial/AssingWhere/",
            data: "field=id_crop&value=" + jQuery('#id_crop').val(),
            success: function () {
            }
        });
    });

    jQuery("#searchtrltrialname").blur(function () {
        if ((jQuery('#id_trial').val() !== '') && (jQuery('#searchtrltrialname').val() !== '')) {
            jQuery('#CheckTrialname').html("<img width='18' height='18' src='/images/success.png'>");
        } else {
            jQuery('#id_trial').val('')
            jQuery('#searchtrltrialname').val('')
            jQuery('#CheckTrialname').html("");
        }
        jQuery.ajax({
            type: "GET",
            url: "/trial/AssingWhere/",
            data: "field=id_trial&value=" + jQuery('#id_trial').val(),
            success: function () {
            }
        });
    });

    jQuery("#searchtrnfplantingsowingfrom").blur(function () {
        if (jQuery('#searchtrnfplantingsowingfrom').val() !== '') {
            jQuery('#CheckSowingFrom').html("<img width='18' height='18' src='/images/success.png'>");
        } else {
            jQuery('#searchtrnfplantingsowingfrom').val('')
            jQuery('#CheckSowingFrom').html("");
        }

        if ((jQuery('#searchtrnfplantingsowingfrom').val() !== '') && (jQuery('#searchtrnfplantingsowingto').val() !== '')) {
            jQuery.ajax({
                type: "GET",
                url: "/trial/AssingWhere/",
                data: "field=created_at&value=" + jQuery('#searchtrnfplantingsowingfrom').val() + '&value2=' + jQuery('#searchtrnfplantingsowingto').val(),
                success: function () {
                }
            });
        }
    });

    jQuery("#searchtrnfplantingsowingto").blur(function () {
        if (jQuery('#searchtrnfplantingsowingto').val() !== '') {
            jQuery('#CheckSowingTo').html("<img width='18' height='18' src='/images/success.png'>");
        } else {
            jQuery('#searchtrnfplantingsowingto').val('')
            jQuery('#CheckSowingTo').html("");
        }
        if ((jQuery('#searchtrnfplantingsowingfrom').val() !== '') && (jQuery('#searchtrnfplantingsowingto').val() !== '')) {
            jQuery.ajax({
                type: "GET",
                url: "/trial/AssingWhere/",
                data: "field=created_at&value=" + jQuery('#searchtrnfplantingsowingfrom').val() + '&value2=' + jQuery('#searchtrnfplantingsowingto').val(),
                success: function () {
                }
            });
        }
    });

    function ValidSearchterms() {
        var searchterms = jQuery('#searchterms').val();
        var searchtermsoptions = jQuery('#searchtermsoptions').val();
        searchterms = searchterms.replace('+', '%2B');
        if (jQuery('#searchterms').val() !== '') {
            jQuery('#CheckSearchterms').html("<img width='18' height='18' src='/images/success.png'>");
        } else {
            jQuery('#searchterms').val('')
            jQuery('#CheckSearchterms').html("");
        }
        jQuery.ajax({
            type: "GET",
            url: "/trial/ValidSearchterms/",
            data: "searchterms=" + searchterms + "&searchtermsoptions=" + searchtermsoptions,
            success: function (data) {
                if (data) {
                    jQuery('#searchterms').val('')
                    jQuery('#CheckSearchterms').html("");
                    alerts.show({css: 'error', title: 'Search Terms', message: 'Not found information, for terms written.!'});
                }
            }
        });
    }
});

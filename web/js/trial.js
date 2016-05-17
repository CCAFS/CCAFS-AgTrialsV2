$(document).ready(function() {
    $("#prjprojectimplementingperiodstartdate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#prjprojectimplementingperiodenddate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#prjprojectimplementingperiodstartdate").on("dp.change", function(e) {
        $('#prjprojectimplementingperiodenddate').data("datepicker").minDate(e.date);
    });
    $("#prjprojectimplementingperiodenddate").on("dp.change", function(e) {
        $('#prjprojectimplementingperiodstartdate').data("datepicker").maxDate(e.date);
    });

    $("#trlimplementingperiodstartdate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#trlimplementingperiodenddate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#trlimplementingperiodstartdate").on("dp.change", function(e) {
        $('#trlimplementingperiodenddate').data("datepicker").minDate(e.date);
    });
    $("#trlimplementingperiodenddate").on("dp.change", function(e) {
        $('#trlimplementingperiodstartdate').data("datepicker").maxDate(e.date);
    });

    for (var i = 1; i <= 10; i++) {
        $("#trnfplantingsowingstartdate" + i).datepicker({dateFormat: 'yy-mm-dd'});
        $("#trnfplantingsowingenddate" + i).datepicker({dateFormat: 'yy-mm-dd'});
        $("#trnfphysiologicalmaturitystardate" + i).datepicker({dateFormat: 'yy-mm-dd'});
        $("#trnfphysiologicalmaturityenddate" + i).datepicker({dateFormat: 'yy-mm-dd'});
        $("#trnfharveststartdate" + i).datepicker({dateFormat: 'yy-mm-dd'});
        $("#trnfharvestenddate" + i).datepicker({dateFormat: 'yy-mm-dd'});
    }

    $("#tb_trial_trltrialpermissions_open_to_all_users").click(function() {
        $("#PermissionsUsers").css("display", "none");
        $("#tbtrial_groups").css("display", "none");
    });

    $("#tb_trial_trltrialpermissions_open_to_specified_users").click(function() {
        $("#PermissionsUsers").css("display", "block");
        $("#PermissionsGroups").css("display", "none");
    });

    $("#tb_trial_trltrialpermissions_open_to_specified_groups").click(function() {
        $("#PermissionsUsers").css("display", "none");
        $("#PermissionsGroups").css("display", "block");
    });

    $("#tb_trial_trltrialpermissions_public_domain").click(function() {
        $("#PermissionsUsers").css("display", "none");
        $("#PermissionsGroups").css("display", "none");
    });

    $("#tb_trial_trltriallicense").focus(function() {
        this.select();
    });

    //DEFINICION DE CAMPOS OBLIGATORIOS PARA (Lead of Project)
    var CamposLeadofProject = {
        'cnprfirstname': 'First name',
        'cnprlastname': 'Last name',
        'insnameleadofproject': 'Name Institutions',
        'namecountryinstitutionleadofproject': 'Country Institutions',
        'cnpremail': 'Email'
    };
    //DEFINICION DE CAMPOS OBLIGATORIOS PARA (Project Implementing Institutions)
    var CamposProjectImplementingInstitutions = {
        'insnameprojectimplementinginstitutions': 'Name Institutions',
        'namecountryprojectimplementinginstitutions': 'Country Institutions'
    };
    //DEFINICION DE CAMPOS OBLIGATORIOS PARA (Project Implementing period)
    var CamposProjectImplementingperiod = {
        'prjprojectimplementingperiodstartdate': 'Start Date',
        'prjprojectimplementingperiodenddate': 'End Date'
    };
    //DEFINICION DE CAMPOS OBLIGATORIOS PARA (Funding for project)
    var CamposFundingforproject = {
        'dnrname': 'Donor Dame'
    };
    //DEFINICION DE CAMPOS OBLIGATORIOS PARA (Project Information)
    var CamposProjectinformation = {
        'prjabstract': 'Abstract',
        'prjkeywords': 'Keywords'
    };
    //DEFINICION DE CAMPOS OBLIGATORIOS PARA (Trial Manager)
    var CamposTrialManager = {
        'cnprfirstnametrialmanager': 'First name',
        'cnprlastnametrialmanager': 'Last name',
        'insnametrialmanager': 'Name Institutions',
        'namecountryinstitutiontrialmanager': 'Country Institutions',
        'cnpremailtrialmanager': 'Email',
        'tb_trial[id_rolecontactperson]': 'Primary Role of Contact Person'
    };
    //DEFINICION DE CAMPOS OBLIGATORIOS PARA (Trial Implementingperiod)
    var CamposTrialImplementingperiod = {
        'trlimplementingperiodstartdate': 'Start Date',
        'trlimplementingperiodenddate': 'End Date'
    };
    //DEFINICION DE CAMPOS OBLIGATORIOS PARA (Trial Location)
    var CamposTrialLocation = {
        'trlcname': 'Name',
        'countrytriallocation': 'Country',
//        'districttriallocation': 'District/Satate/Province Level',
//        'subdistricttriallocation': 'Sub-district/Division Level',
//        'villagetriallocation': 'Village Level',
        'trlclatitude': 'Latitude',
        'trlclongitude': 'Longitude',
        'trlcaltitude': 'Altitude'
    };
    //DEFINICION DE CAMPOS OBLIGATORIOS PARA (Trial Characteristics)
    var CamposTrialCharacteristics = {
        'trltrialname': 'Trial Name',
        'trltrialobjectives': 'Trial Objectives'
    };


    $("#FormTrial").find(':input').each(function() {
//        if (this.id !== '')
//            CampoNormal(this.id);
    });

    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO
    $("#FormTrial").submit(function(event) {
        var Ico1 = "<img width='13' height='13' src='/images/Arrow-icon.png'> ";
        var Ico2 = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";

        //inicio: VALIDACION (Project/Trial Groups Name)
        if ($('#prjname').attr('value') === '') {
            BanderaFaltantes = true;
            MensajeFaltantes += Ico1 + "<b>Project/Trial Groups</b> \n &ensp;&ensp;&ensp; " + Ico2 + "Name \n";
            CampoObligatorio('prjname');
        } else {
            CampoNormalObligatorio('prjname');
        }
        //fin: VALIDACION (Project/Trial Groups Name)

        //inicio: VALIDACION (Lead of Project)
        var MensajeLeadofProject = "";
        $.each(CamposLeadofProject, function(Id, Campo) {
            if ($('#' + Id).attr('value') === '') {
                BanderaFaltantes = true;
                MensajeLeadofProject += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeLeadofProject !== '') {
            MensajeFaltantes += Ico1 + "<b>Lead of Project</b> \n" + MensajeLeadofProject;
        }
        //fin: VALIDACION (Lead of Project)

        //inicio: VALIDACION (Project Implementing Institutions)
        var MensajeProjectImplementingInstitutions = "";
        $.each(CamposProjectImplementingInstitutions, function(Id, Campo) {
            if ($('#' + Id).attr('value') === '') {
                BanderaFaltantes = true;
                MensajeProjectImplementingInstitutions += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeProjectImplementingInstitutions !== '') {
            MensajeFaltantes += Ico1 + "<b>Project Implementing Institutions</b> \n" + MensajeProjectImplementingInstitutions;
        }
        //fin: VALIDACION (Project Implementing Institutions)

        //inicio: VALIDACION (Project Implementing period)
        var MensajeProjectImplementingperiod = "";
        $.each(CamposProjectImplementingperiod, function(Id, Campo) {
            if ($('#' + Id).attr('value') === '') {
                BanderaFaltantes = true;
                MensajeProjectImplementingperiod += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeProjectImplementingperiod !== '') {
            MensajeFaltantes += Ico1 + "<b>Project Implementing Period</b> \n" + MensajeProjectImplementingperiod;
        }
        //fin: VALIDACION (Project Implementing period)

        //inicio: VALIDACION (Funding for project)
        var MensajeFundingforproject = "";
        $.each(CamposFundingforproject, function(Id, Campo) {
            if ($('#' + Id).attr('value') === '') {
                BanderaFaltantes = true;
                MensajeFundingforproject += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeFundingforproject !== '') {
            MensajeFaltantes += Ico1 + "<b>Funding for Project</b> \n" + MensajeFundingforproject;
        }
        //fin: VALIDACION (Funding for project)

        //inicio: VALIDACION (Project information)
        var MensajeProjectinformation = "";
        $.each(CamposProjectinformation, function(Id, Campo) {
            if ($('#' + Id).attr('value') === '') {
                BanderaFaltantes = true;
                MensajeProjectinformation += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeProjectinformation !== '') {
            MensajeFaltantes += Ico1 + "<b>Project Information</b> \n" + MensajeProjectinformation;
        }
        //fin: VALIDACION (Project information)

        //inicio: VALIDACION (Trial Manager)
        var MensajeTrialManager = "";
        $.each(CamposTrialManager, function(Id, Campo) {
            if (Id === 'tb_trial[id_rolecontactperson]') {
                var id_rolecontactperson = GetValueSelect(Id);
                if (id_rolecontactperson === '') {
                    BanderaFaltantes = true;
                    MensajeTrialManager += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " \n";
                    SelectObligatorio(Id);
                } else {
                    SelectNormalObligatorio(Id);
                }
            } else {
                if ($('#' + Id).attr('value') === '') {
                    BanderaFaltantes = true;
                    MensajeTrialManager += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " \n";
                    CampoObligatorio(Id);
                } else {
                    CampoNormalObligatorio(Id);
                }
            }
        });
        if (MensajeTrialManager !== '') {
            MensajeFaltantes += Ico1 + "<b>Trial Manager</b> \n" + MensajeTrialManager;
        }
        //fin: VALIDACION (Trial Manager)

        //inicio: VALIDACION (Trial Implementing period)
        var MensajeTrialImplementingperiod = "";
        $.each(CamposTrialImplementingperiod, function(Id, Campo) {
            if ($('#' + Id).attr('value') === '') {
                BanderaFaltantes = true;
                MensajeTrialImplementingperiod += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeTrialImplementingperiod !== '') {
            MensajeFaltantes += Ico1 + "<b>Trial Implementing Period</b> \n" + MensajeTrialImplementingperiod;
        }
        //fin: VALIDACION (Trial Implementing period)

        //inicio: VALIDACION (Trial Location)
        var MensajeTrialLocation = "";
        $.each(CamposTrialLocation, function(Id, Campo) {
            if ($('#' + Id).attr('value') === '') {
                BanderaFaltantes = true;
                MensajeTrialLocation += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeTrialLocation !== '') {
            MensajeFaltantes += Ico1 + "<b>Trial Location</b> \n" + MensajeTrialLocation;
        }
        //fin: VALIDACION (Trial Location)

        //inicio: VALIDACION (Trial Characteristics)
        var MensajeTrialCharacteristics = "";
        $.each(CamposTrialCharacteristics, function(Id, Campo) {
            if ($('#' + Id).attr('value') === '') {
                BanderaFaltantes = true;
                MensajeTrialCharacteristics += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeTrialCharacteristics !== '') {
            MensajeFaltantes += Ico1 + "<b>Trial Characteristics</b> \n" + MensajeTrialCharacteristics;
        }
        //fin: VALIDACION (Trial Characteristics)


        //VERIFICACION MENSAJE DE ALERTA
        if (BanderaFaltantes) {
            Mensaje(MensajeFaltantes);
            event.preventDefault();
        }
    });
});
//fin: FUNCIONES PARA EL CAMBIO DE COLOR



function GoToLicence() {
    var Texto = "<span><b>IMPORTANT: Read this before you build your license </b></br></br>We now ask you to designate the intellectual property rights of the agricultural evaluation data you are registering through this application. Now you will be taken to a license generator developed by Creative Commons. It will ask you a series of questions whose responses determine the data sharing and use policy for your data set. At this point, the application will develop lines of computer code designating the intellectual property rights. Copy these lines of code from the pop-up window back into the main window of the application.</span>";
    jConfirm(Texto, 'Creative Commons', function(r) {
        if (r) {
            window.open('https://creativecommons.org/choose/', '_blank');
        }
    });
}



//DESCARGA DE ARCHIVOS TRIALS
function DownloadFileTrial(id_trial, id_crop, typefile) {
    var License = $("#tb_trial_trltriallicense").val();
    var Icon = "<img width='13' height='13' src='/images/bullet-black-icon.png'> ";
    $.ajax({
        type: "GET",
        url: "/trial/ValidatePermissionsDownload/",
        data: "id_trial=" + id_trial,
        success: function(data) {
            if (data === 'Un-Authenticated') {
                jAlert(Icon + " <b>Sorry!</b> You must be authenticated. <br>" + Icon + " Please contact the Trial Manager.", 'Info', 'Important', null);
            } else if (data === 'Not-Permissions') {
                jAlert(Icon + " <b>Sorry!</b> You do not have the permissions to download the file. <br>" + Icon + " Please contact the Trial Manager.", 'Info', 'Important', null);
            } else {
                if (License !== '') {
                    License += "<br><br><b>Do you agree with the license?</b>";
                    jConfirm(License, 'Agreement Licence', function(r) {
                        if (r) {
                            window.location = "/DownloadFileTrial?id_trial=" + id_trial + "&id_crop=" + id_crop + "&typefile=" + typefile;
                        }
                    });
                } else {
                    window.location = "/DownloadFileTrial?id_trial=" + id_trial + "&id_crop=" + id_crop + "&typefile=" + typefile;
                }
            }
        }
    });
}

//DESCARGAMOS EL TEMPLATE DE DATOS
function DownloadDataTemplateCrop(i) {
    var replication = $("#trnfnumberofreplicates" + i).val();
    window.location = "/DownloadDataTemplate?i=" + i + "&replication=" + replication;
}
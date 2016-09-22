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
    jQuery("#prjprojectimplementingperiodstartdate").datepicker({dateFormat: 'yy-mm-dd'});
    jQuery("#prjprojectimplementingperiodenddate").datepicker({dateFormat: 'yy-mm-dd'});
    jQuery("#prjprojectimplementingperiodstartdate").on("dp.change", function (e) {
        jQuery('#prjprojectimplementingperiodenddate').data("datepicker").minDate(e.date);
    });
    jQuery("#prjprojectimplementingperiodenddate").on("dp.change", function (e) {
        jQuery('#prjprojectimplementingperiodstartdate').data("datepicker").maxDate(e.date);
    });

    jQuery("#trlimplementingperiodstartdate").datepicker({dateFormat: 'yy-mm-dd'});
    jQuery("#trlimplementingperiodenddate").datepicker({dateFormat: 'yy-mm-dd'});
    jQuery("#trlimplementingperiodstartdate").on("dp.change", function (e) {
        jQuery('#trlimplementingperiodenddate').data("datepicker").minDate(e.date);
    });
    jQuery("#trlimplementingperiodenddate").on("dp.change", function (e) {
        jQuery('#trlimplementingperiodstartdate').data("datepicker").maxDate(e.date);
    });

    for (var i = 1; i <= 10; i++) {
        jQuery("#trnfplantingsowingstartdate" + i).datepicker({dateFormat: 'yy-mm-dd'});
        jQuery("#trnfplantingsowingenddate" + i).datepicker({dateFormat: 'yy-mm-dd'});
        jQuery("#trnfphysiologicalmaturitystardate" + i).datepicker({dateFormat: 'yy-mm-dd'});
        jQuery("#trnfphysiologicalmaturityenddate" + i).datepicker({dateFormat: 'yy-mm-dd'});
        jQuery("#trnfharveststartdate" + i).datepicker({dateFormat: 'yy-mm-dd'});
        jQuery("#trnfharvestenddate" + i).datepicker({dateFormat: 'yy-mm-dd'});
    }

    jQuery("#tb_trial_trltrialpermissions_open_to_all_users").click(function () {
        jQuery("#PermissionsUsers").css("display", "none");
        jQuery("#tbtrial_groups").css("display", "none");
    });

    jQuery("#tb_trial_trltrialpermissions_open_to_specified_users").click(function () {
        jQuery("#PermissionsUsers").css("display", "block");
        jQuery("#PermissionsGroups").css("display", "none");
    });

    jQuery("#tb_trial_trltrialpermissions_open_to_specified_groups").click(function () {
        jQuery("#PermissionsUsers").css("display", "none");
        jQuery("#PermissionsGroups").css("display", "block");
    });

    jQuery("#tb_trial_trltrialpermissions_public_domain").click(function () {
        jQuery("#PermissionsUsers").css("display", "none");
        jQuery("#PermissionsGroups").css("display", "none");
    });

    jQuery("#tb_trial_trltriallicense").focus(function () {
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
//        'dnrname': 'Donor Dame'
    };
    //DEFINICION DE CAMPOS OBLIGATORIOS PARA (Project Information)
    var CamposProjectinformation = {
//        'prjabstract': 'Abstract',
//        'prjkeywords': 'Keywords'
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
//        'trlimplementingperiodstartdate': 'Start Date',
//        'trlimplementingperiodenddate': 'End Date'
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


    jQuery("#FormTrial").find(':input').each(function () {
//        if (this.id !== '')
//            CampoNormal(this.id);
    });

    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO
    jQuery("#FormTrial").submit(function (event) {
        var Ico1 = "<img width='13' height='13' src='/images/Arrow-icon.png'> ";
        var Ico2 = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";

        //inicio: VALIDACION (Project/Trial Groups Name)
        if (jQuery('#prjname').val() === '') {
            BanderaFaltantes = true;
            MensajeFaltantes += Ico1 + "<b>Project/Trial Groups</b> <br> &ensp;&ensp;&ensp; " + Ico2 + "Name <br>";
            CampoObligatorio('prjname');
        } else {
            CampoNormalObligatorio('prjname');
        }
        //fin: VALIDACION (Project/Trial Groups Name)

        //inicio: VALIDACION (Lead of Project)
        var MensajeLeadofProject = "";
        jQuery.each(CamposLeadofProject, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeLeadofProject += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " <br>";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeLeadofProject !== '') {
            MensajeFaltantes += Ico1 + "<b>Lead of Project</b> <br>" + MensajeLeadofProject;
        }
        //fin: VALIDACION (Lead of Project)

        //inicio: VALIDACION (Project Implementing Institutions)
        var MensajeProjectImplementingInstitutions = "";
        jQuery.each(CamposProjectImplementingInstitutions, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeProjectImplementingInstitutions += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " <br>";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeProjectImplementingInstitutions !== '') {
            MensajeFaltantes += Ico1 + "<b>Project Implementing Institutions</b> <br>" + MensajeProjectImplementingInstitutions;
        }
        //fin: VALIDACION (Project Implementing Institutions)

        //inicio: VALIDACION (Project Implementing period)
        var MensajeProjectImplementingperiod = "";
        jQuery.each(CamposProjectImplementingperiod, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeProjectImplementingperiod += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " <br>";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeProjectImplementingperiod !== '') {
            MensajeFaltantes += Ico1 + "<b>Project Implementing Period</b> <br>" + MensajeProjectImplementingperiod;
        }
        //fin: VALIDACION (Project Implementing period)

        //inicio: VALIDACION (Funding for project)
        var MensajeFundingforproject = "";
        jQuery.each(CamposFundingforproject, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeFundingforproject += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " <br>";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeFundingforproject !== '') {
            MensajeFaltantes += Ico1 + "<b>Funding for Project</b> <br>" + MensajeFundingforproject;
        }
        //fin: VALIDACION (Funding for project)

        //inicio: VALIDACION (Project information)
        var MensajeProjectinformation = "";
        jQuery.each(CamposProjectinformation, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeProjectinformation += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " <br>";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeProjectinformation !== '') {
            MensajeFaltantes += Ico1 + "<b>Project Information</b> <br>" + MensajeProjectinformation;
        }
        //fin: VALIDACION (Project information)

        //inicio: VALIDACION (Trial Manager)
        var MensajeTrialManager = "";
        jQuery.each(CamposTrialManager, function (Id, Campo) {
            if (Id === 'tb_trial[id_rolecontactperson]') {
                var id_rolecontactperson = GetValueSelect(Id);
                if (id_rolecontactperson === '') {
                    BanderaFaltantes = true;
                    MensajeTrialManager += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " <br>";
                    SelectObligatorio(Id);
                } else {
                    SelectNormalObligatorio(Id);
                }
            } else {
                if (jQuery('#' + Id).val() === '') {
                    BanderaFaltantes = true;
                    MensajeTrialManager += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " <br>";
                    CampoObligatorio(Id);
                } else {
                    CampoNormalObligatorio(Id);
                }
            }
        });
        if (MensajeTrialManager !== '') {
            MensajeFaltantes += Ico1 + "<b>Trial Manager</b> <br>" + MensajeTrialManager;
        }
        //fin: VALIDACION (Trial Manager)

        //inicio: VALIDACION (Trial Implementing period)
        var MensajeTrialImplementingperiod = "";
        jQuery.each(CamposTrialImplementingperiod, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeTrialImplementingperiod += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " <br>";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeTrialImplementingperiod !== '') {
            MensajeFaltantes += Ico1 + "<b>Trial Implementing Period</b> <br>" + MensajeTrialImplementingperiod;
        }
        //fin: VALIDACION (Trial Implementing period)

        //inicio: VALIDACION (Trial Location)
        var MensajeTrialLocation = "";
        jQuery.each(CamposTrialLocation, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeTrialLocation += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " <br>";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeTrialLocation !== '') {
            MensajeFaltantes += Ico1 + "<b>Trial Location</b> <br>" + MensajeTrialLocation;
        }
        //fin: VALIDACION (Trial Location)

        //inicio: VALIDACION (Trial Characteristics)
        var MensajeTrialCharacteristics = "";
        jQuery.each(CamposTrialCharacteristics, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeTrialCharacteristics += "&ensp;&ensp;&ensp; " + Ico2 + Campo + " <br>";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        if (MensajeTrialCharacteristics !== '') {
            MensajeFaltantes += Ico1 + "<b>Trial Characteristics</b> <br>" + MensajeTrialCharacteristics;
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
function GetInfoRowVM(i) {
    var id_crop = jQuery("#id_crop" + i).val();
    var name = jQuery("#VariablesMeasured" + i).val();
    jQuery("#id_crop_variablesmeasured").val(id_crop);
    jQuery("#vrmsname").val(name);
}


function AddVariablesMeasured() {

    var id_crop_variablesmeasured = jQuery('#id_crop_variablesmeasured').val();
    var id_traitclass = jQuery('#id_traitclass').val();
    var vrmsname = jQuery('#vrmsname').val();
    var vrmsshortname = jQuery('#vrmsshortname').val();
    var vrmsdefinition = jQuery('#vrmsdefinition').val();
    var vrmnmethod = jQuery('#vrmnmethod').val();
    var vrmsunit = jQuery('#vrmsunit').val();

    var Ico2 = "<img src='/images/bullet-black-icon.png'> ";
    var BanderaFaltantes = false;
    var MensajeFaltantes = "";

    //inicio: VALIDACION (Project/Trial Groups Name)
    if (id_crop_variablesmeasured === '') {
        BanderaFaltantes = true;
        MensajeFaltantes += Ico2 + "Crop <br>";
        CampoObligatorio('id_crop_variablesmeasured');
    } else {
        CampoNormalObligatorio('id_crop_variablesmeasured');
    }
    if (id_traitclass === '') {
        BanderaFaltantes = true;
        MensajeFaltantes += Ico2 + "Trait class <br>";
        CampoObligatorio('id_traitclass');
    } else {
        CampoNormalObligatorio('id_traitclass');
    }
    if (vrmsname === '') {
        BanderaFaltantes = true;
        MensajeFaltantes += Ico2 + "Name <br>";
        CampoObligatorio('vrmsname');
    } else {
        CampoNormalObligatorio('vrmsname');
    }
    if (vrmsunit === '') {
        BanderaFaltantes = true;
        MensajeFaltantes += Ico2 + "Unit <br>";
        CampoObligatorio('vrmsunit');
    } else {
        CampoNormalObligatorio('vrmsunit');
    }

    if (BanderaFaltantes) {
        Mensaje(MensajeFaltantes);
    } else {
        jQuery.ajax({
            type: "GET",
            url: "/variablesmeasured/AddVariablesMeasured/",
            data: {id_crop: id_crop_variablesmeasured, id_traitclass: id_traitclass, vrmsname: vrmsname, vrmsshortname: vrmsshortname, vrmsdefinition: vrmsdefinition, vrmnmethod: vrmnmethod, vrmsunit: vrmsunit},
            success: function () {
                jQuery('#id_crop_variablesmeasured').val('');
                jQuery('#id_traitclass').val('');
                jQuery('#vrmsname').val('');
                jQuery('#vrmsshortname').val('');
                jQuery('#vrmsdefinition').val('');
                jQuery('#vrmnmethod').val('');
                jQuery('#vrmsunit').val('');
                $.confirm({
                    icon: 'glyphicon glyphicon-saved',
                    columnClass: 'col-md-6 col-md-offset-3',
                    closeIconClass: 'fa fa-close',
                    autoClose: 'cancel|3000',
                    title: '',
                    confirmButton: ' ',
                    cancelButton: 'Close',
                    content: 'The item was created successfully.',
                    cancel: function () {}
                });
            }
        });
    }
}


function GetInfoRowV(i) {
    var id_crop = jQuery("#id_crop" + i).val();
    var name = jQuery("#Variety" + i).val();
    jQuery("#id_crop_variety").val(id_crop);
    jQuery("#vrtname").val(name);
}


function AddVariety() {
    var id_crop_variety = jQuery('#id_crop_variety').val();
    var vrtorigin = jQuery('#vrtorigin').val();
    var vrtname = jQuery('#vrtname').val();
    var vrtsynonymous = jQuery('#vrtsynonymous').val();
    var vrtdescription = jQuery('#vrtdescription').val();

    var Ico2 = "<img src='/images/bullet-black-icon.png'> ";
    var BanderaFaltantes = false;
    var MensajeFaltantes = "";

    //inicio: VALIDACION (Project/Trial Groups Name)
    if (id_crop_variety === '') {
        BanderaFaltantes = true;
        MensajeFaltantes += Ico2 + "Crop <br>";
        CampoObligatorio('id_crop_variety');
    } else {
        CampoNormalObligatorio('id_crop_variety');
    }
    if (vrtorigin === '') {
        BanderaFaltantes = true;
        MensajeFaltantes += Ico2 + "Origin <br>";
        CampoObligatorio('vrtorigin');
    } else {
        CampoNormalObligatorio('vrtorigin');
    }
    if (vrtname === '') {
        BanderaFaltantes = true;
        MensajeFaltantes += Ico2 + "Name <br>";
        CampoObligatorio('vrtname');
    } else {
        CampoNormalObligatorio('vrtname');
    }

    if (BanderaFaltantes) {
        Mensaje(MensajeFaltantes);
    } else {
        jQuery.ajax({
            type: "GET",
            url: "/variety/AddVariety/",
            data: {id_crop: id_crop_variety, vrtorigin: vrtorigin, vrtname: vrtname, vrtsynonymous: vrtsynonymous, vrtdescription: vrtdescription},
            success: function () {
                jQuery('#id_crop_variety').val('');
                jQuery('#vrtorigin').val('');
                jQuery('#vrtname').val('');
                jQuery('#vrtsynonymous').val('');
                jQuery('#vrtdescription').val('');
                $.confirm({
                    icon: 'glyphicon glyphicon-saved',
                    columnClass: 'col-md-6 col-md-offset-3',
                    closeIconClass: 'fa fa-close',
                    autoClose: 'cancel|3000',
                    title: '',
                    confirmButton: ' ',
                    cancelButton: 'Close',
                    content: 'The item was created successfully.',
                    cancel: function () {}
                });
            }
        });
    }
}


function GoToLicence() {
    var Texto = "<b>IMPORTANT: Read this before you build your license </b></br></br>We now ask you to designate the intellectual property rights of the agricultural evaluation data you are registering through this application. Now you will be taken to a license generator developed by Creative Commons. It will ask you a series of questions whose responses determine the data sharing and use policy for your data set. At this point, the application will develop lines of computer code designating the intellectual property rights. Copy these lines of code from the pop-up window back into the main window of the application.";
    $.confirm({
        icon: 'glyphicon glyphicon-subtitles',
        columnClass: 'col-md-6 col-md-offset-3',
        closeIconClass: 'fa fa-close',
        autoClose: 'confirm|62000',
        title: 'Creative Commons',
        confirmButton: 'Continue',
        cancelButton: 'Close',
        content: Texto,
        confirm: function () {
            window.open('https://creativecommons.org/choose/', '_blank');
        },
        cancel: function () {

        }
    });
}

//DESCARGA DE ARCHIVOS TRIALS
function DownloadFileTrial(id_trial, id_crop, typefile) {
    var License = '<div><a href="http://creativecommons.org/licenses/by-nc-nd/3.0/" rel="license"><img src="http://i.creativecommons.org/l/by-nc-nd/3.0/88x31.png" style="border-width:0; width: 88px; height: 31px;" alt="Creative Commons License"></a><br>This <span rel="dct:type" href="http://purl.org/dc/dcmitype/Text" xmlns:dct="http://purl.org/dc/terms/">work</span> is licensed under a <a href="http://creativecommons.org/licenses/by-nc-nd/3.0/" rel="license">Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License</a>.</div>';
    var Icon = "<img width='13' height='13' src='/images/bullet-black-icon.png'> ";
    jQuery.ajax({
        type: "GET",
        url: "/trial/ValidatePermissionsDownload/",
        data: "id_trial=" + id_trial,
        success: function (data) {
            if (data === 'Un-Authenticated') {
                alerts.show({css: 'error', title: 'Important!', message: Icon + " <b>Sorry!</b> You must be authenticated. <br>" + Icon + " Please contact the Trial Manager."});
            } else if (data === 'Not-Permissions') {
                alerts.show({css: 'error', title: 'Important!', message: Icon + " <b>Sorry!</b> You do not have the permissions to download the file. <br>" + Icon + " Please contact the Trial Manager."});
            } else {
                if (License !== '') {
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
                            window.location = "/DownloadFileTrial?id_trial=" + id_trial + "&id_crop=" + id_crop + "&typefile=" + typefile;
                        },
                        cancel: function () {}
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
    var replication = jQuery("#trnfnumberofreplicates" + i).val();
    window.location = "/DownloadDataTemplate?i=" + i + "&replication=" + replication;
}

function wopen(trial) {
    window.open("/trial/" + trial, "Trial", "width=800,height=800,scrollbars=1");
}
+function($) {

    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO DE CONTACT PERSON
    var FieldContactperson = {
        'tb_contactperson_cnprfirstname': 'First name',
        'tb_contactperson_cnprlastname': 'Last name',
        'tb_contactperson_id_institution': 'Institutions',
        'tb_contactperson_cnpremail': 'Email'
    };
    $("#FormContactperson").submit(function(event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldContactperson, function(Id, Campo) {
            if ($('#' + Id).val() == '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        CheckError('FormContactperson', event, BanderaFaltantes, MensajeFaltantes);
    });
    //fin: VALIDAMOS EL ENVIO DEL FORMULARIO DE CONTACT PERSON
    //
    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO DE CROP
    var FieldCrop = {
        'tb_crop_crpname': 'Name'
    };
    $("#FormCrop").submit(function(event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldCrop, function(Id, Campo) {
            if ($('#' + Id).val() == '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        CheckError('FormCrop', event, BanderaFaltantes, MensajeFaltantes);
    });
    //fin: VALIDAMOS EL ENVIO DEL FORMULARIO DE CROP
    //
    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO DE DONOR
    var FieldDonor = {
        'tb_donor_dnrname': 'Name'
    };
    $("#FormDonor").submit(function(event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldDonor, function(Id, Campo) {
            if ($('#' + Id).val() == '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        CheckError('FormDonor', event, BanderaFaltantes, MensajeFaltantes);
    });
    //fin: VALIDAMOS EL ENVIO DEL FORMULARIO DE DONOR
    //
    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO DE EXPERIMENTAL DESIGN
    var FieldExperimentaldesign = {
        'tb_experimentaldesign_xpdsname': 'Name'
    };
    $("#FormExperimentaldesign").submit(function(event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldExperimentaldesign, function(Id, Campo) {
            if ($('#' + Id).val() == '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        CheckError('FormExperimentaldesign', event, BanderaFaltantes, MensajeFaltantes);
    });
    //fin: VALIDAMOS EL ENVIO DEL FORMULARIO DE EXPERIMENTAL DESIGN
    //
    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO DE EXPERIMENTAL DESIGN
    var FieldInstitution = {
        'tb_institution_insname': 'Name',
        'tb_institution[id_country]': 'Country'
    };
    $("#FormInstitution").submit(function(event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        var Valor = '';
        $.each(FieldInstitution, function(Id, Campo) {
            if (Id == 'tb_institution[id_country]')
                Valor = $('select[id=tb_institution[id_country]]').val();
            else
                Valor = $('#' + Id).val();

            if (Valor == '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " \n";
                if (Id == 'tb_institution[id_country]')
                    SelectObligatorio(Id);
                else
                    CampoObligatorio(Id);
            } else {
                if (Id == 'tb_institution[id_country]')
                    SelectNormalObligatorio(Id);
                else
                    CampoNormalObligatorio(Id);
            }
        });
        CheckError('FormInstitution', event, BanderaFaltantes, MensajeFaltantes);
    });
    //fin: VALIDAMOS EL ENVIO DEL FORMULARIO DE EXPERIMENTAL DESIGN
    //
    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO DE PROJECT
    var FieldProject = {
        'tb_project_prjname': 'Name',
        'tb_project_id_leadofproject': 'Lead of project',
        'tb_project_id_projectimplementinginstitutions': 'Project implementing institutions',
        'tb_project_prjprojectimplementingperiodstartdate': 'Project implementing period start date',
        'tb_project_prjprojectimplementingperiodenddate': 'Project implementing period end date',
        'tb_project_id_donor': 'Donor',
        'tb_project_prjabstract': 'Abstract',
        'tb_project_prjkeywords': 'Keywords'
    };
    $("#FormProject").submit(function(event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldProject, function(Id, Campo) {
            if ($('#' + Id).val() == '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        CheckError('FormProject', event, BanderaFaltantes, MensajeFaltantes);
    });
    //fin: VALIDAMOS EL ENVIO DEL FORMULARIO DE PROJECT
    //
    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO DE ROLE CONTACT PERSON
    var FieldRolecontactperson = {
        'tb_rolecontactperson_rcpname': 'Name'
    };
    $("#FormRolecontactperson").submit(function(event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldRolecontactperson, function(Id, Campo) {
            if ($('#' + Id).val() == '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        CheckError('FormRolecontactperson', event, BanderaFaltantes, MensajeFaltantes);
    });
    //fin: VALIDAMOS EL ENVIO DEL FORMULARIO DE ROLE CONTACT PERSON
    //
    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO DE TRAIT CLASS
    var FieldTraitclass = {
        'tb_traitclass_trclname': 'Name'
    };
    $("#FormTraitclass").submit(function(event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldTraitclass, function(Id, Campo) {
            if ($('#' + Id).val() == '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        CheckError('FormTraitclass', event, BanderaFaltantes, MensajeFaltantes);
    });
    //fin: VALIDAMOS EL ENVIO DEL FORMULARIO DE TRAIT CLASS
    //
    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO DE TRIAL LOCATION
    var FieldTriallocation = {
        'tb_triallocation_trlcname': 'Name',
        'tb_triallocation_trlclatitude': 'Latitude',
        'tb_triallocation_trlclongitude': 'Longitude',
        'countrytriallocation': 'Country',
        'districttriallocation': 'District/Satate/Province Level',
    };
    $("#FormTriallocation").submit(function(event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldTriallocation, function(Id, Campo) {
            if ($('#' + Id).val() == '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        CheckError('FormTriallocation', event, BanderaFaltantes, MensajeFaltantes);
    });
    //fin: VALIDAMOS EL ENVIO DEL FORMULARIO DE TRIAL LOCATION
    //
    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO DE VARIABLE MEASURED
    var FieldVariablesmeasured = {
        'tb_variablesmeasured_id_crop': 'Crop',
        'tb_variablesmeasured_id_traitclass': 'Trait class',
        'tb_variablesmeasured_vrmsname': 'Name',
        'tb_variablesmeasured_vrmsunit': 'Unit'
    };
    $("#FormVariablesmeasured").submit(function(event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldVariablesmeasured, function(Id, Campo) {
            if ($('#' + Id).val() == '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        CheckError('FormVariablesmeasured', event, BanderaFaltantes, MensajeFaltantes);
    });
    //fin: VALIDAMOS EL ENVIO DEL FORMULARIO DE VARIABLE MEASURED
    //
    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO DE VARIETY
    var FieldVariety = {
        'tb_variety_id_crop': 'Crop',
        'tb_variety_vrtorigin': 'Origin',
        'tb_variety_vrtname': 'Name'
    };
    $("#FormVariety").submit(function(event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldVariety, function(Id, Campo) {
            if ($('#' + Id).val() == '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        CheckError('FormVariety', event, BanderaFaltantes, MensajeFaltantes);
    });
    //fin: VALIDAMOS EL ENVIO DEL FORMULARIO DE VARIETY
    //
    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO DE Guard Group
    var FieldGuardGroup = {
        'sf_guard_group_name': 'Name',
        'sf_guard_group_description': 'Description'
    };
    $("#FormGuardGroup").submit(function(event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldGuardGroup, function(Id, Campo) {
            if ($('#' + Id).val() == '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " \n";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        CheckError('FormGuardGroup', event, BanderaFaltantes, MensajeFaltantes);
    });
    //fin: VALIDAMOS EL ENVIO DEL FORMULARIO DE Guard Group
};
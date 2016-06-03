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

    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO DE GuardUser
    var FieldGuardUser = {
        'sf_guard_user_first_name': 'First name:',
        'sf_guard_user_last_name': 'Last name',
        'sf_guard_user_email_address': 'Email address',
        'sf_guard_user_username': 'Username',
    };

    jQuery("#SubmitGuardUser").click(function (event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldGuardUser, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        var password = jQuery('#sf_guard_user_password').val();
        var passwordagain = jQuery('#sf_guard_user_password_again').val();
        if (((password === '') && (passwordagain !== '')) || ((password !== '') && (passwordagain === '')) || (password !== passwordagain)) {
            BanderaFaltantes = true;
            MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + "The two passwords must be the same. <br>";
            CampoObligatorio('sf_guard_user_password');
            CampoObligatorio('sf_guard_user_password_again');
            jQuery('#sf_guard_user_password').val('')
            jQuery('#sf_guard_user_password_again').val('')
        }
        CheckError('FormSignin', event, BanderaFaltantes, MensajeFaltantes);
    });
    //fin: VALIDAMOS EL ENVIO DEL FORMULARIO DE GuardUser
    //
    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO DE Signin
    var FieldSignin = {
        'signin_username': 'Username',
        'signin_password': 'Password'
    };

    jQuery("#SubmitSignin").click(function (event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldSignin, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        CheckError('FormSignin', event, BanderaFaltantes, MensajeFaltantes);
    });
    //fin: VALIDAMOS EL ENVIO DEL FORMULARIO DE Signin
    //
    //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO DE CONTACT PERSON
    var FieldContactperson = {
        'tb_contactperson_cnprfirstname': 'First name',
        'tb_contactperson_cnprlastname': 'Last name',
        'tb_contactperson_id_institution': 'Institutions',
        'tb_contactperson_cnpremail': 'Email'
    };

    jQuery("#FormContactperson").submit(function (event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldContactperson, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
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
    jQuery("#FormCrop").submit(function (event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldCrop, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
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
    jQuery("#FormDonor").submit(function (event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldDonor, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
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
    jQuery("#FormExperimentaldesign").submit(function (event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldExperimentaldesign, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
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
        'country': 'Country'
    };
    jQuery("#FormInstitution").submit(function (event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldInstitution, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
                CampoObligatorio(Id);
            } else {
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
    jQuery("#FormProject").submit(function (event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldProject, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
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
    jQuery("#FormRolecontactperson").submit(function (event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldRolecontactperson, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
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
    jQuery("#FormTraitclass").submit(function (event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldTraitclass, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
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
        'districttriallocation': 'District/Satate/Province Level'
    };
    jQuery("#FormTriallocation").submit(function (event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldTriallocation, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
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
    jQuery("#FormVariablesmeasured").submit(function (event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldVariablesmeasured, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
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
    jQuery("#FormVariety").submit(function (event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldVariety, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
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
    jQuery("#FormGuardGroup").submit(function (event) {
        var Ico = "<img src='/images/bullet-black-icon.png'> ";
        var BanderaFaltantes = false;
        var MensajeFaltantes = "";
        $.each(FieldGuardGroup, function (Id, Campo) {
            if (jQuery('#' + Id).val() === '') {
                BanderaFaltantes = true;
                MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
                CampoObligatorio(Id);
            } else {
                CampoNormalObligatorio(Id);
            }
        });
        CheckError('FormGuardGroup', event, BanderaFaltantes, MensajeFaltantes);
    });
    //fin: VALIDAMOS EL ENVIO DEL FORMULARIO DE Guard Group
});
$(function () {
    //AUTOCOMPLETE PROJECT
    $("#prjname").autocomplete({
        source: "/project/autocompleteproject/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_project").val(ui.item.value);
            $("#prjname").val(ui.item.label);
            $("#id_leadofproject").val(ui.item.id_leadofproject);
            $("#cnprfirstname").val(ui.item.cnprfirstname);
            $("#cnprmiddlename").val(ui.item.cnprmiddlename);
            $("#cnprlastname").val(ui.item.cnprlastname);
            $("#cnpremail").val(ui.item.cnpremail);
            $("#cnprtelephone").val(ui.item.cnprtelephone);
            $("#id_institutionleadofproject").val(ui.item.id_institutionleadofproject);
            $("#insnameleadofproject").val(ui.item.insnameleadofproject);
            $("#id_countryinstitutionleadofproject").val(ui.item.id_countryinstitutionleadofproject);
            $("#namecountryinstitutionleadofproject").val(ui.item.namecountryinstitutionleadofproject);
            $("#id_projectimplementinginstitutions").val(ui.item.id_projectimplementinginstitutions);
            $("#insnameprojectimplementinginstitutions").val(ui.item.insnameprojectimplementinginstitutions);
            $("#id_countryprojectimplementinginstitutions").val(ui.item.id_countryprojectimplementinginstitutions);
            $("#namecountryprojectimplementinginstitutions").val(ui.item.namecountryprojectimplementinginstitutions);
            $("#prjprojectimplementingperiodstartdate").val(ui.item.prjprojectimplementingperiodstartdate);
            $("#prjprojectimplementingperiodenddate").val(ui.item.prjprojectimplementingperiodenddate);
            $("#id_donor").val(ui.item.id_donor);
            $("#dnrname").val(ui.item.dnrname);
            $("#prjabstract").val(ui.item.prjabstract);
            $("#prjkeywords").val(ui.item.prjkeywords);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_project").val(ui.item.value);
            $("#prjname").val(ui.item.label);
            $("#id_leadofproject").val(ui.item.id_leadofproject);
            $("#cnprfirstname").val(ui.item.cnprfirstname);
            $("#cnprmiddlename").val(ui.item.cnprmiddlename);
            $("#cnprlastname").val(ui.item.cnprlastname);
            $("#cnpremail").val(ui.item.cnpremail);
            $("#cnprtelephone").val(ui.item.cnprtelephone);
            $("#id_institutionleadofproject").val(ui.item.id_institutionleadofproject);
            $("#insnameleadofproject").val(ui.item.insnameleadofproject);
            $("#id_countryinstitutionleadofproject").val(ui.item.id_countryinstitutionleadofproject);
            $("#namecountryinstitutionleadofproject").val(ui.item.namecountryinstitutionleadofproject);
            $("#id_projectimplementinginstitutions").val(ui.item.id_projectimplementinginstitutions);
            $("#insnameprojectimplementinginstitutions").val(ui.item.insnameprojectimplementinginstitutions);
            $("#id_countryprojectimplementinginstitutions").val(ui.item.id_countryprojectimplementinginstitutions);
            $("#namecountryprojectimplementinginstitutions").val(ui.item.namecountryprojectimplementinginstitutions);
            $("#prjprojectimplementingperiodstartdate").val(ui.item.prjprojectimplementingperiodstartdate);
            $("#prjprojectimplementingperiodenddate").val(ui.item.prjprojectimplementingperiodenddate);
            $("#id_donor").val(ui.item.id_donor);
            $("#dnrname").val(ui.item.dnrname);
            $("#prjabstract").val(ui.item.prjabstract);
            $("#prjkeywords").val(ui.item.prjkeywords);
        }
    });

    //AUTOCOMPLETE CONTACT PERSON (Lead of Project)
    $("#cnprfirstname").autocomplete({
        source: "/contactperson/autocompletecontactperson/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_leadofproject").val(ui.item.value);
            $("#cnprfirstname").val(ui.item.label);
            $("#cnprmiddlename").val(ui.item.cnprmiddlename);
            $("#cnprlastname").val(ui.item.cnprlastname);
            $("#id_institutionleadofproject").val(ui.item.id_institution);
            $("#insnameleadofproject").val(ui.item.insname);
            $("#id_countryinstitutionleadofproject").val(ui.item.id_countryinstitution);
            $("#namecountryinstitutionleadofproject").val(ui.item.namecountryinstitution);
            $("#cnpremail").val(ui.item.cnpremail);
            $("#cnprtelephone").val(ui.item.cnprtelephone);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_leadofproject").val(ui.item.value);
            $("#cnprfirstname").val(ui.item.label);
            $("#cnprmiddlename").val(ui.item.cnprmiddlename);
            $("#cnprlastname").val(ui.item.cnprlastname);
            $("#id_institutionleadofproject").val(ui.item.id_institution);
            $("#insnameleadofproject").val(ui.item.insname);
            $("#id_countryinstitutionleadofproject").val(ui.item.id_countryinstitution);
            $("#namecountryinstitutionleadofproject").val(ui.item.namecountryinstitution);
            $("#cnpremail").val(ui.item.cnpremail);
            $("#cnprtelephone").val(ui.item.cnprtelephone);
        }
    });

    //AUTOCOMPLETE CONTACT PERSON (Trial Manager)
    $("#cnprfirstnametrialmanager").autocomplete({
        source: "/contactperson/autocompletecontactperson/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_contactperson").val(ui.item.value);
            $("#cnprfirstnametrialmanager").val(ui.item.label);
            $("#cnprmiddlenametrialmanager").val(ui.item.cnprmiddlename);
            $("#cnprlastnametrialmanager").val(ui.item.cnprlastname);
            $("#id_institutiontrialmanager").val(ui.item.id_institution);
            $("#insnametrialmanager").val(ui.item.insname);
            $("#id_countryinstitutiontrialmanager").val(ui.item.id_countryinstitution);
            $("#namecountryinstitutiontrialmanager").val(ui.item.namecountryinstitution);
            $("#cnpremailtrialmanager").val(ui.item.cnpremail);
            $("#cnprtelephonetrialmanager").val(ui.item.cnprtelephone);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_contactperson").val(ui.item.value);
            $("#cnprfirstnametrialmanager").val(ui.item.label);
            $("#cnprmiddlenametrialmanager").val(ui.item.cnprmiddlename);
            $("#cnprlastnametrialmanager").val(ui.item.cnprlastname);
            $("#id_institutiontrialmanager").val(ui.item.id_institution);
            $("#insnametrialmanager").val(ui.item.insname);
            $("#id_countryinstitutiontrialmanager").val(ui.item.id_countryinstitution);
            $("#namecountryinstitutiontrialmanager").val(ui.item.namecountryinstitution);
            $("#cnpremailtrialmanager").val(ui.item.cnpremail);
            $("#cnprtelephonetrialmanager").val(ui.item.cnprtelephone);
        }
    });

    //AUTOCOMPLETE INSTITUTION (Lead of Project)
    $("#insnameleadofproject").autocomplete({
        source: "/institution/autocompleteinstitution/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_institutionleadofproject").val(ui.item.value);
            $("#insnameleadofproject").val(ui.item.label);
            $("#id_countryinstitutionleadofproject").val(ui.item.id_countryinstitution);
            $("#namecountryinstitutionleadofproject").val(ui.item.namecountryinstitution);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_institutionleadofproject").val(ui.item.value);
            $("#insnameleadofproject").val(ui.item.label);
            $("#id_countryinstitutionleadofproject").val(ui.item.id_countryinstitution);
            $("#namecountryinstitutionleadofproject").val(ui.item.namecountryinstitution);
        }
    });

    //AUTOCOMPLETE INSTITUTION (Project Implementing Institutions)
    $("#insnameprojectimplementinginstitutions").autocomplete({
        source: "/institution/autocompleteinstitution/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_projectimplementinginstitutions").val(ui.item.value);
            $("#insnameprojectimplementinginstitutions").val(ui.item.label);
            $("#id_countryprojectimplementinginstitutions").val(ui.item.id_countryinstitution);
            $("#namecountryprojectimplementinginstitutions").val(ui.item.namecountryinstitution);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_projectimplementinginstitutions").val(ui.item.value);
            $("#insnameprojectimplementinginstitutions").val(ui.item.label);
            $("#id_countryprojectimplementinginstitutions").val(ui.item.id_countryinstitution);
            $("#namecountryprojectimplementinginstitutions").val(ui.item.namecountryinstitution);
        }
    });

    //AUTOCOMPLETE INSTITUTION (Trial Manager)
    $("#insnametrialmanager").autocomplete({
        source: "/institution/autocompleteinstitution/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_institutiontrialmanager").val(ui.item.value);
            $("#insnametrialmanager").val(ui.item.label);
            $("#id_countryinstitutiontrialmanager").val(ui.item.id_countryinstitution);
            $("#namecountryinstitutiontrialmanager").val(ui.item.namecountryinstitution);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_institutiontrialmanager").val(ui.item.value);
            $("#insnametrialmanager").val(ui.item.label);
            $("#id_countryinstitutiontrialmanager").val(ui.item.id_countryinstitution);
            $("#namecountryinstitutiontrialmanager").val(ui.item.namecountryinstitution);
        }
    });

    //AUTOCOMPLETE COUNTRY (Institution - Lead of Project)
    $("#namecountryinstitutionleadofproject").autocomplete({
        source: "/administrativedivision/autocompletecountry/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_countryinstitutionleadofproject").val(ui.item.value);
            $("#namecountryinstitutionleadofproject").val(ui.item.label);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_countryinstitutionleadofproject").val(ui.item.value);
            $("#namecountryinstitutionleadofproject").val(ui.item.label);
        }
    });

    //AUTOCOMPLETE COUNTRY (Project Implementing Institutions)
    $("#namecountryprojectimplementinginstitutions").autocomplete({
        source: "/administrativedivision/autocompletecountry/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_countryprojectimplementinginstitutions").val(ui.item.value);
            $("#namecountryprojectimplementinginstitutions").val(ui.item.label);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_countryprojectimplementinginstitutions").val(ui.item.value);
            $("#namecountryprojectimplementinginstitutions").val(ui.item.label);
        }
    });

    //AUTOCOMPLETE COUNTRY (Trial Manager)
    $("#namecountryinstitutiontrialmanager").autocomplete({
        source: "/administrativedivision/autocompletecountry/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_countryinstitutiontrialmanager").val(ui.item.value);
            $("#namecountryinstitutiontrialmanager").val(ui.item.label);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_countryinstitutiontrialmanager").val(ui.item.value);
            $("#namecountryinstitutiontrialmanager").val(ui.item.label);
        }
    });

    //AUTOCOMPLETE COUNTRY (Trial Location)
    $("#countrytriallocation").autocomplete({
        source: "/administrativedivision/autocompletecountry/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_countrytriallocation").val(ui.item.value);
            $("#countrytriallocation").val(ui.item.label);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_countrytriallocation").val(ui.item.value);
            $("#countrytriallocation").val(ui.item.label);
        }
    });

    $("#countrytriallocation").blur(function () {
        var id_countrytriallocation = $("#id_countrytriallocation").val();
        var countrytriallocation = $("#countrytriallocation").val();
        $("#id_districttriallocation").val("");
        $("#districttriallocation").val("");
        $("#id_subdistricttriallocation").val("");
        $("#subdistricttriallocation").val("");
        $("#id_villagetriallocation").val("");
        $("#villagetriallocation").val("");
        if ((id_countrytriallocation != '') && (countrytriallocation != '')) {
            $('#CheckCountrytriallocation').html("<img width='18' height='18' src='/images/success.png'>");
            $("#districttriallocation").attr('readonly', false);
            $("#subdistricttriallocation").attr('readonly', true);
            $("#villagetriallocation").attr('readonly', true);
        } else {
            $('#CheckCountrytriallocation').html("");
            $('#CheckDistricttriallocation').html("");
            $('#CheckSubdistricttriallocation').html("");
            $('#CheckVillagetriallocation').html("");
            $('#AddVillage').html("");
            $("#id_countrytriallocation").val("");
            $("#countrytriallocation").val("");
            $("#districttriallocation").attr('readonly', true);
            $("#subdistricttriallocation").attr('readonly', true);
            $("#villagetriallocation").attr('readonly', true);
        }
    });

    //AUTOCOMPLETE DISTRICT(Trial Location)
    $("#districttriallocation").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "/administrativedivision/autocompletedistrict/",
                dataType: "json",
                data: {
                    term: request.term,
                    id_parent: $("#id_countrytriallocation").val()
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (e, ui) {
            e.preventDefault();
            $("#id_districttriallocation").val(ui.item.value);
            $("#districttriallocation").val(ui.item.label);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_districttriallocation").val(ui.item.value);
            $("#districttriallocation").val(ui.item.label);
        }
    });

    //LIMPIAR CAMPOS ABAJO DE DISTRICT 
    $("#districttriallocation").blur(function () {
        var id_districttriallocation = $("#id_districttriallocation").val();
        var districttriallocation = $("#districttriallocation").val();
        $("#id_subdistricttriallocation").val("");
        $("#subdistricttriallocation").val("");
        $("#id_villagetriallocation").val("");
        $("#villagetriallocation").val("");
        if ((id_districttriallocation != '') && (districttriallocation != '')) {
            $('#CheckDistricttriallocation').html("<img width='18' height='18' src='/images/success.png'>");
            $("#subdistricttriallocation").attr('readonly', false);
            $("#villagetriallocation").attr('readonly', true);
        } else {
            $('#CheckDistricttriallocation').html("");
            $('#CheckSubdistricttriallocation').html("");
            $('#CheckVillagetriallocation').html("");
            $('#AddVillage').html("");
            $("#id_districttriallocation").val("");
            $("#districttriallocation").val("");
            $("#subdistricttriallocation").attr('readonly', true);
            $("#villagetriallocation").attr('readonly', true);
        }
    });

    //AUTOCOMPLETE SUBDISTRICT(Trial Location)
    $("#subdistricttriallocation").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "/administrativedivision/autocompletesubdistrict/",
                dataType: "json",
                data: {
                    term: request.term,
                    id_parent: $("#id_districttriallocation").val()
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (e, ui) {
            e.preventDefault();
            $("#id_subdistricttriallocation").val(ui.item.value);
            $("#subdistricttriallocation").val(ui.item.label);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_subdistricttriallocation").val(ui.item.value);
            $("#subdistricttriallocation").val(ui.item.label);
        }
    });

    $("#subdistricttriallocation").blur(function () {
        var id_subdistricttriallocation = $("#id_subdistricttriallocation").val();
        var subdistricttriallocation = $("#subdistricttriallocation").val();
        $("#id_villagetriallocation").val("");
        $("#villagetriallocation").val("");
        if ((id_subdistricttriallocation != '') && (subdistricttriallocation != '')) {
            $('#CheckSubdistricttriallocation').html("<img width='18' height='18' src='/images/success.png'>");
            $("#villagetriallocation").attr('readonly', false);
        } else {
            $('#CheckSubdistricttriallocation').html("");
            $('#CheckVillagetriallocation').html("");
            $('#AddVillage').html("");
            $("#id_subdistricttriallocation").val("");
            $("#subdistricttriallocation").val("");
            $("#villagetriallocation").attr('readonly', true);
        }
    });

    //AUTOCOMPLETE VILLAGE (Trial Location)
    $("#villagetriallocation").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "/administrativedivision/autocompletevillage/",
                dataType: "json",
                data: {
                    term: request.term,
                    id_parent: $("#id_subdistricttriallocation").val()
                },
                success: function (data) {
                    response(data);
                }
            });
        },
        select: function (e, ui) {
            e.preventDefault();
            $("#id_villagetriallocation").val(ui.item.value);
            $("#villagetriallocation").val(ui.item.label);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_villagetriallocation").val(ui.item.value);
            $("#villagetriallocation").val(ui.item.label);
        }
    });

    $("#villagetriallocation").blur(function () {
        var id_villagetriallocation = $("#id_villagetriallocation").val();
        var villagetriallocation = $("#villagetriallocation").val();
        if ((id_villagetriallocation != '') && (villagetriallocation != '')) {
            $('#CheckVillagetriallocation').html("<img width='18' height='18' src='/images/success.png'>");
            $('#AddVillage').html("");
        } else {
            $('#CheckVillagetriallocation').html("");
            $("#id_villagetriallocation").val("");
//            $("#villagetriallocation").val("");
        }
        if ((id_villagetriallocation == '') && (villagetriallocation != '')) {
            $('#AddVillage').html("<img width='16' height='16' src='/images/add-icon.png'>");
        }
    });

    //AUTOCOMPLETE DONOR
    $("#dnrname").autocomplete({
        source: "/donor/autocompletedonor/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_donor").val(ui.item.value);
            $("#dnrname").val(ui.item.label);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_donor").val(ui.item.value);
            $("#dnrname").val(ui.item.label);
        }
    });

    //AUTOCOMPLETE TRIAL LOCATION
    $("#trlcname").autocomplete({
        source: "/triallocation/autocompletetriallocation/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_countrytriallocation").val("");
            $("#countrytriallocation").val("");
            $("#id_districttriallocation").val("");
            $("#districttriallocation").val("");
            $("#id_subdistricttriallocation").val("");
            $("#subdistricttriallocation").val("");
            $("#id_villagetriallocation").val("");
            $("#villagetriallocation").val("");
            $('#CheckCountrytriallocation').html("");
            $('#CheckDistricttriallocation').html("");
            $('#CheckSubdistricttriallocation').html("");
            $('#CheckVillagetriallocation').html("");

            $("#id_triallocation").val(ui.item.value);
            $("#trlcname").val(ui.item.label);

            var Country = ui.item.country;
            if (Country != null) {
                var CountryParts = Country.split(",");
                $("#id_countrytriallocation").val(CountryParts[0]);
                $("#countrytriallocation").val(CountryParts[1]);
                if (CountryParts[0] != '') {
                    $('#CheckCountrytriallocation').html("<img width='18' height='18' src='/images/success.png'>");
                }
            }

            var District = ui.item.district;
            if (District != null) {
                var DistrictParts = District.split(",");
                $("#id_districttriallocation").val(DistrictParts[0]);
                $("#districttriallocation").val(DistrictParts[1]);
                if (DistrictParts[0] != '') {
                    $('#CheckDistricttriallocation').html("<img width='18' height='18' src='/images/success.png'>");
                }
            }

            var Subdistrict = ui.item.subdistrict;
            if (Subdistrict != null) {
                var SubdistrictParts = Subdistrict.split(",");
                $("#id_subdistricttriallocation").val(SubdistrictParts[0]);
                $("#subdistricttriallocation").val(SubdistrictParts[1]);
                if (SubdistrictParts[0] != '') {
                    $('#CheckSubdistricttriallocation').html("<img width='18' height='18' src='/images/success.png'>");
                }
            }

            var Village = ui.item.village;
            if (Village != null) {
                var VillageParts = Village.split(",");
                $("#id_villagetriallocation").val(VillageParts[0]);
                $("#villagetriallocation").val(VillageParts[1]);
                if (VillageParts[0] != '') {
                    $('#CheckVillagetriallocation').html("<img width='18' height='18' src='/images/success.png'>");
                }
            }

            $("#trlclatitude").val(ui.item.trlclatitude);
            $("#trlclongitude").val(ui.item.trlclongitude);
            $("#trlcaltitude").val(ui.item.trlcaltitude);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_countrytriallocation").val("");
            $("#countrytriallocation").val("");
            $("#id_districttriallocation").val("");
            $("#districttriallocation").val("");
            $("#id_subdistricttriallocation").val("");
            $("#subdistricttriallocation").val("");
            $("#id_villagetriallocation").val("");
            $("#villagetriallocation").val("");
            $('#CheckCountrytriallocation').html("");
            $('#CheckDistricttriallocation').html("");
            $('#CheckSubdistricttriallocation').html("");
            $('#CheckVillagetriallocation').html("");

            $("#id_triallocation").val(ui.item.value);
            $("#trlcname").val(ui.item.label);

            var Country = ui.item.country;
            if (Country != null) {
                var CountryParts = Country.split(",");
                $("#id_countrytriallocation").val(CountryParts[0]);
                $("#countrytriallocation").val(CountryParts[1]);
                if (CountryParts[0] != '') {
                    $('#CheckCountrytriallocation').html("<img width='18' height='18' src='/images/success.png'>");
                }
            }

            var District = ui.item.district;
            if (District != null) {
                var DistrictParts = District.split(",");
                $("#id_districttriallocation").val(DistrictParts[0]);
                $("#districttriallocation").val(DistrictParts[1]);
                if (DistrictParts[0] != '') {
                    $('#CheckDistricttriallocation').html("<img width='18' height='18' src='/images/success.png'>");
                }
            }

            var Subdistrict = ui.item.subdistrict;
            if (Subdistrict != null) {
                var SubdistrictParts = Subdistrict.split(",");
                $("#id_subdistricttriallocation").val(SubdistrictParts[0]);
                $("#subdistricttriallocation").val(SubdistrictParts[1]);
                if (SubdistrictParts[0] != '') {
                    $('#CheckSubdistricttriallocation').html("<img width='18' height='18' src='/images/success.png'>");
                }
            }

            var Village = ui.item.village;
            if (Village != null) {
                var VillageParts = Village.split(",");
                $("#id_villagetriallocation").val(VillageParts[0]);
                $("#villagetriallocation").val(VillageParts[1]);
                if (VillageParts[0] != '') {
                    $('#CheckVillagetriallocation').html("<img width='18' height='18' src='/images/success.png'>");
                }
            }

            $("#trlclatitude").val(ui.item.trlclatitude);
            $("#trlclongitude").val(ui.item.trlclongitude);
            $("#trlcaltitude").val(ui.item.trlcaltitude);
        }
    });

    //AUTOCOMPLETE INSTITUTION (Register)
    $("#institution").autocomplete({
        source: "/institution/autocompleteinstitution/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_institution").val(ui.item.value);
            $("#institution").val(ui.item.label + ' - ' + ui.item.namecountryinstitution);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_institution").val(ui.item.value);
            $("#institution").val(ui.item.label + ' - ' + ui.item.namecountryinstitution);
        }
    });

    //AUTOCOMPLETE COUNTRY (Register)
    $("#country").autocomplete({
        source: "/administrativedivision/autocompletecountry/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_country").val(ui.item.value);
            $("#country").val(ui.item.label);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_country").val(ui.item.value);
            $("#country").val(ui.item.label);
        }
    });

//    AUTOCOMPLETE PARA LAS BUSQUEDAS DE ENSAYOS
    $("#searchprjname").autocomplete({
        source: "/project/autocompletesearchproject/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_project").val(ui.item.value);
            $("#searchprjname").val(ui.item.label);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_project").val(ui.item.value);
            $("#searchprjname").val(ui.item.label);
        }
    });

    $("#searchcontactperson").autocomplete({
        source: "/contactperson/autocompletesearhcontactperson/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_contactperson").val(ui.item.value);
            $("#searchcontactperson").val(ui.item.label);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_contactperson").val(ui.item.value);
            $("#searchcontactperson").val(ui.item.label);
        }
    });

    $("#searchcrpname").autocomplete({
        source: "/crop/autocompletesearhcrop/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_crop").val(ui.item.value);
            $("#searchcrpname").val(ui.item.label);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_crop").val(ui.item.value);
            $("#searchcrpname").val(ui.item.label);
        }
    });

    $("#searchtrltrialname").autocomplete({
        source: "/trial/autocompletesearhtrial/",
        select: function (e, ui) {
            e.preventDefault();
            $("#id_trial").val(ui.item.value);
            $("#searchtrltrialname").val(ui.item.label);
        },
        focus: function (e, ui) {
            e.preventDefault();
            $("#id_trial").val(ui.item.value);
            $("#searchtrltrialname").val(ui.item.label);
        }
    });


});

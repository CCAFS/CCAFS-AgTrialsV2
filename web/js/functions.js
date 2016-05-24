jQuery(document).ready(function () {
    //ADICIONAMOS UN NUEVO VILLAGE
    jQuery('#AddVillage').click(function () {
        var id_subdistricttriallocation = jQuery('#id_subdistricttriallocation').val();
        var VillageName = jQuery('#villagetriallocation').val();
        jQuery.ajax({
            type: "GET",
            url: "/administrativedivision/AddVillage/",
            data: "id_subdistricttriallocation=" + id_subdistricttriallocation + "&VillageName=" + VillageName,
            success: function (data) {
                jQuery('#id_villagetriallocation').attr('value', data);
                jQuery('#AddVillage').html("");
                jQuery('#CheckVillagetriallocation').html("<img width='18' height='18' src='/images/success.png'>");
            }
        });
    });

    //MANEJO DE CULTIVOS
    jQuery('#nuevocrop').click(function () {
        var filacrop = jQuery('#filacrop').val();
        filacrop = (filacrop * 1) + 1;
        jQuery('#DivCrop' + filacrop).show();
        jQuery('#filacrop').attr('value', filacrop);
    });

    jQuery('#ExecuteBatchuploadanother').click(function () {
        var TemplateFile = jQuery('#TemplateFile').val();
        var SelectTemplate = jQuery('#SelectTemplate').val();
        if ((TemplateFile === '') || (SelectTemplate === '')) {
            jAlert('Please, Select Upload Template or Template File', 'Error');
        } else {
            jQuery('#div_loading').show();
            jQuery('#Form').attr('value', 'Execute');
            jQuery('#batchuploadanother').submit();
        }
    });

    jQuery('#SelectTemplate').change(function () {
        var SelectTemplate = jQuery('#SelectTemplate').val();
        if (SelectTemplate !== '') {
            jQuery('#DivTemplatesInformation').show();
            if (SelectTemplate === 'Trial Project Template')
                jQuery('#DivTemplatesInformationInfo').html("Templates Files must have <b>.xls</b> extension and must be smaller than <b>5 MB</b> maximum size.</br>Exact number of columns <b>'8'</b> for Template File.</br>Max. <b>10000 Records</b> for Template File.</br>Don't close the window during the process.");

            if (SelectTemplate === 'Trial Location Template')
                jQuery('#DivTemplatesInformationInfo').html("Templates Files must have <b>.xls</b> extension and must be smaller than <b>5 MB</b> maximum size.</br>Exact number of columns <b>'8'</b> for Template File.</br>Max. <b>10000 Records</b> for Template File.</br>Don't close the window during the process.");

            if (SelectTemplate === 'Trial Varieties Template')
                jQuery('#DivTemplatesInformationInfo').html("Templates Files must have <b>.xls</b> extension and must be smaller than <b>5 MB</b> maximum size.</br>Exact number of columns <b>'5'</b> for Template File.</br>Max. <b>10000 Records</b> for Template File.</br>Don't close the window during the process.");

            if (SelectTemplate === 'Trial Variables Measured Template')
                jQuery('#DivTemplatesInformationInfo').html("Templates Files must have <b>.xls</b> extension and must be smaller than <b>5 MB</b> maximum size.</br>Exact number of columns <b>'7'</b> for Template File.</br>Max. <b>10000 Records</b> for Template File.</br>Don't close the window during the process.");

        } else {
            jQuery('#DivTemplatesInformation').hide();
        }
    });

    // Funcion que que el Menu siga al scroll y ese sea siempre visible
    var menuOffset = jQuery('.MenuTrials').offset();
    jQuery(window).scroll(function () {
        if (jQuery(window).scrollTop() >= menuOffset.top) {
            jQuery('.MenuTrials').addClass('positionFixedTop');
        } else {
            jQuery('.MenuTrials').removeClass('positionFixedTop');
        }
    });


    jQuery('a.page-scroll').on('click', function (e) {
        e.preventDefault();
        var jQuerytarget = jQuery(jQuery(this).attr('href'));
        jQuery('html, body').animate({
            scrollTop: jQuerytarget.offset().top
        }, 500);
        return false;
    });

});



function openWindow(url) {
    window.open(url, '_blank');
    window.focus();
}

function ValidaEscrituraFecha(Fecha) {
    var Campo = Fecha.id;
    var Valor = Fecha.value;
    var LenFecha = Valor.length;
    if (LenFecha <= 4) {
        if (isNaN(Valor)) {
            Valor = Valor.substring(0, (LenFecha - 1));
            jQuery('#' + Campo).attr('value', Valor);
        }
        LenFecha = Valor.length;
        if (LenFecha == 4) {
            jQuery('#' + Campo).attr('value', Valor + "-");
        }
    } else if (LenFecha <= 7) {
        var Valor2 = Valor.substring(5, (LenFecha))
        if (isNaN(Valor2)) {
            Valor = Valor.substring(0, (LenFecha - 1));
            jQuery('#' + Campo).attr('value', Valor);
        }
        if ((Valor2 >= 0) && (Valor2 <= 12)) {
            LenFecha = Valor.length;
            if (LenFecha == 7) {
                jQuery('#' + Campo).attr('value', Valor + "-");
            }
        } else {
            Valor = Valor.substring(0, (LenFecha - 2));
            jQuery('#' + Campo).attr('value', Valor);
        }
    } else if (LenFecha <= 10) {
        var Valor3 = Valor.substring(8, (LenFecha))
        if (isNaN(Valor3)) {
            Valor = Valor.substring(0, (LenFecha - 1))
            jQuery('#' + Campo).attr('value', Valor);
        }
        if ((Valor3 >= 0) && (Valor3 <= 31)) {
            LenFecha = Valor.length;
        } else {
            Valor = Valor.substring(0, (LenFecha - 2));
            jQuery('#' + Campo).attr('value', Valor);
        }
    }
}

function ValidaFecha(Fecha) {
    var Campo = Fecha.id;
    var Valor = Fecha.value;
    var LenFecha = Valor.length;
    var ErrorFecha = false;

    if ((LenFecha != 10) && (Valor != '')) {
        jAlert('error', ' The value must be in the format (yyyy-mm-dd).! ', 'Invalid Date', null);
        jQuery('#' + Campo).attr('value', '');
    } else if (Valor != '') {
        var PartFecha = Valor.split("-");
        if (isNaN(PartFecha[0]))
            ErrorFecha = true;
        if (isNaN(PartFecha[1]))
            ErrorFecha = true;
        if (isNaN(PartFecha[2]))
            ErrorFecha = true;

        if (ErrorFecha) {
            jAlert('error', ' The value must be in the format (yyyy-mm-dd).! ', 'Invalid Date', null);
            jQuery('#' + Campo).attr('value', '');
        }
    }
}

function ValidaEscrituraNumero(Dato) {
    var Campo = Dato.id;
    var Valor = Dato.value;
    var LenNumero = Valor.length;
    var Signo = Valor.substring(0, 1);
    if (Signo == '-') {
        Valor = Valor.substring(1, LenNumero) * 1;
    }
    if (isNaN(Valor)) {
        Valor = Dato.value.substring(0, (LenNumero - 1));
        jQuery('#' + Campo).attr('value', Valor);
    }
}

function ValidaValorNumerico(campo) {
    var valor = campo.value;
    var nombre = campo.id;
    if (valor != '') {
        if (isNaN(valor)) {
            jAlert('error', ' El valor del campo debe ser numerico.! ', 'Campo Invalido', null);
            jQuery('#' + nombre).attr('value', '');
        }
    }
}

function ValidaAno(campo) {
    var valor = campo.value;
    var nombre = campo.id;
    if (valor != '') {
        if (isNaN(valor)) {
            jAlert('error', ' El valor del campo debe ser numerico de 4 digitos.! ', 'Campo Invalido', null);
            jQuery('#' + nombre).attr('value', '');
        } else {
            if ((valor < 1990) || (valor > 2050)) {
                jAlert('error', ' El valor del campo no es correcto.! ', 'Campo Invalido', null);
                jQuery('#' + nombre).attr('value', '');
            }
        }
    }
}

function ValidaURL(campo) {
    var valor = campo.value;
    var nombre = campo.id;
    if (valor != '') {
        if (!(/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?jQuery/.test(valor))) {
            jAlert('error', ' El valor del campo debe ser una URL válida! ', 'Campo Invalido', null);
            jQuery('#' + nombre).attr('value', '');
        }
    }
}

function ValidaEmail(campo) {
    var valor = campo.value;
    var field = campo.id;
    // creamos nuestra regla con expresiones regulares.
    if (valor != '') {
        var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if (!(filter.test(valor))) {
            jQuery('#' + field).attr('value', '');
            jAlert('error', 'Error E-mail.  E.j. account@dominio.com', 'Invalid E-mail', null);
        }
    }
}

function ValidarNumero(campo) {
    var valor = campo.value;
    var field = campo.id;
// creamos nuestra regla con expresiones regulares.
    if (valor != '') {
        var filter = /^\d*jQuery/;
        if (!(filter.test(valor))) {
            jQuery('#' + field).attr('value', '');
            jAlert('error', 'Error Número Incorrecto  e.j. 25', 'Número Invalido', null);
        }
    }
}

//inicio: FUNCIONES PARA EL CAMBIO DE COLOR
var ColorBordeObligatorio = '#48732A';
var ColorBordeNormal = '#BBBBBB';
var ColorFondoObligatorio = '#FFFFFF';
var ColorFondoNormal = '#FFFFFF';

function CampoObligatorio(Id) {
    jQuery('#' + Id).css({'background-color': ColorFondoObligatorio});
    jQuery('#' + Id).css({'border': '1px solid ' + ColorBordeObligatorio});
}

function CampoNormalObligatorio(Id) {
    jQuery('#' + Id).css({'background-color': ColorFondoNormal});
    jQuery('#' + Id).css({'border': '1px solid ' + ColorBordeObligatorio});
}

function CampoNormal(Id) {
    jQuery('#' + Id).css({'background-color': ColorFondoNormal});
    jQuery('#' + Id).css({'border': '1px solid ' + ColorBordeNormal});
}

function SelectObligatorio(Id) {
    jQuery("select[id='" + Id + "']").css({'background-color': ColorFondoObligatorio});
    jQuery("select[id='" + Id + "']").css({'border': '1px solid ' + ColorBordeObligatorio});
}

function SelectNormalObligatorio(Id) {
    jQuery("select[id='" + Id + "']").css({'background-color': ColorFondoNormal});
    jQuery("select[id='" + Id + "']").css({'border': '1px solid ' + ColorBordeObligatorio});
}
//inicio: FUNCION PARA VERIFICAR SI HUBO UN ERROR
function CheckError(Form, event, BanderaFaltantes, MensajeFaltantes) {
    if (BanderaFaltantes) {
        Mensaje(MensajeFaltantes);
        event.preventDefault();
    } else {
        jQuery('#' + Form).submit();
    }
}

//inicio: FUNCION PARA MOSTRAR LA VENTANA DEL MENSAJE
function Mensaje(msg) {
    var tamano = msg.length;
    if (tamano > 750)
        msg = "<div style='width: 540px; height: 400px; overflow-y: scroll;'>" + msg + "</div>";
    else
        msg = "<div style='width: 540px; height: auto; overflow-y: scroll;'>" + msg + "</div>";
    alerts.show({ css: 'error', title: 'Required Fields', message: msg });

}
//FIN: FUNCION PARA MOSTRAR LA VENTANA DEL MENSAJE

function GetValueSelect(Id) {
    var value = jQuery("select[id='" + Id + "']").val();
    return value;
}

function SetValueSelect(Id, Value) {
    jQuery("select[id='" + Id + "']").val(Value);
}

//inicio: MANEJO DE CULTIVOS (VARIEDADES Y VARIABLES MEDIDAS)
//VALIDAMOS EL CULTIVO SELECCIONADO
function ValidaCrop(i) {
    jQuery('#InfoVariety' + i).attr('value', '');
    jQuery("#InfoVarietySelected" + i).load("/trial/DeleteVarietySelected/?i=" + i, function () {
        jQuery("#InfoVarietySelected" + i).html("");
    });
    jQuery("#InfoVariablesMeasuredSelected" + i).load("/trial/DeleteVariablesMeasuredSelected/?i=" + i, function () {
        jQuery("#InfoVariablesMeasured" + i).html("");
    });
}

//BUSQUEDA DE VARIEDADES
function FilterVariety(Campo, i) {
    //var id = Campo.id;
    var Value = Campo.value;
    var id_crop = jQuery("#id_crop" + i).val();
    var Value = Value.replace(" ", "*quot*");
    if (id_crop !== '') {
        if (Value !== '') {
            jQuery("#DivFilterVariety" + i).show();
            jQuery("#InfoVariety" + i).load("/trial/FilterVariety/?txt=" + Value + '&id_crop=' + id_crop + "&i=" + i, function () {
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
        jAlert('Before adding, specify the Crop!', 'Info', 'Important', null);
        jQuery('#Variety' + i).attr('value', '');
        jQuery("#InfoVariety" + i).html("");
        jQuery("#DivVariety" + i).removeClass("DivListSelect");
    }
}

//ADICIONAMOS LA VARIEDAD AL ARREGLO DE VARIEDADES
function SelectVariety(id_variety, i) {
    jQuery("#InfoVarietySelected" + i).load("/trial/VarietySelected/?id_variety=" + id_variety + "&i=" + i, function () {
        jQuery("#InfoVarietySelected" + i).load("/trial/LoadVarietySelected/?i=" + i, function () {
            //SI EXISTEN VARIEDADES Y VARIABLES MEDIDAS MOSTRAMOS U OCULTAMOS EL TEMPLATE DE DATOS
            if ((jQuery("#InfoVarietySelected" + i).is(':empty')) || (jQuery("#InfoVariablesMeasuredSelected" + i).is(':empty'))) {
                jQuery('#TemplateData' + i).attr('value', '');
                jQuery("#DivData" + i).hide();
                jQuery("#DivData" + i).removeClass("DivListSelect");
            } else {
                jQuery('#TemplateData' + i).attr('value', '');
                jQuery("#DivData" + i).show();
                jQuery("#DivData" + i).addClass("DivListSelect");
            }
        });
    });
    ClearFilterVariety(i);
}

//CERRAMOS LA LISTA DE VARIEDADES Y LIMPIAMOS EL FILTRO
function ClearFilterVariety(i) {
    jQuery('#Variety' + i).attr('value', '');
    jQuery("#InfoVariety" + i).html("");
    jQuery("#DivFilterVarietyOK" + i).hide();
    jQuery("#DivClearFilterVariety" + i).hide();
    jQuery("#Variety" + i).focus();

}

//REMOVEMOS LA VARIEDAD AL ARREGLO DE VARIEDADES
function RemoveVariety(id_variety, i) {
    jQuery("#InfoVarietySelected" + i).load("/trial/RemoveVariety/?id_variety=" + id_variety + "&i=" + i, function () {
        jQuery("#InfoVarietySelected" + i).load("/trial/LoadVarietySelected/?i=" + i, function () {

            //SI EXISTEN VARIEDADES Y VARIABLES MEDIDAS MOSTRAMOS U OCULTAMOS EL TEMPLATE DE DATOS
            if ((jQuery("#InfoVarietySelected" + i).is(':empty')) || (jQuery("#InfoVariablesMeasuredSelected" + i).is(':empty'))) {
                jQuery('#TemplateData' + i).attr('value', '');
                jQuery("#DivData" + i).hide();
                jQuery("#DivData" + i).removeClass("DivListSelect");
            } else {
                jQuery('#TemplateData' + i).attr('value', '');
                jQuery("#DivData" + i).show();
                jQuery("#DivData" + i).addClass("DivListSelect");
            }
        });
    });
}

//BUSQUEDA DE Variables Measured
function FilterVariablesMeasured(Campo, i) {
    //var id = Campo.id;
    var Value = Campo.value;
    var id_crop = jQuery("#id_crop" + i).val();
    var Value = Value.replace(" ", "*quot*");
    if (id_crop !== '') {
        if (Value !== '') {
            jQuery("#DivFilterVariablesMeasured" + i).show();
            jQuery("#InfoVariablesMeasured" + i).addClass("DivListSelect");
            jQuery("#InfoVariablesMeasured" + i).load("/trial/FilterVariablesMeasured/?txt=" + Value + '&id_crop=' + id_crop + "&i=" + i, function () {
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
        jAlert('Before adding, specify the Crop!', 'Info', 'Important', null);
        jQuery('#VariablesMeasured' + i).attr('value', '');
        jQuery("#InfoVariablesMeasured" + i).html("");
        jQuery("#InfoVariablesMeasured" + i).removeClass("DivListSelect");
    }
}

//ADICIONAMOS LA Variables Measured AL ARREGLO DE VARIEDADES
function SelectVariablesMeasured(id_variablesmeasured, i) {
    jQuery("#InfoVariablesMeasuredSelected" + i).load("/trial/VariablesMeasuredSelected/?id_variablesmeasured=" + id_variablesmeasured + "&i=" + i, function () {
        jQuery("#InfoVariablesMeasuredSelected" + i).addClass("DivListSelect");
        jQuery("#InfoVariablesMeasuredSelected" + i).load("/trial/LoadVariablesMeasuredSelected/?i=" + i, function () {
            //SI EXISTEN VARIEDADES Y VARIABLES MEDIDAS MOSTRAMOS U OCULTAMOS EL TEMPLATE DE DATOS
            if ((jQuery("#DivVarietySelected" + i).is(':empty')) || (jQuery("#InfoVariablesMeasuredSelected" + i).is(':empty'))) {
                jQuery('#TemplateData' + i).attr('value', '');
                jQuery("#DivData" + i).hide();
                jQuery("#DivData" + i).removeClass("DivListSelect");
            } else {
                jQuery('#TemplateData' + i).attr('value', '');
                jQuery("#DivData" + i).show();
                jQuery("#DivData" + i).addClass("DivListSelect");
            }
        });
    });
    ClearFilterVariablesMeasured(i);
}

//CERRAMOS LA LISTA DE Variables Measured Y LIMPIAMOS EL FILTRO
function ClearFilterVariablesMeasured(i) {
    jQuery('#VariablesMeasured' + i).attr('value', '');
    jQuery("#InfoVariablesMeasured" + i).html("");
    jQuery("#InfoVariablesMeasured" + i).removeClass("DivListSelect");
    jQuery("#DivFilterVariablesMeasuredOK" + i).hide();
    jQuery("#DivClearFilterVariablesMeasured" + i).hide();
    jQuery("#VariablesMeasured" + i).focus();
}

//REMOVEMOS LA Variables Measured AL ARREGLO DE VARIEDADES
function RemoveVariablesMeasured(id_variablesmeasured, i) {
    jQuery("#InfoVariablesMeasuredSelected" + i).load("/trial/RemoveVariablesMeasured/?id_variablesmeasured=" + id_variablesmeasured + "&i=" + i, function () {
        jQuery("#InfoVariablesMeasuredSelected" + i).load("/trial/LoadVariablesMeasuredSelected/?i=" + i, function () {
            if (jQuery("#InfoVariablesMeasuredSelected" + i).is(':empty')) {
                jQuery("#InfoVariablesMeasuredSelected" + i).removeClass("DivListSelect");
            }
            //SI EXISTEN VARIEDADES Y VARIABLES MEDIDAS MOSTRAMOS U OCULTAMOS EL TEMPLATE DE DATOS
            if ((jQuery("#DivVarietySelected" + i).is(':empty')) || (jQuery("#InfoVariablesMeasuredSelected" + i).is(':empty'))) {
                jQuery('#TemplateData' + i).attr('value', '');
                jQuery("#DivData" + i).hide();
                jQuery("#DivData" + i).removeClass("DivListSelect");
            } else {
                jQuery('#TemplateData' + i).attr('value', '');
                jQuery("#DivData" + i).show();
                jQuery("#DivData" + i).addClass("DivListSelect");
            }
        });
    });
}

function DeleteNewCrop(i) {
    if (confirm('Really remove the crop?')) {
        jQuery('#id_crop' + i).attr('value', '');
        jQuery('#trnfnumberofreplicates' + i).attr('value', '');
        jQuery('#id_experimentaldesign' + i).attr('value', '');
        jQuery('#trnftreatmentnumber' + i).attr('value', '');
        jQuery('#trnftreatmentnameandcode' + i).attr('value', '');
        jQuery('#trnfplantingsowingstartdate' + i).attr('value', '');
        jQuery('#trnfplantingsowingenddate' + i).attr('value', '');
        jQuery('#trnfphysiologicalmaturitystardate' + i).attr('value', '');
        jQuery('#trnfphysiologicalmaturityenddate' + i).attr('value', '');
        jQuery('#trnfharveststartdate' + i).attr('value', '');
        jQuery('#trnfharvestenddate' + i).attr('value', '');
        jQuery('#trnfdataorresultsfile' + i).attr('value', '');
        jQuery('#trnfsuppplementalinformationfile' + i).attr('value', '');
        jQuery('#trnfweatherdatafile' + i).attr('value', '');
        jQuery('#trnfsoildatafile' + i).attr('value', '');
        jQuery('#DivCrop' + i).hide();
    }
}

//ABRIR INFORMACION DE VARIEDAD
function ViewVariety(id_genebank) {
    window.open('http://seeds.iriscouch.com/#/accessions/' + id_genebank, 'Genebank', 'height=800,width=900,scrollbars=1');
}

//ABRIR INFORMACION DE variables medidas
function ViewVariablesMeasured(id_ontology) {
    window.open('http://www.cropontology-curationtool.org/terms/' + id_ontology + '/Stem%20rust/static-html', 'cropontology-curationtool', 'height=800,width=900,scrollbars=1');
}

//fin: MANEJO DE CULTIVOS (VARIEDADES Y VARIABLES MEDIDAS)


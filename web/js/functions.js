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
    //ADICIONAMOS UN NUEVO VILLAGE
    jQuery('#AddVillage').click(function () {
        var id_subdistricttriallocation = jQuery('#id_subdistricttriallocation').val();
        var VillageName = jQuery('#villagetriallocation').val();
        jQuery.ajax({
            type: "GET",
            url: "/administrativedivision/AddVillage/",
            data: "id_subdistricttriallocation=" + id_subdistricttriallocation + "&VillageName=" + VillageName,
            success: function (data) {
                jQuery('#id_villagetriallocation').val(data);
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
        jQuery('#filacrop').val(filacrop);
    });

    jQuery('#ExecuteBatchuploadanother').click(function () {
        var TemplateFile = jQuery('#TemplateFile').val();
        var SelectTemplate = jQuery('#SelectTemplate').val();
        if ((TemplateFile === '') || (SelectTemplate === '')) {
            alerts.show({css: 'error', title: 'Invalid Date', message: 'Please, Select Upload Template and Template File.! '});
        } else {
            jQuery('#div_loading').show();
            jQuery('#Form').val('Execute');
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
            jQuery('#' + Campo).val(Valor);
        }
        LenFecha = Valor.length;
        if (LenFecha === 4) {
            jQuery('#' + Campo).val(Valor + "-");
        }
    } else if (LenFecha <= 7) {
        var Valor2 = Valor.substring(5, (LenFecha));
        if (isNaN(Valor2)) {
            Valor = Valor.substring(0, (LenFecha - 1));
            jQuery('#' + Campo).val(Valor);
        }
        if ((Valor2 >= 0) && (Valor2 <= 12)) {
            LenFecha = Valor.length;
            if (LenFecha === 7) {
                jQuery('#' + Campo).val(Valor + "-");
            }
        } else {
            Valor = Valor.substring(0, (LenFecha - 2));
            jQuery('#' + Campo).val(Valor);
        }
    } else if (LenFecha <= 10) {
        var Valor3 = Valor.substring(8, (LenFecha));
        if (isNaN(Valor3)) {
            Valor = Valor.substring(0, (LenFecha - 1));
            jQuery('#' + Campo).val(Valor);
        }
        if ((Valor3 >= 0) && (Valor3 <= 31)) {
            LenFecha = Valor.length;
        } else {
            Valor = Valor.substring(0, (LenFecha - 2));
            jQuery('#' + Campo).val(Valor);
        }
    }
}

function ValidaFecha(Fecha) {
    var Campo = Fecha.id;
    var Valor = Fecha.value;
    var LenFecha = Valor.length;
    var ErrorFecha = false;

    if ((LenFecha !== 10) && (Valor !== '')) {
        alerts.show({css: 'error', title: 'Invalid Date', message: 'The value must be in the format (yyyy-mm-dd).! '});
        jQuery('#' + Campo).val('');
    } else if (Valor !== '') {
        var PartFecha = Valor.split("-");
        if (isNaN(PartFecha[0]))
            ErrorFecha = true;
        if (isNaN(PartFecha[1]))
            ErrorFecha = true;
        if (isNaN(PartFecha[2]))
            ErrorFecha = true;

        if (ErrorFecha) {
            alerts.show({css: 'error', title: 'Invalid Date', message: 'The value must be in the format (yyyy-mm-dd).! '});
            jQuery('#' + Campo).val('');
        }
    }
}

function ValidaEscrituraNumero(Dato) {
    var Campo = Dato.id;
    var Valor = Dato.value;
    var LenNumero = Valor.length;
    var Signo = Valor.substring(0, 1);
    if (Signo === '-') {
        Valor = Valor.substring(1, LenNumero) * 1;
    }
    if (isNaN(Valor)) {
        Valor = Dato.value.substring(0, (LenNumero - 1));
        jQuery('#' + Campo).val(Valor);
    }
}

function ValidaValorNumerico(campo) {
    var valor = campo.value;
    var nombre = campo.id;
    if (valor !== '') {
        if (isNaN(valor)) {
            alerts.show({css: 'error', title: 'Invalid Field', message: 'The value of the field must be numeric.! '});
            jQuery('#' + nombre).val('');
        }
    }
}

function ValidaAno(campo) {
    var valor = campo.value;
    var nombre = campo.id;
    if (valor !== '') {
        if (isNaN(valor)) {
            alerts.show({css: 'error', title: 'Invalid Field', message: 'The field value must be 4-digit numeric.! '});
            jQuery('#' + nombre).val('');
        } else {
            if ((valor < 1990) || (valor > 2050)) {
                alerts.show({css: 'error', title: 'Invalid Field', message: 'The field value is not correct.! '});
                jQuery('#' + nombre).val('');
            }
        }
    }
}

function ValidaURL(campo) {
    var valor = campo.value;
    var nombre = campo.id;
    if (valor !== '') {
        if (!(/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/|www\.)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?jQuery/.test(valor))) {
            alerts.show({css: 'error', title: 'Invalid Field', message: 'The field value must be a valid URL.! '});
            jQuery('#' + nombre).val('');
        }
    }
}

function ValidaEmail(campo) {
    var valor = campo.value;
    var field = campo.id;
    // creamos nuestra regla con expresiones regulares.
    if (valor !== '') {
        var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if (!(filter.test(valor))) {
            jQuery('#' + field).val('');
            alerts.show({css: 'error', title: 'Invalid E-mail', message: 'Error E-mail.  e.g. account@dominio.com.! '});
        }
    }
}

function ValidarNumero(campo) {
    var valor = campo.value;
    var field = campo.id;
// creamos nuestra regla con expresiones regulares.
    if (valor !== '') {
        var filter = /^\d*jQuery/;
        if (!(filter.test(valor))) {
            jQuery('#' + field).val('');
            alerts.show({css: 'error', title: 'Invalid Number', message: 'Error Wrong Number e.g. 25.! '});
        }
    }
}

//inicio: FUNCIONES PARA EL CAMBIO DE COLOR
var ColorBordeObligatorio = '#b03535';
var ColorBoxshadowObligatorio = '#d45252';
var ColorBordeNormal = '#BBBBBB';
var ColorFondoObligatorio = '#FFFFFF';
var ColorFondoNormal = '#FFFFFF';

function CampoObligatorio(Id) {
    jQuery('#' + Id).css({'background-color': ColorFondoObligatorio});
    jQuery('#' + Id).css({'border': '1px solid ' + ColorBordeObligatorio});
    jQuery('#' + Id).css({'box-shadow': '0 0 5px ' + ColorBoxshadowObligatorio});
}

function CampoNormalObligatorio(Id) {
    jQuery('#' + Id).css({'background-color': ColorFondoNormal});
    jQuery('#' + Id).css({'border': '1px solid ' + ColorBordeNormal});
    jQuery('#' + Id).css({'box-shadow': '0 0 0px '});
}

function CampoNormal(Id) {
    jQuery('#' + Id).css({'background-color': ColorFondoNormal});
    jQuery('#' + Id).css({'border': '1px solid ' + ColorBordeNormal});
    jQuery('#' + Id).css({'box-shadow': '0 0 0px '});
}

function SelectObligatorio(Id) {
    jQuery("select[id='" + Id + "']").css({'background-color': ColorFondoObligatorio});
    jQuery("select[id='" + Id + "']").css({'border': '1px solid ' + ColorBordeObligatorio});
    jQuery("select[id='" + Id + "']").css({'box-shadow': '0 0 5px ' + ColorBoxshadowObligatorio});
}

function SelectNormalObligatorio(Id) {
    jQuery("select[id='" + Id + "']").css({'background-color': ColorFondoNormal});
    jQuery("select[id='" + Id + "']").css({'border': '1px solid ' + ColorBordeNormal});
    jQuery("select[id='" + Id + "']").css({'box-shadow': '0 0 0px '});
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

    alerts.show({css: 'error', title: 'Required Fields', message: msg});
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
    jQuery('#InfoVariety' + i).val('');
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
        alerts.show({css: 'error', title: 'Important', message: 'Before adding, specify the Crop.! '});
        jQuery('#Variety' + i).val('');
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
                jQuery('#TemplateData' + i).val('');
                jQuery("#DivData" + i).hide();
                jQuery("#DivData" + i).removeClass("DivListSelect");
            } else {
                jQuery('#TemplateData' + i).val('');
                jQuery("#DivData" + i).show();
                jQuery("#DivData" + i).addClass("DivListSelect");
            }
        });
    });
    ClearFilterVariety(i);
}

//CERRAMOS LA LISTA DE VARIEDADES Y LIMPIAMOS EL FILTRO
function ClearFilterVariety(i) {
    jQuery('#Variety' + i).val('');
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
                jQuery('#TemplateData' + i).val('');
                jQuery("#DivData" + i).hide();
                jQuery("#DivData" + i).removeClass("DivListSelect");
            } else {
                jQuery('#TemplateData' + i).val('');
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
        alerts.show({css: 'error', title: 'Important', message: 'Before adding, specify the Crop.! '});
        jQuery('#VariablesMeasured' + i).val('');
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
                jQuery('#TemplateData' + i).val('');
                jQuery("#DivData" + i).hide();
                jQuery("#DivData" + i).removeClass("DivListSelect");
            } else {
                jQuery('#TemplateData' + i).val('');
                jQuery("#DivData" + i).show();
                jQuery("#DivData" + i).addClass("DivListSelect");
            }
        });
    });
    ClearFilterVariablesMeasured(i);
}

//CERRAMOS LA LISTA DE Variables Measured Y LIMPIAMOS EL FILTRO
function ClearFilterVariablesMeasured(i) {
    jQuery('#VariablesMeasured' + i).val('');
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
                jQuery('#TemplateData' + i).val('');
                jQuery("#DivData" + i).hide();
                jQuery("#DivData" + i).removeClass("DivListSelect");
            } else {
                jQuery('#TemplateData' + i).val('');
                jQuery("#DivData" + i).show();
                jQuery("#DivData" + i).addClass("DivListSelect");
            }
        });
    });
}

function DeleteNewCrop(i) {
    if (confirm('Really remove the crop?')) {
        jQuery('#id_crop' + i).val('');
        jQuery('#trnfnumberofreplicates' + i).val('');
        jQuery('#id_experimentaldesign' + i).val('');
        jQuery('#trnftreatmentnumber' + i).val('');
        jQuery('#trnftreatmentnameandcode' + i).val('');
        jQuery('#trnfplantingsowingstartdate' + i).val('');
        jQuery('#trnfplantingsowingenddate' + i).val('');
        jQuery('#trnfphysiologicalmaturitystardate' + i).val('');
        jQuery('#trnfphysiologicalmaturityenddate' + i).val('');
        jQuery('#trnfharveststartdate' + i).val('');
        jQuery('#trnfharvestenddate' + i).val('');
        jQuery('#trnfdataorresultsfile' + i).val('');
        jQuery('#trnfsuppplementalinformationfile' + i).val('');
        jQuery('#trnfweatherdatafile' + i).val('');
        jQuery('#trnfsoildatafile' + i).val('');
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

function wopen(trial) {
    window.open("/trial/" + trial, "Trial", "width=800,height=800,scrollbars=1");
}

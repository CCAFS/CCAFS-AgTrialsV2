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
$(document).ready(function () {
    $('#id_crop_batchupload').change(function () {
        var id_crop = $('#id_crop_batchupload').val();
        $('#varieties').val("");
        $('#variablesmeasured').val("");
        $.ajax({
            type: "GET",
            url: "/tbtrial/assigncrop/",
            data: "id_crop=" + id_crop,
            success: function () {
            }
        });

    });

    //VALIDAMOS LA SELECION DE CRITERIOS PARA EL SIGUIENTE PASO
    $('#NextStep').click(function () {
        if (false) {

        } else {
            $('#div_loading').show();
            $('#FormAction').attr('value', 'Step1');
            $('#FormStep1').submit();
        }
    });

    $('#SkipStep').click(function () {
        if (false) {

        } else {
            $('#div_loading').show();
            $('#FormAction').attr('value', 'SkipStep');
            $('#FormStep1').submit();
        }
    });

    $('#Execute').click(function () {
        ValidaFiles();
    });

    $('#TrialTemplateFile').blur(function () {
        var TrialTemplateFile = $('#TrialTemplateFile').val();
        if (TrialTemplateFile !== '') {
            var fragmento = TrialTemplateFile.split('.');
            var length = fragmento.length;
            var extension = fragmento[length - 1];
            if (!((extension === 'XLS') || (extension === 'xls'))) {
                $('#TrialTemplateFile').attr('value', '');
                $("#TrialTemplateFile").val('');
                jAlert('Permitted file (.XLS)', 'Invalid File');
            }
        }
    });

    $('#TrialInfoTemplateFile').blur(function () {
        var TrialInfoTemplateFile = $('#TrialInfoTemplateFile').val();
        if (TrialInfoTemplateFile !== '') {
            var fragmento = TrialInfoTemplateFile.split('.');
            var length = fragmento.length;
            var extension = fragmento[length - 1];
            if (!((extension === 'XLS') || (extension === 'xls'))) {
                $('#TrialInfoTemplateFile').attr('value', '');
                $("#TrialInfoTemplateFile").val('');
                jAlert('Permitted file (.XLS)', 'Invalid File');
            }
        }
    });

    $('#CompressedFileTrialInfoDataTemplates').blur(function () {
        var CompressedFileTrialInfoDataTemplates = $('#CompressedFileTrialInfoDataTemplates').val();
        if (CompressedFileTrialInfoDataTemplates !== '') {
            var fragmento = CompressedFileTrialInfoDataTemplates.split('.');
            var length = fragmento.length;
            var extension = fragmento[length - 1];
            if (!((extension === 'zip') || (extension === 'ZIP'))) {
                $('#CompressedFileTrialInfoDataTemplates').attr('value', '');
                $("#CompressedFileTrialInfoDataTemplates").val('');
                jAlert('Permitted file compressed(.Zip)', 'Invalid File');
            }
        }
    });

    function ValidaFiles() {
        var TrialTemplateFile = $('#TrialTemplateFile').val();
        var TrialInfoTemplateFile = $('#TrialInfoTemplateFile').val();
        if ((TrialTemplateFile === '') || (TrialInfoTemplateFile === '')) {
            jAlert('Please, Select Templates Files', 'Error');
        } else {
            $('#div_loading').show();
            $('#FormAction').attr('value', 'Execute');
            $('#FormStep2').submit();
        }
    }
});
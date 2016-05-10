    $(document).ready(function() {
        $('#id_crop_batchupload').change(function() {
            var id_crop = $('#id_crop_batchupload').attr('value');
            $('#varieties').val("");
            $('#variablesmeasured').val("");
            $.ajax({
                type: "GET",
                url: "/tbtrial/assigncrop/",
                data: "id_crop=" + id_crop,
                success: function() {
                }
            });

        });

        //VALIDAMOS LA SELECION DE CRITERIOS PARA EL SIGUIENTE PASO
        $('#NextStep').click(function() {
            if (false) {

            } else {
                $('#div_loading').show();
                $('#FormAction').attr('value', 'Step1');
                $('#FormStep1').submit();
            }
        });

        $('#SkipStep').click(function() {
            if (false) {

            } else {
                $('#div_loading').show();
                $('#FormAction').attr('value', 'SkipStep');
                $('#FormStep1').submit();
            }
        });

        $('#Execute').click(function() {
            ValidaFiles();
        });

        $('#TrialTemplateFile').blur(function() {
            var TrialTemplateFile = $('#TrialTemplateFile').attr('value');
            if (TrialTemplateFile != '') {
                var fragmento = TrialTemplateFile.split('.');
                var length = fragmento.length;
                var extension = fragmento[length - 1];
                if (!((extension == 'XLS') || (extension == 'xls'))) {
                    $('#TrialTemplateFile').attr('value', '');
                    $("#TrialTemplateFile").val('');
                    jAlert('Permitted file (.XLS)', 'Invalid File');
                }
            }
        });

        $('#TrialInfoTemplateFile').blur(function() {
            var TrialInfoTemplateFile = $('#TrialInfoTemplateFile').attr('value');
            if (TrialInfoTemplateFile != '') {
                var fragmento = TrialInfoTemplateFile.split('.');
                var length = fragmento.length;
                var extension = fragmento[length - 1];
                if (!((extension == 'XLS') || (extension == 'xls'))) {
                    $('#TrialInfoTemplateFile').attr('value', '');
                    $("#TrialInfoTemplateFile").val('');
                    jAlert('Permitted file (.XLS)', 'Invalid File');
                }
            }
        });

        $('#CompressedFileTrialInfoDataTemplates').blur(function() {
            var CompressedFileTrialInfoDataTemplates = $('#CompressedFileTrialInfoDataTemplates').attr('value');
            if (CompressedFileTrialInfoDataTemplates != '') {
                var fragmento = CompressedFileTrialInfoDataTemplates.split('.');
                var length = fragmento.length;
                var extension = fragmento[length - 1];
                if (!((extension == 'zip') || (extension == 'ZIP'))) {
                    $('#CompressedFileTrialInfoDataTemplates').attr('value', '');
                    $("#CompressedFileTrialInfoDataTemplates").val('');
                    jAlert('Permitted file compressed(.Zip)', 'Invalid File');
                }
            }
        });

        function ValidaFiles() {
            var TrialTemplateFile = $('#TrialTemplateFile').attr('value');
            var TrialInfoTemplateFile = $('#TrialInfoTemplateFile').attr('value');
            if ((TrialTemplateFile == '') || (TrialInfoTemplateFile == '')) {
                jAlert('Please, Select Templates Files', 'Error');
            } else {
                $('#div_loading').show();
                $('#FormAction').attr('value', 'Execute');
                $('#FormStep2').submit();
            }
        }
    });
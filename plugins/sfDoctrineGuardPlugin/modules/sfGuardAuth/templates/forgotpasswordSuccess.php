<script>
    $(document).ready(function () {
        //DEFINICION DE CAMPOS OBLIGATORIOS
        var CamposObligatorios = {
            'emailaddress': 'Email address'
        };

        //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO
        $("#SubmitForgotpassword").click(function (event) {
            var Ico = "<img src='/images/bullet-black-icon.png'> ";
            var BanderaFaltantes = false;
            var MensajeFaltantes = "";
            $.each(CamposObligatorios, function (Id, Campo) {
                if ($('#' + Id).val() == '') {
                    BanderaFaltantes = true;
                    MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
                    CampoObligatorio(Id);
                } else {
                    CampoNormalObligatorio(Id);
                }
            });

            //VERIFICACION MENSAJE DE ALERTA
            if (BanderaFaltantes) {
                Mensaje(MensajeFaltantes);
                event.preventDefault();
            } else {
                $('#div_loading').show();
                $('#FormForgotpassword').submit();
            }
        });

        $('#emailaddress').blur(function () {
            if ($('#emailaddress').val() != '' && ($("#emailaddress").val().indexOf('@', 0) == -1 || $("#emailaddress").val().indexOf('.', 0) == -1)) {
                $('#emailaddress').attr('value', '');
                jError('Email address', 'Error', null);
            }
        });

    });
</script>
<div style="margin-top: 10px;">
    <span class="Title">Forgot Password</span>
</div>
<?php if (isset($Notice)) { ?>
    <span>
        <div class="alert alert-success">
            <?php echo $Notice; ?>
        </div>
    </span>
<?php } ?>
<div id="div_loading" class="loading" align="center" style="display:none;">
    <?php echo image_tag('loading.gif'); ?>
    <br>Please Wait...
</div>
<div class="Session" style="margin-top: 10px; margin-bottom: 10px; border-bottom-width: 0px; padding: 10px; border-top-width: 10px;">
    <form class="form-horizontal" id="FormForgotpassword" name="FormForgotpassword" action="<?php echo url_for('@forgotpassword'); ?>" enctype="multipart/form-data" method="post" autocomplete="off">
        <fieldset>
            <div class="form-group control-type-text">
                <div class="col-sm-2">Email address:</div>
                <div class=" col-sm-4 control-type-text">
                    <input class="form-control" type="text" name="emailaddress" id="emailaddress"/>                           
                </div>
            </div>
        </fieldset>
    </form>
</div>
<div class="form-group control-type-text" style="margin-left: 10px; margin-right: 0px;">
    <button class="btn btn-action" type="button" title=" Submit " id="SubmitForgotpassword" neme="SubmitForgotpassword"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span>&ensp;Submit&ensp;</button>
</div>
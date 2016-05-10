<script>
    $(document).ready(function() {
        //DEFINICION DE CAMPOS OBLIGATORIOS
        var CamposObligatorios = {
            'emailaddress': 'Email address'
        };

        //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO
        $("#SubmitForgotpassword").click(function(event) {
            var Ico = "<img src='/images/bullet-black-icon.png'> ";
            var BanderaFaltantes = false;
            var MensajeFaltantes = "";
            $.each(CamposObligatorios, function(Id, Campo) {
                if ($('#' + Id).attr('value') == '') {
                    BanderaFaltantes = true;
                    MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " \n";
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

        $('#emailaddress').blur(function() {
            if ($('#emailaddress').attr('value') != '' && ($("#emailaddress").val().indexOf('@', 0) == -1 || $("#emailaddress").val().indexOf('.', 0) == -1)) {
                $('#emailaddress').attr('value', '');
                jError('Email address', 'Error', null);
            }
        });

    });
</script>
<div class="page-header">
    <h1 class="title-module">Forgot Password</h1>
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
<form class="form-horizontal" id="FormForgotpassword" name="FormForgotpassword" action="<?php echo url_for('@forgotpassword'); ?>" enctype="multipart/form-data" method="post" autocomplete="off">
    <fieldset>
        <div class="form-group control-type-text">
            <label class="col-sm-4 control-label">Email address</label>      
            <div class=" col-sm-4 control-type-text">
                <input class="form-control" type="text" name="emailaddress" id="emailaddress"/>                           
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <button class="btn btn-action" type="button" title=" Submit " id="SubmitForgotpassword" neme="SubmitForgotpassword"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span>&ensp;Submit&ensp;</button>
    </div>
</form>
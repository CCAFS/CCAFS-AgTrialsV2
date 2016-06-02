<script>
    $(document).ready(function () {
        //DEFINICION DE CAMPOS OBLIGATORIOS
        var CamposObligatorios = {
            'firstname': 'First name',
            'lastname': 'Last name',
            'emailaddress': 'Email',
            'telephone': 'Telephone',
            'country': 'Country',
            'message': 'Message',
            'code': 'Security Code'
        };

        $('#SubmitContact').click(function () {
            var Ico = "<img src='/images/bullet-black-icon.png'> ";
            var BanderaFaltantes = false;
            var MensajeFaltantes = "";
            var CampoValor = "";
            $.each(CamposObligatorios, function (Id, Campo) {
                CampoValor = $("#" + Id).val();
                if (CampoValor === '') {
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
            } else {
                $('#div_loading').show();
                $('#FormContact').submit();
            }
        });

        $('#RefreshCode').click(function () {
            $.ajax({
                type: "GET",
                url: "/home/refreshcode",
                success: function (data) {
                    $('#securitycode').attr('value', data);
                }
            });

        });

        $('#code').blur(function () {
            var code = $('#code').val();
            var securitycode = $('#securitycode').val();
            if (code != securitycode) {
                $('#code_error').html("Sorry, the code you entered was invalid");
                $('#code').attr('value', '');
            } else {
                $('#code_error').html("");
            }
        });

        $('#code').focus(function () {
            $('#code_error').html('');
        });

    });
</script>
<div style="margin-top: 10px;">
    <span class="Title">Contact Us</span>
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
    <div class="form-group control-type-text" style="margin-left: 0px;">All fields marked with <span class="Mandatory">*</span> are required.</div>
    <form class="form-horizontal"  id="FormContact" name="FormContact" action="" method="post"  autocomplete="off">
        <div class="form-group control-type-text">
            <div class="col-sm-2"><span class="Mandatory">*</span> First name:</div>
            <div class="col-sm-4 control-type-text">
                <input class="form-control" type="text" name="firstname" id="firstname"/>
            </div>
        </div>
        <div class="form-group control-type-text">
            <div class="col-sm-2"><span class="Mandatory">*</span> Last name:</div>
            <div class="col-sm-4 control-type-text">
                <input class="form-control" type="text" name="lastname" id="lastname"/>
            </div>
        </div>
        <div class="form-group control-type-text">
            <div class="col-sm-2"><span class="Mandatory">*</span> E-mail:</div>
            <div class="col-sm-4 control-type-text">
                <input class="form-control" type="text" name="emailaddress" id="emailaddress"/>
            </div>
        </div>
        <div class="form-group control-type-text">
            <div class="col-sm-2"><span class="Mandatory">*</span> Telephone:</div>
            <div class="col-sm-4 control-type-text">
                <input class="form-control" type="text" name="telephone" id="telephone"/>
            </div>
        </div>
        <div class="form-group control-type-text">
            <div class="col-sm-2"><span class="Mandatory">*</span> Country:</div>
            <div class="col-sm-4 control-type-text">
                <input class="form-control" type="text" name="country" id="country"/>
            </div>
        </div>
        <div class="form-group control-type-text">
            <div class="col-sm-2"><span class="Mandatory">*</span> Message:</div>
            <div class="col-sm-4 control-type-text">
                <textarea class="form-control" id="message" name="message" title="Message" rows="5" cols="50"></textarea>
            </div>
        </div>
        <div class="form-group control-type-text">
            <div class="col-sm-2"><span class="Mandatory">*</span> Security Code:</div>
            <div class="col-sm-4 control-type-text">
                <div id="CodeError"></div>
                <div class="col-sm-6 control-type-text" style="padding-left: 0px;">
                    <input class="form-control" type="text" name="code" id="code" size="15" oncopy="return false;" onpaste="return false;" oncut="return false;" autocomplete="off" />
                </div>
                <input type="text" value="<?php echo @generatecode(6); ?>" name="securitycode" id="securitycode" class="CodeBox" oncopy="return false;" onpaste="return false;" oncut="return false;" readonly="readonly" /> 
                <span><img src="/images/actions-view-refresh-icon.png" id="RefreshCode" title="Refresh security code" alt="picture not loaded"/></span>
            </div>
        </div>
    </form>
</div>    
<div class="form-group control-type-text" style="margin-left: 10px; margin-right: 0px;">
    <button class="btn btn-action" type="button" title=" Submit " id="SubmitContact" neme="SubmitContact"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span>&ensp;Submit&ensp;</button>
</div>
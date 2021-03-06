<script>
    $(document).ready(function () {
        //DEFINICION DE CAMPOS OBLIGATORIOS
        var CamposObligatorios = {
            'emailaddress': 'Email address',
            'firstname': 'First name',
            'lastname': 'Last name',
            'institution': 'Institution or Affiliation',
            'country': 'Country',
            'address': 'Address',
            'telephone': 'Telephone',
            'motivation': 'Motivation',
            'code': 'Security Code'
        };

        //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO
        $("#SubmitRegister").click(function () {
            var Ico = "<img src='/images/bullet-black-icon.png'> ";
            var BanderaFaltantes = false;
            var MensajeFaltantes = "";
            $.each(CamposObligatorios, function (Id, Campo) {
                if ($('#' + Id).val() === '') {
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
                $('#FormRegister').submit();
            }
        });

        $('#emailaddress').blur(function () {
            var emailaddress = $('#emailaddress').val();
            if ($('#emailaddress').val() != '' && ($("#emailaddress").val().indexOf('@', 0) == -1 || $("#emailaddress").val().indexOf('.', 0) == -1)) {
                $('#ErrorEmailAddress').html('Email address Error');
            } else {
                $.ajax({
                    type: "GET",
                    url: "/home/validacorreo",
                    data: "emailaddress=" + emailaddress,
                    success: function (data) {
                        $('#ErrorEmailAddress').html(data);
                        if (data != '')
                            $('#emailaddress').val('');
                    }
                });
            }
        });

        $('#RefreshCode').click(function () {
            $.ajax({
                type: "GET",
                url: "/home/refreshcode",
                success: function (data) {
                    $('#securitycode').val(data);
                }
            });

        });

        $('#code').blur(function () {
            var code = $('#code').val();
            var securitycode = $('#securitycode').val();
            if (code != securitycode) {
                $('#CodeError').html("Sorry, the code you entered was invalid");
                $('#code').val('');
            } else {
                $('#CodeError').html("");
            }
        });

        $('#code').focus(function () {
            $('#CodeError').html('');
        });

    });
</script>
<div style="margin-top: 10px;">
    <span class="Title">Register</span>
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
    <form class="form-horizontal"  id="FormRegister" name="FormRegister" action="" method="post"  autocomplete="off">
        <fieldset>
            <div class="form-group control-type-text">
                <div class="col-sm-2"><span class="Mandatory">*</span> Email address:</div>
                <div class="col-sm-4 control-type-text">
                    <div id="ErrorEmailAddress"></div>
                    <div class="col-sm-15 control-type-text">
                        <input class="form-control" type="text" name="emailaddress" id="emailaddress"/>
                    </div>
                </div>
            </div>
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
                <div class="col-sm-2" style="width: 191px; padding-right: 0px;"><span class="Mandatory">*</span> Institution or Affiliation:</div>
                <div class="col-sm-4 control-type-text">
                    <input name="id_institution" id="id_institution" type="hidden" value="" /> 
                    <input class="form-control SearchInput" name="institution" id="institution" type="text"/>
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2"><span class="Mandatory">*</span> Country:</div>
                <div class="col-sm-4 control-type-text">
                    <input name="id_country" id="id_country" type="hidden"value="" /> 
                    <input class="form-control SearchInput" name="country" id="country" type="text" size="17" maxlength="150" value="" />
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2">City:</div>
                <div class="col-sm-4 control-type-text">
                    <input class="form-control" type="text" name="city" id="city"/>
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2">State:</div>
                <div class="col-sm-4 control-type-text">
                    <input class="form-control" type="text" name="state" id="state"/>
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2"><span class="Mandatory">*</span> Address:</div>
                <div class="col-sm-4 control-type-text">
                    <input class="form-control" type="text" name="address" id="address"/>
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2"><span class="Mandatory">*</span> Telephone:</div>
                <div class="col-sm-4 control-type-text">
                    <input class="form-control" type="text" name="telephone" id="telephone"/>
                </div>
            </div>
            <div>
                <p>
                    <strong>Information:</strong> The www.agtrials.org
                    database is not yet fully available to the general
                    public. If you interested in full access, please state
                    your motivation for accessing the database. Will you
                    contribute any data to the database? What is your
                    intended use of the data? In the short term, we will not
                    be granting full access to everyone requesting it. After
                    filling out this form, we will contact you regarding your
                    collaboration with Agtrials.org. Please fill in the text
                    box below with this motivation:
                </p>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2"><span class="Mandatory">*</span> Motivation:</div>
                <div class="col-sm-4 control-type-text">
                    <textarea class="form-control" name="motivation" id="motivation" rows="3" cols="68"></textarea>
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
        </fieldset>
    </form>
</div> 
<div class="form-group control-type-text" style="margin-left: 10px; margin-right: 0px;">
    <button class="btn btn-action" type="button" title=" Submit " id="SubmitRegister" neme="SubmitRegister"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span>&ensp;Submit&ensp;</button>
</div>


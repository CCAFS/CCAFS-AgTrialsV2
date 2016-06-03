<?php
$sfGuardUser = Doctrine::getTable('sfGuardUser')->findOneBy("Username", sfContext::getInstance()->getUser()->getUsername());
$userid = $sfGuardUser->id;
$sfGuardUserInformation = Doctrine::getTable('sfGuardUserInformation')->findOneByUserId($userid);
if ($sfGuardUserInformation->key == '')
    $key = strtoupper(generatecode(15));
else
    $key = $sfGuardUserInformation->key;

$EmailAddress = "";
if (!(strpos($sfGuardUser->email_address, "none")))
    $EmailAddress = $sfGuardUser->email_address;
?>
<script>
    $(document).ready(function () {
        //DEFINICION DE CAMPOS OBLIGATORIOS
        var CamposObligatorios = {
            'email_address': 'Email address',
            'first_name': 'First name',
            'last_name': 'Last name',
            'institution': 'Institution or Affiliation',
            'country': 'Country',
            'address': 'Address',
            'telephone': 'Telephone',
            'motivation': 'Motivation',
            'code': 'Security Code'
        };

        //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO
        $("#SubmitUser").click(function (event) {
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
                $('#FormUser').submit();
            }
        });

        $('#email_address').blur(function () {
            var Icon = "<img width='13' height='13' src='/images/bullet-black-icon.png'> ";
            if ($('#email_address').val() != '' && ($("#email_address").val().indexOf('@', 0) == -1 || $("#email_address").val().indexOf('.', 0) == -1)) {
                $('#email_address').val('');
                alerts.show({css: 'error', title: 'Required Fields', message: Icon + " Invalid Email address"});
            }
        });
    });
</script>
<div style="margin-top: 10px;">
    <span class="Title">Profile</span>
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
    <form class="form-horizontal" id="FormUser" name="FormUser" action="" enctype="multipart/form-data" method="post" autocomplete="off">
        <fieldset>
            <div class="form-group control-type-text">
                <div class="col-sm-2">Username:</div>
                <div class="col-sm-4 control-type-text">
                    <input class="form-control" type="text" name="username" id="username" value="<?php echo $sfGuardUser->username; ?>" readonly />   
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $sfGuardUser->id; ?>">
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2">Email address:</div>
                <div class="col-sm-4 control-type-text">
                    <input class="form-control" type="text" name="email_address" id="email_address" value="<?php echo $EmailAddress; ?>"/>                           
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2">First name:</div>
                <div class="col-sm-4 control-type-text">
                    <input class="form-control" type="text" name="first_name" id="first_name" value="<?php echo $sfGuardUser->first_name; ?>"/>                           
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2">Last name:</div>
                <div class="col-sm-4 control-type-text">
                    <input class="form-control" type="text" name="last_name" id="last_name" value="<?php echo $sfGuardUser->last_name; ?>"/>                           
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2">Institution or Affiliation:</div>
                <div class="col-sm-4 control-type-text">
                    <input name="id_institution" id="id_institution" type="hidden" value="<?php echo $sfGuardUserInformation->id_institution; ?>">
                    <input class="form-control SearchInput" name="institution" id="institution" type="text" value="<?php echo GetInformationTable("tb_institution I INNER JOIN tb_administrativedivision DA ON I.id_country = DA.id_administrativedivision", "I.insname||' - '||DA.dmdvname", "I.id_institution", $sfGuardUserInformation->id_institution); ?>">
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2">Country:</div>
                <div class="col-sm-4 control-type-text">
                    <input name="id_country" id="id_country" type="hidden" value="<?php echo $sfGuardUserInformation->id_country; ?>">
                    <input class="form-control SearchInput" name="country" id="country" type="text" value="<?php echo GetInformationTable("tb_administrativedivision", "dmdvname", "id_administrativedivision", $sfGuardUserInformation->id_country); ?>">
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2">City:</div>
                <div class="col-sm-4 control-type-text">
                    <input class="form-control" type="text" name="city" id="city" value="<?php echo $sfGuardUserInformation->city; ?>"/>                           
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2">State:</div>
                <div class="col-sm-4 control-type-text">
                    <input class="form-control" type="text" name="state" id="state" value="<?php echo $sfGuardUserInformation->state; ?>"/>                           
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2">Address:</div>
                <div class="col-sm-4 control-type-text">
                    <input class="form-control" type="text" name="address" id="address" value="<?php echo $sfGuardUserInformation->address; ?>"/>                           
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2">Telephone:</div>
                <div class="col-sm-4 control-type-text">
                    <input class="form-control" type="text" name="telephone" id="telephone" value="<?php echo $sfGuardUserInformation->telephone; ?>"/>                           
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2">Key:</div>
                <div class="col-sm-4 control-type-text">
                    <input class="form-control" type="text" name="key" id="key" value="<?php echo $key; ?>" readonly/>                           
                </div>
            </div>
        </fieldset>
    </form>
</div>
<div class="form-group control-type-text" style="margin-left: 10px; margin-right: 0px;">
    <button class="btn btn-action" type="button" title=" Submit " id="SubmitUser" neme="SubmitUser"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span>&ensp;Submit&ensp;</button>
</div>
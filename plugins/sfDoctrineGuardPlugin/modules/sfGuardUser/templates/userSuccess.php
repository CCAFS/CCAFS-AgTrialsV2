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
<link rel="stylesheet" href="/autocomplete/css/autocomplete.css">
<script src="/autocomplete/lib/jquery.1.7.1.js"></script>
<script src="/autocomplete/lib/jquery.ui.1.8.16.js"></script>
<script src="/autocomplete/autocomplete.js"></script>
<script>
    $(document).ready(function() {
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
        $("#SubmitUser").click(function(event) {
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
                $('#FormUser').submit();
            }
        });

        $('#email_address').blur(function() {
            if ($('#email_address').attr('value') != '' && ($("#email_address").val().indexOf('@', 0) == -1 || $("#email_address").val().indexOf('.', 0) == -1)) {
                $('#email_address').attr('value', '');
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
<form class="form-horizontal" id="FormUser" name="FormUser" action="" enctype="multipart/form-data" method="post" autocomplete="off">
    <fieldset>
        <div class="form-group control-type-text">
            <label class="col-sm-4 control-label">Username</label>      
            <div class=" col-sm-4 control-type-text">
                <input class="form-control" type="text" name="username" id="username" value="<?php echo $sfGuardUser->username; ?>" readonly/>   
                <input type="hidden" name="user_id" id="user_id" value="<?php echo $sfGuardUser->id; ?>">
            </div>
        </div>
        <div class="form-group control-type-text">
            <label class="col-sm-4 control-label">Email address</label>      
            <div class=" col-sm-4 control-type-text">
                <input class="form-control" type="text" name="email_address" id="email_address" value="<?php echo $EmailAddress; ?>"/>                           
            </div>
        </div>
        <div class="form-group control-type-text">
            <label class="col-sm-4 control-label">First name</label>      
            <div class=" col-sm-4 control-type-text">
                <input class="form-control" type="text" name="first_name" id="first_name" value="<?php echo $sfGuardUser->first_name; ?>"/>                           
            </div>
        </div>
        <div class="form-group control-type-text">
            <label class="col-sm-4 control-label">Last name</label>      
            <div class=" col-sm-4 control-type-text">
                <input class="form-control" type="text" name="last_name" id="last_name" value="<?php echo $sfGuardUser->last_name; ?>"/>                           
            </div>
        </div>
        <div class="form-group control-type-text">
            <label class="col-sm-4 control-label">Institution or Affiliation</label>      
            <div class=" col-sm-4 control-type-text">
                <input name="id_institution" id="id_institution" type="hidden" value="<?php echo $sfGuardUserInformation->id_institution; ?>">
                <input class="form-control SearchInput" name="institution" id="institution" type="text" value="<?php echo GetInformationTable("tb_institution I INNER JOIN tb_administrativedivision DA ON I.id_country = DA.id_administrativedivision", "I.insname||' - '||DA.dmdvname", "I.id_institution", $sfGuardUserInformation->id_institution); ?>">
            </div>
        </div>
        <div class="form-group control-type-text">
            <label class="col-sm-4 control-label">Country</label>      
            <div class=" col-sm-4 control-type-text">
                <input name="id_country" id="id_country" type="hidden" value="<?php echo $sfGuardUserInformation->id_country; ?>">
                <input class="form-control SearchInput" name="country" id="country" type="text" value="<?php echo GetInformationTable("tb_administrativedivision", "dmdvname", "id_administrativedivision", $sfGuardUserInformation->id_country); ?>">
            </div>
        </div>
        <div class="form-group control-type-text">
            <label class="col-sm-4 control-label">City</label>      
            <div class=" col-sm-4 control-type-text">
                <input class="form-control" type="text" name="city" id="city" value="<?php echo $sfGuardUserInformation->city; ?>"/>                           
            </div>
        </div>
        <div class="form-group control-type-text">
            <label class="col-sm-4 control-label">State</label>      
            <div class=" col-sm-4 control-type-text">
                <input class="form-control" type="text" name="state" id="state" value="<?php echo $sfGuardUserInformation->state; ?>"/>                           
            </div>
        </div>
        <div class="form-group control-type-text">
            <label class="col-sm-4 control-label">Address</label>      
            <div class=" col-sm-4 control-type-text">
                <input class="form-control" type="text" name="address" id="address" value="<?php echo $sfGuardUserInformation->address; ?>"/>                           
            </div>
        </div>
        <div class="form-group control-type-text">
            <label class="col-sm-4 control-label">Telephone</label>      
            <div class=" col-sm-4 control-type-text">
                <input class="form-control" type="text" name="telephone" id="telephone" value="<?php echo $sfGuardUserInformation->telephone; ?>"/>                           
            </div>
        </div>
        <div class="form-group control-type-text">
            <label class="col-sm-4 control-label">Key</label>      
            <div class=" col-sm-4 control-type-text">
                <input class="form-control" type="text" name="key" id="key" value="<?php echo $key; ?>" readonly/>                           
            </div>
        </div>

    </fieldset>
    <div class="form-actions">
        <button class="btn btn-action" type="button" title=" Submit " id="SubmitUser" neme="SubmitUser"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span>&ensp;Submit&ensp;</button>
    </div>
</form>
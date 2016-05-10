<script>
    $(document).ready(function () {
        //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO
        $("#SubmitSignin").click(function (event) {
            $('#div_loading').show();
            $('#FormSignin').submit();
        });

    });
</script>
<div>
    <span class="Title">Welcome to Trial Site - Sign In</span>
</div>
<div id="div_loading" class="loading" align="center" style="display:none;">
    <?php echo image_tag('loading.gif'); ?>
    <br>Please Wait...
</div>
<div class="Session"style="margin-top: 10px; margin-bottom: 10px;">
    <form class="form-horizontal" id="FormSignin" name="FormSignin" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
        <?php if ($form->hasErrors()): ?>
            <div class="alert alert-warning">
                <a data-dismiss="alert" class="close fade" href="#">×</a>
                The username and/or password is invalid.  </div>
        <?php endif; ?>
        <fieldset>
            <div class="form-group control-type-text">
                <label class="col-sm-4 control-label">Username</label>      
                <div class=" col-sm-4 control-type-text">
                    <?php echo $form['username'] ?>                           
                </div>
            </div>
            <div class="form-group control-type-text">
                <label class="col-sm-4 control-label">Password</label>      
                <div class=" col-sm-4 control-type-text">
                    <?php echo $form['password'] ?>    
                    <?php echo $form['_csrf_token'] ?>
                </div>
            </div>
        </fieldset>
        <div class="form-actions">
            <button class="btn btn-action" type="button" title=" Sign in " id="SubmitSignin" neme="SubmitSignin"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&ensp;Sign in&ensp;</button>
            <button class="btn btn-action" type="button" title=" Forgot your password " id="ForgotPassword" neme="ForgotPassword" OnClick="window.location = '/forgotpassword'"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&ensp;Forgot your password&ensp;</button>
        </div>
    </form>
</div>

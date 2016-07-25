<link rel="stylesheet" type="text/css" media="screen" href="/css/prosessescheck.css"/>
<div class="row">
    <div class="col-md-2 left-column">
        <?php include_partial('admin/ModuleMenu') ?>
    </div>
    <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
        <span class="Title">Module help</span>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <form class="form-horizontal" id="modulehelp" name="modulehelp" action="<?php echo url_for('@modulehelp'); ?>" enctype="multipart/form-data" method="post">
                <fieldset>

                </fieldset>
            </form>
        </div>
    </div>
</div>
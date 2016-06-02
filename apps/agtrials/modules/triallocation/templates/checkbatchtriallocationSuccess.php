<script>
    $(document).ready(function () {
        $('#uploadsubmit').click(function () {
            var id_country = $('#id_country').val();
            var checkbatchtriallocationfile = $('#checkbatchtriallocationfile').val();
            if (id_country == '') {
                jAlert('Select Country', 'Incomplete Information', null);
            } else if (checkbatchtriallocationfile == '') {
                jAlert('Select Check trial location template file', 'Invalid File', null);
            } else {
                var fragmento = checkbatchtriallocationfile.split('.');
                var extension = fragmento[1];
                if (!((extension == 'XLS') || (extension == 'xls'))) {
                    $('#checkbatchtriallocationfile').attr('value', '');
                    $("#checkbatchtriallocationfile").val('');
                    jAlert('Permitted file (.XLS)', 'Invalid File', null);
                } else {
                    $('#checkbatchtriallocation').submit();
                }
            }
        });
    });
</script>
<div class="row">
    <div class="col-md-2 left-column">
        <?php include_partial('admin/ProsessesCheckMenu') ?>
    </div>
    <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
        <span class="Title">Check Batch Trial Location</span>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <form class="form-horizontal" id="checkbatchtriallocation" name="checkbatchtriallocation" action="<?php echo url_for('@checkbatchtriallocation'); ?>" enctype="multipart/form-data" method="post">
                <fieldset>
                    <span>Check trial location template file must have <b>.xls</b> extension and must be smaller than <b>5 MB</b> maximum size.</span></br>
                    <span>Exact number of columns <b>'1'</b> for Template File.</span></br>
                    <span>Max. <b>50000 Records</b> for Template File.</span></br>
                    <span>Don't close the window during the process.</span>
                </fieldset>
                <br>
                <div>Download templates:</div>
                <div class="row RowDownloadTemplate">
                    <div onclick="window.location.href = '/downloadcheckbatchtriallocation'" class="DownloadTemplate">
                        <img width="60" height="50" border="0" src="/images/DownloadTemplate.png">
                        <div>Check trial location template file</div>
                    </div>
                </div>
                <br>
                <div class="form-group control-type-text">
                    <div class="col-sm-2">Country:</div>
                    <div class=" col-sm-3 control-type-text">
                        <?php echo select_from_country_triallocation("id_country", null, "class='form-control'"); ?>
                    </div>
                </div>
                <div class="form-group control-type-text">
                    <div class="col-sm-2">Template file:</div>
                    <div class=" col-sm-3 control-type-text">
                        <input type="file" name="checkbatchtriallocationfile" id="checkbatchtriallocationfile">
                    </div>
                </div>
        </div>
        <div class="form-group control-type-text" style="margin-left: 10px; margin-right: 0px;">
            <button class="btn btn-action" type="button" title=" Execute " id="uploadsubmit" neme="Execute"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&ensp;Execute&ensp;</button>
        </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#uploadsubmit').click(function () {
            var id_crop = $('#id_crop').val();
            var checkbatchvariablesmeasuredfile = $('#checkbatchvariablesmeasuredfile').val();
            if (id_crop == '') {
                jAlert('Select Crop', 'Incomplete Information', null);
            } else if (checkbatchvariablesmeasuredfile == '') {
                jAlert('Select check variables measured template file', 'Invalid File', null);
            } else {
                var fragmento = checkbatchvariablesmeasuredfile.split('.');
                var extension = fragmento[1];
                if (!((extension == 'XLS') || (extension == 'xls'))) {
                    $('#checkbatchvariablesmeasuredfile').attr('value', '');
                    $("#checkbatchvariablesmeasuredfile").val('');
                    jAlert('Permitted file (.XLS)', 'Invalid File', null);
                } else {
                    $('#checkbatchvariablesmeasured').submit();
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
        <span class="Title">Check Batch Variables Measured</span>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <form class="form-horizontal" id="checkbatchvariablesmeasured" name="checkbatchvariablesmeasured" action="<?php echo url_for('@checkbatchvariablesmeasured'); ?>" enctype="multipart/form-data" method="post">
                <fieldset>
                    <span>Check variables measured template file must have <b>.xls</b> extension and must be smaller than <b>5 MB</b> maximum size.</span></br>
                    <span>Exact number of columns <b>'1'</b> for Template File.</span></br>
                    <span>Max. <b>50000 Records</b> for Template File.</span></br>
                    <span>Don't close the window during the process.</span>
                </fieldset>
                <br>
                <div>Download templates:</div>
                <div class="row RowDownloadTemplate">
                    <div onclick="window.location.href = '/downloadcheckbatchvariablesmeasured'" class="DownloadTemplate">
                        <img width="60" height="50" border="0" src="/images/DownloadTemplate.png">
                        <div>Check variables measured template file</div>
                    </div>
                </div>
                <br>
                <div class="form-group control-type-text">
                    <div class="col-sm-2">Crop:</div>
                    <div class=" col-sm-3 control-type-text">
                        <?php echo select_from_table("id_crop", "TbCrop", "id_crop", "crpname", null, null, "class='form-control'"); ?>
                    </div>
                </div>
                <div class="form-group control-type-text">
                    <div class="col-sm-2">Template file:</div>
                    <div class=" col-sm-3 control-type-text">
                        <input type="file" name="checkbatchvariablesmeasuredfile" id="checkbatchvariablesmeasuredfile">
                    </div>
                </div>
                <br>
                <fieldset>
                    <div class="form-group control-type-text" style="margin-left: 0px; margin-right: 0px;">
                        <button class="btn btn-action" type="button" title=" Execute " id="uploadsubmit" neme="Execute"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&ensp;Execute&ensp;</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
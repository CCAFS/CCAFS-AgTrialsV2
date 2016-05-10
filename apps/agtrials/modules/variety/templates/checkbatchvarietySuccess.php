<script>
    $(document).ready(function() {
        $('#uploadsubmit').click(function() {
            var id_crop = $('#id_crop').attr('value');
            var checkbatchvarietyfile = $('#checkbatchvarietyfile').attr('value');
            if (id_crop == '') {
                jAlert('Select Crop', 'Incomplete Information', null);
            } else if (checkbatchvarietyfile == '') {
                jAlert('Select check variety template file', 'Invalid File', null);
            } else {
                var fragmento = checkbatchvarietyfile.split('.');
                var extension = fragmento[1];
                if (!((extension == 'XLS') || (extension == 'xls'))) {
                    $('#checkbatchvarietyfile').attr('value', '');
                    $("#checkbatchvarietyfile").val('');
                    jAlert('Permitted file (.XLS)', 'Invalid File', null);
                } else {
                    $('#checkbatchvariety').submit();
                }
            }
        });
    });
</script>
<div class="page-header">
    <h1 class="title-module">Check batch variety</h1>
</div>
<form class="form-horizontal" id="checkbatchvariety" name="checkbatchvariety" action="<?php echo url_for('@checkbatchvariety'); ?>" enctype="multipart/form-data" method="post">
    <fieldset>
        <legend align= "left">&ensp;<b>Attention</b>&ensp;</legend>
        <span><?php echo image_tag('attention-icon.png'); ?> Check variety template file must have <b>.xls</b> extension and must be smaller than <b>5 MB</b> maximum size </span></br>
        <span><?php echo image_tag('attention-icon.png'); ?> Exact number of columns <b>'1'</b> for Template File</span></br>
        <span><?php echo image_tag('attention-icon.png'); ?> Max. <b>50000 Records</b> for Template File </span></br>
        <span><?php echo image_tag('attention-icon.png'); ?> Don't close the window during the process </span>
    </fieldset>
    <br>
    <fieldset>
        <legend align= "left">&ensp;<b>Download Template</b>&ensp;</legend>
        <button class="btn btn-action" type="button" name="Downloadcheckbatchvariety" id="Downloadcheckbatchvariety"  onclick="window.location.href = '/downloadcheckbatchvariety'" title="Check variety template file"><span aria-hidden="true" class="glyphicon glyphicon-download"></span>&ensp;Check variety template file</button>      
    </fieldset>
    <br>
    <br>
    <fieldset>
        <legend align= "left">&ensp;<b>Upload Template</b>&ensp;</legend>
        <div class="form-group control-type-text">
            <label class="col-sm-5 control-label" style="width: 220px;">Crop</label>
            <div class="col-sm-4 control-type-text">
                <?php echo select_from_table("id_crop", "TbCrop", "id_crop", "crpname", null, null, "class='form-control'"); ?>
            </div>
        </div>
        <div class="form-group control-type-text">
            <label class="col-sm-5 control-label" style="width: 220px;">Check variety template file</label>
            <div class="col-sm-4 control-type-text">
                <input type="file" name="checkbatchvarietyfile" id="checkbatchvarietyfile">
            </div>
        </div>
    </fieldset>
    <br>
    <fieldset>
        <div class="form-group control-type-text" style="margin-left: 0px; margin-right: 0px;">
            <button class="btn btn-action" type="button" title=" Execute " id="uploadsubmit" neme="Execute"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&ensp;Execute&ensp;</button>
        </div>
    </fieldset>
</form>
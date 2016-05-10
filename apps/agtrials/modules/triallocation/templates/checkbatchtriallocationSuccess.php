<script>
    $(document).ready(function() {
        $('#uploadsubmit').click(function() {
            var id_country = $('#id_country').attr('value');
            var checkbatchtriallocationfile = $('#checkbatchtriallocationfile').attr('value');
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
<div class="page-header">
    <h1 class="title-module">Check batch trial location</h1>
</div>
<form class="form-horizontal" id="checkbatchtriallocation" name="checkbatchtriallocation" action="<?php echo url_for('@checkbatchtriallocation'); ?>" enctype="multipart/form-data" method="post">
    <fieldset>
        <legend align= "left">&ensp;<b>Attention</b>&ensp;</legend>
        <span><?php echo image_tag('attention-icon.png'); ?> Check trial location template file must have <b>.xls</b> extension and must be smaller than <b>5 MB</b> maximum size </span></br>
        <span><?php echo image_tag('attention-icon.png'); ?> Exact number of columns <b>'1'</b> for Template File</span></br>
        <span><?php echo image_tag('attention-icon.png'); ?> Max. <b>50000 Records</b> for Template File </span></br>
        <span><?php echo image_tag('attention-icon.png'); ?> Don't close the window during the process </span>
    </fieldset>
    <br>
    <fieldset>
        <legend align= "left">&ensp;<b>Download Template</b>&ensp;</legend>
        <button class="btn btn-action" type="button" name="Downloadcheckbatchtriallocation" id="Downloadcheckbatchtriallocation"  onclick="window.location.href = '/downloadcheckbatchtriallocation'" title="Check trial location template file"><span aria-hidden="true" class="glyphicon glyphicon-download"></span>&ensp;Check trial location template file</button>      
    </fieldset>
    <br>
    <br>
    <fieldset>
        <legend align= "left">&ensp;<b>Upload Template</b>&ensp;</legend>
        <div class="form-group control-type-text">
            <label class="col-sm-5 control-label" style="width: 260px;">Country</label>
            <div class="col-sm-4 control-type-text">
                <?php echo select_from_country_triallocation("id_country", null, "class='form-control'"); ?>
            </div>
        </div>
        <div class="form-group control-type-text">
            <label class="col-sm-5 control-label" style="width: 260px;">Check trial location template file</label>
            <div class="col-sm-4 control-type-text">
                <input type="file" name="checkbatchtriallocationfile" id="checkbatchtriallocationfile">
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
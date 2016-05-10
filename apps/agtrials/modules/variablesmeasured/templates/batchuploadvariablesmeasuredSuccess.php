<script>
    $(document).ready(function() {
        $('#uploadsubmit').click(function() {
            var filevariablesmeasured = $('#filevariablesmeasured').attr('value');
            if (filevariablesmeasured == '') {
                jAlert('Select Variables measured Template File', 'Invalid File');
            } else {
                var fragmento = filevariablesmeasured.split('.');
                var extension = fragmento[1];
                if (!((extension == 'XLS') || (extension == 'xls'))) {
                    $('#filevariablesmeasured').attr('value', '');
                    $("#filevariablesmeasured").val('');
                    jAlert('Permitted file (.XLS)', 'Invalid File');
                } else {
                    $('#div_loading').show();
                    $('#batchuploadvariablesmeasured').submit();
                }
            }
        });
    });
</script>
<div class="page-header">
    <h1 class="title-module">Batch Upload Variables measured</h1>
</div>
<form class="form-horizontal" id="batchuploadvariablesmeasured" name="batchuploadvariablesmeasured" action="<?php echo url_for('@batchuploadvariablesmeasured'); ?>" enctype="multipart/form-data" method="post">
    <fieldset>
        <legend align= "left">&ensp;<b>Attention</b>&ensp;</legend>
        <span><?php echo image_tag('attention-icon.png'); ?> Templates Files must have <b>.xls</b> extension and must be smaller than <b>5 MB</b> maximum size </span></br>
        <span><?php echo image_tag('attention-icon.png'); ?> Exact number of columns <b>'7'</b> for Template File</span></br>
        <span><?php echo image_tag('attention-icon.png'); ?> Max. <b>10000 Records</b> for Template File </span></br>
        <span><?php echo image_tag('attention-icon.png'); ?> Don't close the window during the process </span>
    </fieldset>
    </br>
    <fieldset>
        <legend align= "left">&ensp;<b>Download Template</b>&ensp;</legend>
        <button class="btn btn-action" type="button" name="DownloadVariablesMeasuredTemplateFile" id="DownloadVariablesMeasuredTemplateFile"  onclick="window.location.href = '/downloadestruturevariablesmeasured'" title="Variables measured template file"><span aria-hidden="true" class="glyphicon glyphicon-download"></span>&ensp;Variables measured template file</button>      
    </fieldset>
    </br></br>
    <fieldset>
        <div class="form-group control-type-text">
            <label class="col-sm-5 control-label" style="width: 270px;">Variables measured Template File</label>
            <div class="col-sm-4 control-type-text">
                <input type="file" name="filevariablesmeasured" id="filevariablesmeasured">
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group control-type-text" style="margin-left: 0px; margin-right: 0px;">
            <button class="btn btn-action" type="button" title=" Execute " id="uploadsubmit" neme="Execute"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&ensp;Execute&ensp;</button>
        </div>
    </fieldset>
</form>
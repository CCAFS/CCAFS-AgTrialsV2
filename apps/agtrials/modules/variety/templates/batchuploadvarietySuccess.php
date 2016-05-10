<script>
    $(document).ready(function() {
        $('#uploadsubmit').click(function() {
            var filevariety = $('#filevariety').attr('value');
            if (filevariety == '') {
                jAlert('Select Variety Template File', 'Invalid File');
            } else {
                var fragmento = filevariety.split('.');
                var extension = fragmento[1];
                if (!((extension == 'XLS') || (extension == 'xls'))) {
                    $('#filevariety').attr('value', '');
                    $("#filevariety").val('');
                    jAlert('Permitted file (.XLS)', 'Invalid File');
                } else {
                    $('#div_loading').show();
                    $('#batchuploadvariety').submit();
                }
            }
        });
    });
</script>
<div class="page-header">
    <h1 class="title-module">Batch Upload Variety</h1>
</div>
<form class="form-horizontal" id="batchuploadvariety" name="batchuploadvariety" action="<?php echo url_for('@batchuploadvariety'); ?>" enctype="multipart/form-data" method="post">
    <fieldset>
        <legend align= "left">&ensp;<b>Attention</b>&ensp;</legend>
        <span><?php echo image_tag('attention-icon.png'); ?> Templates Files must have <b>.xls</b> extension and must be smaller than <b>5 MB</b> maximum size </span></br>
        <span><?php echo image_tag('attention-icon.png'); ?> Exact number of columns <b>'5'</b> for Template File</span></br>
        <span><?php echo image_tag('attention-icon.png'); ?> Max. <b>10000 Records</b> for Template File </span></br>
        <span><?php echo image_tag('attention-icon.png'); ?> Don't close the window during the process </span>
    </fieldset>
    </br>
    <fieldset>
        <legend align= "left">&ensp;<b>Download Template</b>&ensp;</legend>
        <button class="btn btn-action" type="button" name="DownloadVarietyTemplateFile" id="DownloadVarietyTemplateFile"  onclick="window.location.href = '/downloadestruturevariety'" title="Variety template file"><span aria-hidden="true" class="glyphicon glyphicon-download"></span>&ensp;Variety template file</button>      
    </fieldset>
    </br></br>
    <fieldset>
        <div class="form-group control-type-text">
            <label class="col-sm-5 control-label" style="width: 220px;">Variety Template File</label>
            <div class="col-sm-4 control-type-text">
                <input type="file" name="filevariety" id="filevariety">
            </div>
        </div>
    </fieldset>
    <fieldset>
        <div class="form-group control-type-text" style="margin-left: 0px; margin-right: 0px;">
            <button class="btn btn-action" type="button" title=" Execute " id="uploadsubmit" neme="Execute"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&ensp;Execute&ensp;</button>
        </div>
    </fieldset>
</form>
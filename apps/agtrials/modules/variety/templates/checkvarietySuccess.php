<script>
    $(document).ready(function () {
        $('#id_crop').change(function () {
            var id_crop = $('#id_crop').attr('value');
            $('#InfoResult').html("");
            $('#DataResult').html("");
            $.ajax({
                type: "GET",
                url: "/variety/assigncrop/",
                data: "id_crop=" + id_crop,
                success: function (data) {
                    $('#Alphabet').html(data);
                }
            });
        });
    });

    function SelectLetter(letter) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/variety/selectletter/",
            data: "letter=" + letter,
            success: function (data) {
                var json = eval(data);
                var InfoResult = json.InfoResult
                var DataResult = json.DataResult
                $('#InfoResult').html(InfoResult);
                $('#DataResult').html(DataResult);
                var RowCountDataResult = $("#TableResult >tbody >tr").length;
                if (RowCountDataResult < 10) {
                    $("#HeadTableResult").css("width", "100%");
                } else {
                    $("#HeadTableResult").css("width", "98.5%");
                }
            }
        });
    }
</script>
<link rel="stylesheet" type="text/css" media="screen" href="/css/prosessescheck.css"/>
<div class="row">
    <div class="col-md-2 left-column">
        <?php include_partial('admin/ProsessesCheckMenu') ?>
    </div>
    <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
        <span class="Title">Check variety</span>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <form class="form-horizontal" id="checkvariety" name="checkvariety" action="<?php echo url_for('@checkvariety'); ?>" enctype="multipart/form-data" method="post">
                <fieldset>
                    <div class="form-group control-type-text">
                        <div class="col-sm-1">Crop:</div>
                        <div class="col-sm-3 control-type-text">
                            <?php echo select_from_crop_variablesmeasured("id_crop", null, "class='form-control'"); ?>
                        </div>
                        <br><br>
                        <div class="col-sm-12 control-type-text" style="margin-top: 13px;" id="Alphabet"></div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="col-sm-12 form-group control-type-text">
                        <div class="panel panel-default">
                            <div class="panel-heading Title" id="InfoResult"></div>
                            <table id="TableResult" class="table table-striped table-fixed table-hover">
                                <thead id="HeadTableResult">
                                    <tr>
                                        <th class="col-xs-5">Name</th>
                                        <th class="col-xs-2">Origin</th>
                                        <th class="col-xs-2">Synonymous</th>
                                        <th class="col-xs-3">Description</th>
                                    </tr>
                                </thead>
                                <tbody id="DataResult"></tbody>
                            </table>
                        </div>
                    </div>
                </fieldset>
            </form>			
        </div>
    </div>
</div>

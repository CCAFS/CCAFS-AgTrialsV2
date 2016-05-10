<script>
    $(document).ready(function() {
        $('#id_crop').change(function() {
            var id_crop = $('#id_crop').attr('value');
            $('#InfoResult').html("");
            $('#DataResult').html("");
            $.ajax({
                type: "GET",
                url: "/variety/assigncrop/",
                data: "id_crop=" + id_crop,
                success: function(data) {
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
            success: function(data) {
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
<style type="text/css">
    .Title{
        font-weight: bold;
    }

    .table-fixed thead {
        width: 98.5%;
    }
    .table-fixed tbody {
        max-height: 370px;
        overflow-y: auto;
        width: 100%;
    }
    .table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
        display: block;
    }
    .table-fixed tbody td, .table-fixed thead > tr> th {
        float: left;
        border-bottom-width: 0;
    }

    .table-fixed tbody tr:after {
        content: ' ';
        display: block;
        visibility: hidden;
        clear: both;
    }
</style>
<div class="page-header">
    <h1 class="title-module">Check variety</h1>
</div>
<form class="form-horizontal" id="checkvariety" name="checkvariety" action="<?php echo url_for('@checkvariety'); ?>" enctype="multipart/form-data" method="post">
    <fieldset>
        <div class="form-group control-type-text">
            <label class="col-sm-1 control-label" style=" width: 80px; padding-left: 25px;">Crop</label>
            <div class="col-sm-3 control-type-text">
                <?php echo select_from_crop_variety("id_crop", null, "class='form-control'"); ?>
            </div>
            <div class="col-sm-8 control-type-text" style="margin-top: 13px;" id="Alphabet"></div>
        </div>
    </fieldset>
    <fieldset>
        <div class="col-sm-12 form-group control-type-text" style="padding-left: 25px;">
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
<script>
    $(document).ready(function () {
        $('#ModuleHelp').change(function () {
            var ModuleHelp = $('#ModuleHelp').val();
            $('#InfoResult').html("");
            $('#DataResult').html("");
            $.ajax({
                type: "GET",
                url: "/admin/LoadFieldsModule/",
                data: "ModuleHelp=" + ModuleHelp,
                success: function (data) {
                    $('#TableResult').html(data);
                }
            });
        });
    });

    function SaveFieldHelp(id) {
        var texthelp = $('#texthelp' + id).val();
        $.ajax({
            type: "GET",
            url: "/admin/SaveFieldsModule/",
            data: "id=" + id + "&texthelp=" + texthelp,
            success: function () {
                $('#Action' + id).html("Record updated!");
            }
        });

    }

    function ClearAction(id) {
        $('#Action' + id).html("");
    }

</script>
<link rel="stylesheet" type="text/css" media="screen" href="/css/prosessescheck.css"/>
<div class="row">
    <div class="col-md-2 left-column">
        <?php include_partial('admin/ModuleMenu') ?>
    </div>
    <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
        <span class="Title">Field help</span>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <form class="form-horizontal" id="fieldhelp" name="fieldhelp" action="<?php echo url_for('@fieldhelp'); ?>" enctype="multipart/form-data" method="post">
                <fieldset>
                    <div class="form-group control-type-text">
                        <div class="col-sm-1">Module:</div>
                        <div class="col-sm-3 control-type-text">
                            <select class="form-control" size="1" id="ModuleHelp" name="ModuleHelp">
                                <option value="">Choose...</option>
                                <option value="Trial" title="Trial">Trial</option>
                            </select>
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
                            </table>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
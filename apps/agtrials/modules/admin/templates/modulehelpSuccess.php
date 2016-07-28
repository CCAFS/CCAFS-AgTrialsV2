<?php
//$connection = Doctrine_Manager::getInstance()->connection();
//$HTML = "<thead id='HeadTableResult'>";
//$HTML .= "<tr>";
//$HTML .= "<th class='col-sm-3'>Module</th>";
//$HTML .= "<th class='col-sm-9'>Help text</th>";
//$HTML .= "</tr>";
//$HTML .= "</thead>";
//
//$QUERY00 = "SELECT  T.id_modulehelp,T.mdhlmodule,T.mdhltexthelp ";
//$QUERY00 .= "FROM tb_modulehelp T ";
//$QUERY00 .= "ORDER BY T.id_modulehelp ";
//$st = $connection->execute($QUERY00);
//$Results = $st->fetchAll(PDO::FETCH_ASSOC);
//$HTML .= "<tbody id='DataResult'>";
//foreach ($Results AS $Valor) {
//    $HTML .= "<tr>";
//    $HTML .= "<td class='col-sm-3'>{$Valor['mdhlmodule']}</td>";
//    $HTML .= "<td class='col-sm-9'><div><textarea rows='1' onfocus='ClearAction({$Valor['id_modulehelp']});' onchange='SaveModuleHelp({$Valor['id_modulehelp']});' cols='36' id='texthelp_{$Valor['id_modulehelp']}' class='form-control' type='text'>{$Valor['mdhltexthelp']}</textarea></div><div style='color: #2a9a60;' id='Action{$Valor['id_modulehelp']}'></div></td>";
//    $HTML .= "</tr>";
//}
//$HTML .= "</tbody>";
?>
<link rel="stylesheet" type="text/css" media="screen" href="/css/prosessescheck.css"/>
<script type="text/javascript" src="/tinymce/tinymce.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $('#ModuleHelp').change(function () {
            var ModuleHelp = $('#ModuleHelp').val();
            $('#DataResult').html("");
            $.ajax({
                type: "GET",
                url: "/admin/LoadHelpModule/",
                data: "ModuleHelp=" + ModuleHelp,
                success: function (data) {
                    $('#TableResult').html(data);
                    Loadtinymce();
                }
            });
        });
    });

    function Loadtinymce() {
        tinymce.init({
            selector: "textarea",
            auto_focus: 'texthelp_1',
            menubar: false,
            statusbar: false,
            plugins: ["advlist autolink lists link tabfocus"],
            toolbar: " bold italic underline strikethrough | bullist numlist | link",
            height: "100px",
            setup: function (textarea) {
                textarea.on('change', function () {
                    SaveModuleHelp(textarea.id, textarea.getContent());
                });
            }
        });
    }

    function SaveModuleHelp(idtexthelp, texthelp) {
        var Arrtexthelp = idtexthelp.split("_")
        var id = Arrtexthelp[1];
        var params = {texthelp: texthelp, id: id};
        $.ajax({
            type: "GET",
            url: "/admin/SaveModuleHelp/",
            data: params,
            success: function () {
                $('#Action' + id).html("Record updated!");
            }
        });
    }

    function ClearAction(id) {
        $('#Action' + id).html("");
    }

</script>

<div class="row">
    <div class="col-md-2 left-column">
        <?php include_partial('admin/ModuleMenu') ?>
    </div>
    <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
        <span class="Title">Module help</span>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <form class="form-horizontal" id="modulehelp" name="modulehelp" action="<?php echo url_for('@modulehelp'); ?>" enctype="multipart/form-data" method="post">
                <fieldset>
                    <div class="form-group control-type-text">
                        <div class="col-sm-1">Module:</div>
                        <div class="col-sm-3 control-type-text">
                            <select class="form-control" size="1" id="ModuleHelp" name="ModuleHelp">
                                <option value="">Choose...</option>
                                <option value="Trial" title="Trial">Trial</option>
                                <option value="Search Trials" title="Search Trials">Search Trials</option>
                                <option value="Batch Upload Trials" title="Batch Upload Trials">Batch Upload Trials</option>
                                <option value="Batch uploads" title="Batch uploads">Batch uploads</option>
                                <option value="Explore and verify - Trial Location" title="Explore and verify - Trial Location">Explore and verify - Trial Location</option>
                                <option value="Explore and verify - Variables measured" title="Explore and verify - Variables measured">Explore and verify - Variables measured</option>
                                <option value="Explore and verify - Variety" title="Explore and verify - Variety">Explore and verify - Variety</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="col-sm-12 form-group control-type-text">
                        <div class="panel panel-default">
                            <div id="InfoResult" class="panel-heading Title"></div>
                            <table class="table table-striped table-fixed table-hover" id="TableResult"><?php echo $HTML; ?></table>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
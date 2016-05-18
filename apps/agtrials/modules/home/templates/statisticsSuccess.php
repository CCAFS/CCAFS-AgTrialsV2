<link type="text/css" rel="stylesheet" href="/jqplot.1.0.6r1138/jquery.jqplot.min.css" />
<link type="text/css" rel="stylesheet" href="/jqplot.1.0.6r1138/examples.css" />


<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="../excanvas.js"></script><![endif]-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/jqplot.1.0.6r1138/examples.min.js"></script>

<script type="text/javascript" src="/jqplot.1.0.6r1138/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="/jqplot.1.0.6r1138/plugins/jqplot.barRenderer.min.js"></script>
<script type="text/javascript" src="/jqplot.1.0.6r1138/plugins/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="/jqplot.1.0.6r1138/plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script type="text/javascript" src="/jqplot.1.0.6r1138/plugins/jqplot.pointLabels.min.js"></script>

<script type="text/javascript" src="/jqplot.1.0.6r1138/syntaxhighlighter/scripts/shCore.min.js"></script>
<script type="text/javascript" src="/jqplot.1.0.6r1138/syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
<script type="text/javascript" src="/jqplot.1.0.6r1138/syntaxhighlighter/scripts/shBrushXml.min.js"></script>

<script type="text/javascript" src="/js/jqplot.js"></script>

<script class="code" type="text/javascript">

    $(document).ready(function () {
        $('#ByTechnology').click(function () {
            var Min = 0;
            var Max = 160;
            var Interval = 20;
            var Labels = [{label: 'A'}, {label: 'B'}, {label: 'C'}, {label: 'D'}, {label: 'E'}, {label: 'F'}, {label: 'G'}, {label: 'H'}, {label: 'I'}, {label: 'J'}];
            var Data = JSON.parse("[[108],[88],[78],[68],[88],[75],[90],[55],[95],[45]]");
            ByTechnology(Min, Max, Interval, Labels, Data);
            $('#TitleStatistics').html("Statistics by Crop");
        });

        $('#ByCountry').click(function () {
            var Min = 0;
            var Max = 160;
            var Interval = 20;
            var Labels = [{label: 'A'}, {label: 'B'}, {label: 'C'}, {label: 'D'}, {label: 'E'}, {label: 'F'}, {label: 'G'}, {label: 'H'}, {label: 'I'}, {label: 'J'}];
            var Data = JSON.parse("[[108],[88],[78],[68],[88],[75],[90],[55],[95],[45]]");
            ByTechnology(Min, Max, Interval, Labels, Data);
            $('#TitleStatistics').html("Statistics by Country");
        });

        $('#ByInstitution').click(function () {
            var Min = 0;
            var Max = 160;
            var Interval = 20;
            var Labels = [{label: 'A'}, {label: 'B'}, {label: 'C'}, {label: 'D'}, {label: 'E'}, {label: 'F'}, {label: 'G'}, {label: 'H'}, {label: 'I'}, {label: 'J'}];
            var Data = JSON.parse("[[108],[88],[78],[68],[88],[75],[90],[55],[95],[45]]");
            ByTechnology(Min, Max, Interval, Labels, Data);
            $('#TitleStatistics').html("Statistics by Institution");
        });

        $('#ByProject').click(function () {
            var Min = 0;
            var Max = 160;
            var Interval = 20;
            var Labels = [{label: 'A'}, {label: 'B'}, {label: 'C'}, {label: 'D'}, {label: 'E'}, {label: 'F'}, {label: 'G'}, {label: 'H'}, {label: 'I'}, {label: 'J'}];
            var Data = JSON.parse("[[108],[88],[78],[68],[88],[75],[90],[55],[95],[45]]");
            ByTechnology(Min, Max, Interval, Labels, Data);
            $('#TitleStatistics').html("Statistics by Project");
        });

        $('#ByTrialLocation').click(function () {
            var Min = 0;
            var Max = 160;
            var Interval = 20;
            var Labels = [{label: 'A'}, {label: 'B'}, {label: 'C'}, {label: 'D'}, {label: 'E'}, {label: 'F'}, {label: 'G'}, {label: 'H'}, {label: 'I'}, {label: 'J'}];
            var Data = JSON.parse("[[108],[88],[78],[68],[88],[75],[90],[55],[95],[45]]");
            ByTechnology(Min, Max, Interval, Labels, Data);
            $('#TitleStatistics').html("Statistics by Trial Location");
        });
    });

</script>

<div class="row">
    <div class="col-md-2 left-column">
        <?php include_partial('admin/StatisticsMenu') ?>
    </div>
    <div class="col-md-9 sf_admin_form" style="margin-top: 13px; width: 930px;">
        <span id="TitleStatistics" class="Title">Statistics</span>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <div id="chart" style="margin-top:20px; margin-left:20px; width:700px; height:400px;"></div>
        </div>
    </div>
</div>
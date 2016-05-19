<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript"  src="//d3js.org/d3.v3.min.js"></script>
<script type="text/javascript"  src="/js/d3jsChart.js"></script>
<script>
    $(document).ready(function () {
        $('#ByTechnology').click(function () {
            $('#TitleStatistics').html("");
            $('#TitleStatistics').html("Statistics by Crop");
            $('#chart').html("");
            ByTechnology();
        });

        $('#ByCountry').click(function () {
            $('#TitleStatistics').html("");
            $('#TitleStatistics').html("Statistics by Country");
            $('#chart').html("");
            ByCountry();
        });

        $('#ByInstitution').click(function () {
            $('#TitleStatistics').html("");
            $('#TitleStatistics').html("Statistics by Institution");
            $('#chart').html("");
            ByInstitution();
        });

        $('#ByProject').click(function () {
            $('#TitleStatistics').html("");
            $('#TitleStatistics').html("Statistics by Project");
            $('#chart').html("");
            ByProject();
        });

        $('#ByTrialLocation').click(function () {
            $('#TitleStatistics').html("");
            $('#TitleStatistics').html("Statistics by Trial Location");
            $('#chart').html("");
            ByTrialLocation();
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
            <div id="chart"></div>
        </div>
    </div>
</div>
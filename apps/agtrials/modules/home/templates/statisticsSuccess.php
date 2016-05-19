<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript"  src="//d3js.org/d3.v3.min.js"></script>
<script type="text/javascript"  src="/js/d3jsChart.js"></script>
<script>
    $(document).ready(function () {
        $('#ByTechnology').click(function () {
            ByTechnology();
            $('#TitleStatistics').html("Statistics by Crop");
        });

        $('#ByCountry').click(function () {
            ByCountry();
            $('#TitleStatistics').html("Statistics by Country");
        });

        $('#ByInstitution').click(function () {
            ByInstitution();
            $('#TitleStatistics').html("Statistics by Institution");
        });

        $('#ByProject').click(function () {
            ByProject();
            $('#TitleStatistics').html("Statistics by Project");
        });

        $('#ByTrialLocation').click(function () {
            ByTrialLocation();
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
            <div id="chart"></div>
        </div>
    </div>
</div>
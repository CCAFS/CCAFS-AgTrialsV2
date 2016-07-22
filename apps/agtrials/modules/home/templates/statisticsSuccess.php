<script type="text/javascript"  src="http://d3js.org/d3.v3.min.js"></script>
<script type="text/javascript"  src="/js/d3jsChart.js"></script>
<script>
    $(document).ready(function () {
        $('#ByTechnology').click(function () {
            $('#TitleStatistics').html("");
            $('#TitleStatistics').html("Statistics by Crop");
            SelectOption('#ByTechnology');
            $('#chart').html("");
            $('#div_loading').show();
            ByTechnology();
        });

        $('#ByCountry').click(function () {
            $('#TitleStatistics').html("");
            $('#TitleStatistics').html("Statistics by Country");
            SelectOption('#ByCountry');
            $('#chart').html("");
            $('#div_loading').show();
            ByCountry();
        });

        $('#ByInstitution').click(function () {
            $('#TitleStatistics').html("");
            $('#TitleStatistics').html("Statistics by Institution");
            SelectOption('#ByInstitution');
            $('#chart').html("");
            $('#div_loading').show();
            ByInstitution();
        });

        $('#ByProject').click(function () {
            $('#TitleStatistics').html("");
            $('#TitleStatistics').html("Statistics by Project");
            SelectOption('#ByProject');
            $('#chart').html("");
            $('#div_loading').show();
            ByProject();
        });

        $('#ByTrialLocation').click(function () {
            $('#TitleStatistics').html("");
            $('#TitleStatistics').html("Statistics by Trial Location");
            SelectOption('#ByTrialLocation');
            $('#chart').html("");
            $('#div_loading').show();
            ByTrialLocation();
        });
    });

    window.onload = load;
    function load() {
        ByTechnology();
        SelectOption('#ByTechnology');
    }

    function SelectOption(IdSelected) {
        $("#DivStatisticsMenu div").each(function ()
        {
            $(this).removeClass('selected');
        })
        $(IdSelected).addClass("selected");
    }



</script>
<div class="row" onload="ByTechnology();">
    <div class="col-md-2 left-column">
        <?php include_partial('admin/StatisticsMenu') ?>
    </div>
    <div class="col-md-9 sf_admin_form" style="margin-top: 13px; width: 950px;">
        <span id="TitleStatistics" class="Title">Statistics</span>
        <div id="div_loading" class="loading" align="center" style="display:none;">
            <?php echo image_tag('loading.gif'); ?>
            <br>Loading chart...
        </div>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <div id="chart"></div>
        </div>
    </div>
</div>
<script type="text/javascript"  src="http://d3js.org/d3.v3.min.js"></script>
<script type="text/javascript"  src="/js/d3jsChart.js"></script>
<script>
    $(document).ready(function () {
        $('#ByTechnology').click(function () {
            $('#TitleStatistics').html("");
            $('#TitleStatistics').html("Statistics by Crop");
            $('#chart').html("");
            $('#div_loading').show();
            ByTechnology();
            SelectOption('#ByTechnology');
        });

        $('#ByCountry').click(function () {
            $('#TitleStatistics').html("");
            $('#TitleStatistics').html("Statistics by Country");
            $('#chart').html("");
            $('#div_loading').show();
            ByCountry();
            SelectOption('#ByCountry');
        });

        $('#ByInstitution').click(function () {
            $('#TitleStatistics').html("");
            $('#TitleStatistics').html("Statistics by Institution");
            $('#chart').html("");
            $('#div_loading').show();
            ByInstitution();
            SelectOption('#ByInstitution');
        });

        $('#ByProject').click(function () {
            $('#TitleStatistics').html("");
            $('#TitleStatistics').html("Statistics by Project");
            $('#chart').html("");
            $('#div_loading').show();
            ByProject();
            SelectOption('#ByProject');
        });

        $('#ByTrialLocation').click(function () {
            $('#TitleStatistics').html("");
            $('#TitleStatistics').html("Statistics by Trial Location");
            $('#chart').html("");
            $('#div_loading').show();
            ByTrialLocation();
            SelectOption('#ByTrialLocation');
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
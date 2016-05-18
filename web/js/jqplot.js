function ByTechnology(Min, Max, Interval, Labels, Data) {
    $.jqplot.config.enablePlugins = true;
    plot2 = $.jqplot('chart', Data, {
        animate: true,
        seriesDefaults: {
            renderer: $.jqplot.BarRenderer,
            rendererOptions: {
                barWidth: 30,
                barPadding: 2,
                shadow: false,
                barDirection: 'horizontal',
            },
            pointLabels: {
                show: true,
            }
        },
        series: Labels,
        grid: {
            backgroundColor: "#FFFFFF",
            gridLineColor: '#000000',
            drawBorder: false,
            shadow: false,
            gridLineWidth: 0.5
        },
        legend: {
            renderer: $.jqplot.EnhancedLegendRenderer,
            show: true,
            placement: 'outsideGrid',
            shrinkGrid: true,
            rendererOptions: {
                numberRows: 1
            }
        },
        axes: {
            xaxis: {
                min: Min,
                max: Max,
                tickInterval: Interval,
                renderer: $.jqplot.CanvasAxisTickRenderer,
                rendererOptions: {tickRenderer: $.jqplot.CanvasAxisTickRenderer},
                tickOptions: {
                    textColor: "#000000",
                    showGridline: true,
                    formatString: "%d"
                }
            },
            yaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
                tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                ticks: ['Crops'],
                tickOptions: {
                    textColor: "#000000",
                    showGridline: true
                },
            }
        }
    });
}
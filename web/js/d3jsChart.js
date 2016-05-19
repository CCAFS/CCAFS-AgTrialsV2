function ByTechnology() {
    d3.json("/admin/ByTechnology", function (info) {
        var Max = 400000;
        var Interval = 8000;

        var label = info.label
        var data = info.data
        var colors = ['#0000b4', '#0082ca', '#0094ff', '#0d4bcf', '#0066AE', '#074285', '#00187B', '#285964', '#405F83', '#416545', '#4D7069', '#6E9985', '#7EBC89', '#0283AF', '#79BCBF', '#99C19E'];
//                console.log(label);
//                console.log(data);

        var grid = d3.range(25).map(function (i) {
            return {'x1': 0, 'y1': 0, 'x2': 0, 'y2': 470};
        });

        var tickVals = grid.map(function (d, i) {
            if (i > 0) {
                return i * Interval;
            } else if (i === 0) {
                return "100";
            }
        });

        var xscale = d3.scale.linear().domain([0, Max]).range([0, Interval]);
        var yscale = d3.scale.linear().domain([0, label.length]).range([0, 480]);
        var colorScale = d3.scale.quantize().domain([0, label.length]).range(colors);
        var canvas = d3.select('#chart').append('svg').attr({'width': 850, 'height': 500});

        var grids = canvas.append('g')
                .attr('id', 'grid')
                .attr('transform', 'translate(150,10)')
                .selectAll('line')
                .data(grid)
                .enter()
                .append('line')
                .attr({'x1': function (d, i) {
                        return i * 30;
                    },
                    'y1': function (d) {
                        return d.y1;
                    },
                    'x2': function (d, i) {
                        return i * 30;
                    },
                    'y2': function (d) {
                        return d.y2;
                    },
                })
                .style({'stroke': '#adadad', 'stroke-width': '1px'});

        var xAxis = d3.svg.axis();
        xAxis
                .orient('bottom')
                .scale(xscale)
                .tickValues(tickVals);

        var yAxis = d3.svg.axis();
        yAxis
                .orient('left')
                .scale(yscale)
                .tickSize(2)
                .tickFormat(function (d, i) {
                    return label[i];
                })
                .tickValues(d3.range(17));

        var y_xis = canvas.append('g')
                .attr("transform", "translate(150,0)")
                .attr('id', 'yaxis')
                .call(yAxis);

        var x_xis = canvas.append('g')
                .attr("transform", "translate(148,480)")
                .attr('id', 'xaxis')
                .call(xAxis);

        var chart = canvas.append('g')
                .attr("transform", "translate(150,5)")
                .attr('id', 'bars')
                .selectAll('rect')
                .data(data)
                .enter()
                .append('rect')
                .attr('height', 40)
                .attr({'x': 0, 'y': function (d, i) {
                        return yscale(i) + 19;
                    }})
                .style('fill', function (d, i) {
                    return colorScale(i);
                })
                .attr('width', function (d) {
                    return 0;
                });


        var transit = d3.select("svg").selectAll("rect")
                .data(data)
                .transition()
                .duration(1000)
                .attr("width", function (d) {
                    return xscale(d);
                });

        var transitext = d3.select('#bars')
                .selectAll('text')
                .data(data)
                .enter()
                .append('text')
                .attr({'x': function (d) {
                        return xscale(d) - 0;
                    }, 'y': function (d, i) {
                        return yscale(i) + 45;
                    }})
                .text(function (d) {
                    return d;
                }).style({'fill': '#333', 'font-size': '13px'});

    });
}
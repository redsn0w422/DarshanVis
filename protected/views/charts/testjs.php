
<script type="text/javascript">
    $(function() {
        $('#chart-container').highcharts({
            chart: {
                type: 'line',
                // zoomType: 'xy'
            },
            title: {
                text: '<?php echo $chart["title"] ?>',
                x: -20 //center
            },
            subtitle: {
                text: '<?php echo $chart["subtitle"] ?>',
                x: -20
            },
            xAxis: {
                title: {
                    enabled: true,
                    text: '<?php echo $chart["xAxis"]["title"] ?>'
                },
                categories: [<?php echo $cat_str; ?>]

            },
            yAxis: {
                title: {
                    text: '<?php echo $chart["yAxis"]["title"] ?>'
                },
                type: '<?php echo $chart["yAxis"]["type"] ?>',
                plotLines: [{
                        value: 0,
                        width: 5,
                        color: '#808080'
                    }],
                min: 0
            },
            tooltip: {
                valueSuffix: ''
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0,
                enabled: false 
            },
            series: [{
                    name: '<?php echo $chart["series"][0]["name"]; ?>',
                    data: [<?php echo $series_str ?>]
                }]
        });
    });
</script>
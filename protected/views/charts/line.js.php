<?php
$data = Jobs::execSQLQuery($chart["series"][0]["query"]);

$cat_str = "";
$series_str = "";
$index = 1;
foreach ($data as $d) {
    $cat_str .= '\'' . $index . '\'' . ',';
    $series_str .= $d[$chart["series"][0]["attribute"]] . ',';
    $index++;
}
$cat_str = rtrim($cat_str, ",");
$series_str = rtrim($series_str, ",");
?>

<script type="text/javascript">
$(function(){
    $("#chart-container").highcharts({
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
            // minorTickInterval: 100
            // you'd have to add a type pass through
            // to the rest of the pages that use line charts
            plotLines: [{
                        value: 0,
                        width: 5,
                        color: '#808080'
            }]
            // min: 0 <- breaks the chart
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

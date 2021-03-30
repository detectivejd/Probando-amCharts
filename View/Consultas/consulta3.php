<style>
    details > summary {
        padding: 4px;
        width: 200px;
        background-color: #eeeeee;
        border: none;
        box-shadow: 1px 1px 2px #bbbbbb;
        cursor: pointer;
    }
</style>
<details>
    <summary>1. Gráfico de radar</summary>
    <div id="chartdiv1" style="width: 100%; height: 400px;"></div>
</details>
<details>
    <summary>2. Gráfico de líneas suavizadas</summary>
    <div id="chartdiv3" style="width: 100%; height: 400px;"></div>
</details>
<script>
    var chart = am4core.create("chartdiv1", am4charts.RadarChart);
    chart.data = [
        <?php 
            foreach($consulta3 as $dato){
                echo '{"grado": "'.$dato[0].'", "cantidad_de_asignaturas":'.$dato[1].'},';
            }
        ?>
    ];
    /* Create axes */
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "grado";
    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    /* Create and configure series */
    var series = chart.series.push(new am4charts.RadarSeries());
    series.dataFields.valueY = "cantidad_de_asignaturas";
    series.dataFields.categoryX = "grado";
    series.name = "Asignaturas";
    series.strokeWidth = 3;
    /*------------------- gráfico 2 ---------------------*/
    am4core.ready(function() {
        am4core.useTheme(am4themes_animated);
        // Themes end
        var chart = am4core.create("chartdiv3", am4charts.XYChart);
        chart.data = [
            <?php 
                foreach($consulta3 as $dato){
                    echo '{"grado": "'.$dato[0].'", "cantidad_de_asignaturas":'.$dato[1].'},';
                }
            ?>
        ];
        // Create axes
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "grado";
        categoryAxis.renderer.minGridDistance = 50;
        categoryAxis.renderer.grid.template.location = 0.5;
        categoryAxis.startLocation = 0.5;
        categoryAxis.endLocation = 0.5;
        // Create value axis
        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.baseValue = 0;
        // Create series
        var series = chart.series.push(new am4charts.LineSeries());
        series.dataFields.valueY = "cantidad_de_asignaturas";
        series.dataFields.categoryX = "grado";
        series.strokeWidth = 2;
        series.tensionX = 0.77;
        // bullet is added because we add tooltip to a bullet for it to change color
        var bullet = series.bullets.push(new am4charts.Bullet());
        bullet.tooltipText = "{valueY}";
        bullet.adapter.add("fill", function(fill, target){
            if(target.dataItem.valueY < 0){
                return am4core.color("#FF0000");
            }
            return fill;
        })
        var range = valueAxis.createSeriesRange(series);
        range.value = 0;
        range.endValue = -1000;
        range.contents.stroke = am4core.color("#FF0000");
        range.contents.fill = range.contents.stroke;
        // Add scrollbar
        var scrollbarX = new am4charts.XYChartScrollbar();
        scrollbarX.series.push(series);
        chart.scrollbarX = scrollbarX;
        chart.cursor = new am4charts.XYCursor();
    });
</script>
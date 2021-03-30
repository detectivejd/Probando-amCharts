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
    <summary>1. Gráfica de barra básica</summary>
    <div id="chartdiv1" style="width: 100%; height: 400px;"></div>
</details>
<details>
    <summary>2. Usar viñetas de etiquetas en un gráfico de barras horizontales</summary>
    <div id="chartdiv2" style="width: 100%; height: 400px;"></div>
</details>
<details>
    <summary>3. Características adicionales del eje</summary>
    <div id="chartdiv3" style="width: 100%; height: 400px;"></div>
</details>
<details>
    <summary>4. Serie de columnas curvas Dominando la serie de líneas escalonadas</summary>
    <div id="chartdiv4" style="width: 100%; height: 400px;"></div>
</details>
<details>
    <summary>5. Gráfico de cilindros 3D</summary>
    <div id="chartdiv5" style="width: 100%; height: 400px;"></div>
</details>
<details>
    <summary>6. Gráfico de columnas 3D</summary>
    <div id="chartdiv6" style="width: 100%; height: 400px;"></div>
</details>
<script>
    am4core.useTheme(am4themes_animated);
    var chart = am4core.create("chartdiv1", am4charts.XYChart);
    chart.data = [
        <?php 
            foreach($consulta2 as $dato){
                echo '{"departamento": "'.$dato[0].'", "cantidad_de_profesores":'.$dato[1].'},';
            }
        ?>
    ];
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "departamento";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.minGridDistance = 30;
    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    // Create series
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueY = "cantidad_de_profesores";
    series.dataFields.categoryX = "departamento";
    /*------------------- gráfico 2 ---------------------*/
    am4core.useTheme(am4themes_animated);
    chart = am4core.create("chartdiv2", am4charts.XYChart);
    chart.hiddenState.properties.opacity = 0;
    // this creates initial fade-in
    chart.data = [
        <?php 
            foreach($consulta2 as $dato){
                echo '{"departamento": "'.$dato[0].'", "cantidad_de_profesores":'.$dato[1].'},';
            }
        ?>
    ];
    var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "departamento";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.labels.template.disabled = true;
    var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
    valueAxis.min = 0;
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueX = "cantidad_de_profesores";
    series.dataFields.categoryY = "departamento";
    var valueLabel = series.bullets.push(new am4charts.LabelBullet());
    valueLabel.label.text = "{cantidad_de_profesores}";
    valueLabel.label.fontSize = 25;
    valueLabel.label.horizontalCenter = "left";
    valueLabel.label.dx = 10;
    var categoryLabel = series.bullets.push(new am4charts.LabelBullet());
    categoryLabel.label.text = "{departamento}";
    categoryLabel.label.fontSize = 20;
    categoryLabel.label.horizontalCenter = "right";
    categoryLabel.label.dx = -10;
    categoryLabel.label.fill = am4core.color("#fff");
    chart.maskBullets = false;
    chart.paddingRight = 30;
    /*------------------- gráfico 3 ---------------------*/
    var chart = am4core.create("chartdiv3", am4charts.XYChart);
    chart.data = [
        <?php 
            foreach($consulta2 as $dato){
                echo '{"departamento": "'.$dato[0].'", "cantidad_de_profesores":'.$dato[1].'},';
            }
        ?>
    ];
    // Create axes
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "departamento";
    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    // Create series
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueY = "cantidad_de_profesores";
    series.dataFields.categoryX = "departamento";
    series.name = "Sales";
    // Create value axis break
    var axisBreak = valueAxis.axisBreaks.create();
    axisBreak.startValue = 1;
    axisBreak.endValue = 2.5;
    axisBreak.breakSize = 0.05;
    // Add axis break events
    axisBreak.events.on("over", () => {
        axisBreak.animate(
            [{ property: "breakSize", to: 1 }, { property: "opacity", to: 0.1 }],
            1,
            am4core.ease.sinOut
        );
    });
    axisBreak.events.on("out", () => {
        axisBreak.animate(
            [{ property: "breakSize", to: 0.05 }, { property: "opacity", to: 1 }],
            1,
            am4core.ease.quadOut
        );
    });
    /*------------------- gráfico 4 ---------------------*/
    var chart = am4core.create("chartdiv4", am4charts.XYChart);
    chart.data = [
        <?php 
            foreach($consulta2 as $dato){
                echo '{"departamento": "'.$dato[0].'", "cantidad_de_profesores":'.$dato[1].'},';
            }
        ?>
    ];
    // Create axes
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "departamento";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.minGridDistance = 30;
    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    // Create series
    var series = chart.series.push(new am4charts.StepLineSeries());
    series.dataFields.valueY = "cantidad_de_profesores";
    series.dataFields.categoryX = "departamento";
    series.strokeWidth = 3;
    var bullet = series.bullets.push(new am4charts.CircleBullet());
    bullet.fill = am4core.color("white");
    bullet.strokeWidth = 3;
    /*------------------- gráfico 5 ---------------------*/
    var chart = am4core.create("chartdiv5", am4charts.XYChart3D);
    chart.paddingBottom = 30;
    chart.angle = 35;
    chart.data = [
        <?php 
            foreach($consulta2 as $dato){
                echo '{"departamento": "'.$dato[0].'", "cantidad_de_profesores":'.$dato[1].'},';
            }
        ?>
    ];
    // Create axes
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "departamento";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.minGridDistance = 20;
    categoryAxis.renderer.inside = true;
    categoryAxis.renderer.grid.template.disabled = true;
    let labelTemplate = categoryAxis.renderer.labels.template;
    labelTemplate.rotation = -90;
    labelTemplate.horizontalCenter = "left";
    labelTemplate.verticalCenter = "middle";
    labelTemplate.dy = 10; // moves it a bit down;
    labelTemplate.inside = false; // this is done to avoid settings which are not suitable when label is rotated
    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.renderer.grid.template.disabled = true;
    // Create series
    var series = chart.series.push(new am4charts.ConeSeries());
    series.dataFields.valueY = "cantidad_de_profesores";
    series.dataFields.categoryX = "departamento";
    var columnTemplate = series.columns.template;
    columnTemplate.adapter.add("fill", function(fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
    })
    columnTemplate.adapter.add("stroke", function(stroke, target) {
        return chart.colors.getIndex(target.dataItem.index);
    })
    /*------------------- gráfico 6 ---------------------*/
    am4core.ready(function() {
        var chart = am4core.create("chartdiv6", am4charts.XYChart3D);
        chart.data = [
            <?php 
                foreach($consulta2 as $dato){
                    echo '{"departamento": "'.$dato[0].'", "cantidad_de_profesores":'.$dato[1].'},';
                }
            ?>
        ];
        // Create axes
        let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "departamento";
        categoryAxis.renderer.labels.template.rotation = 270;
        categoryAxis.renderer.labels.template.hideOversized = false;
        categoryAxis.renderer.minGridDistance = 20;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.verticalCenter = "middle";
        categoryAxis.tooltip.label.rotation = 270;
        categoryAxis.tooltip.label.horizontalCenter = "right";
        categoryAxis.tooltip.label.verticalCenter = "middle";
        let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.title.text = "Departamentos";
        valueAxis.title.fontWeight = "bold";
        // Create series
        var series = chart.series.push(new am4charts.ColumnSeries3D());
        series.dataFields.valueY = "cantidad_de_profesores";
        series.dataFields.categoryX = "departamento";
        series.name = "Cantidad de profesores";
        series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
        series.columns.template.fillOpacity = .8;
        var columnTemplate = series.columns.template;
        columnTemplate.strokeWidth = 2;
        columnTemplate.strokeOpacity = 1;
        columnTemplate.stroke = am4core.color("#FFFFFF");
        columnTemplate.adapter.add("fill", function(fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        })
        columnTemplate.adapter.add("stroke", function(stroke, target) {
            return chart.colors.getIndex(target.dataItem.index);
        })
        chart.cursor = new am4charts.XYCursor();
        chart.cursor.lineX.strokeOpacity = 0;
        chart.cursor.lineY.strokeOpacity = 0; 
    });
</script>
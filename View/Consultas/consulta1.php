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
    <summary>1. Gráfica básica</summary>
    <div id="chartdiv1" style="width: 100%; height: 400px;"></div>
</details>
<details>
    <summary>2. Configurando apariencia</summary>
    <div id="chartdiv2" style="width: 100%; height: 400px;"></div>
</details>
<details>
    <summary>3. Desabilitando varios elementos</summary>
    <div id="chartdiv3" style="width: 100%; height: 400px;"></div>
</details>
<details>
    <summary>4. Controlar la apariencia a través de estados</summary>
    <div id="chartdiv4" style="width: 100%; height: 400px;"></div>
</details>
<details>
    <summary>5. Gráficos Circular 3D</summary>
    <div id="chartdiv5" style="width: 100%; height: 400px;"></div>
</details>
<details>
    <summary>6. Gráfico circular con esquinas redondeadas</summary>
    <div id="chartdiv6" style="width: 100%; height: 400px;"></div>
</details>
<script>
    /*------------------- gráfico 1 -------------------*/
    // Create chart instance
    // Set theme
    var chart = am4core.create("chartdiv1", am4charts.PieChart);
    // Add data
    chart.data = [
        <?php 
            foreach($consulta1 as $dato){
                echo '{"asignatura": "'.$dato[0].'", "cantidad":'.$dato[1].'},';
            }
        ?>
    ];
    // Add and configure Series
    var pieSeries = chart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "cantidad";
    pieSeries.dataFields.category = "asignatura";
    /*------------------- gráfico 2 -------------------*/
    chart = am4core.create("chartdiv2", am4charts.PieChart);
    chart.data = [
        <?php 
            foreach($consulta1 as $dato){
                echo '{"asignatura": "'.$dato[0].'", "cantidad":'.$dato[1].'},';
            }
        ?>
    ];
    // Add and configure Series
    var pieSeries = chart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "cantidad";
    pieSeries.dataFields.category = "asignatura";
    // Let's cut a hole in our Pie chart the size of 40% the radius
    chart.innerRadius = am4core.percent(40);
    // Put a thick white border around each Slice
    pieSeries.slices.template.stroke = am4core.color("#4a2abb");
    pieSeries.slices.template.strokeWidth = 2;
    pieSeries.slices.template.strokeOpacity = 1;
    // Add a legend
    chart.legend = new am4charts.Legend();
    /*------------------- gráfico 3 -------------------*/
    chart = am4core.create("chartdiv3", am4charts.PieChart);
    chart.data = [
        <?php 
            foreach($consulta1 as $dato){
                echo '{"asignatura": "'.$dato[0].'", "cantidad":'.$dato[1].'},';
            }
        ?>
    ];
    // Add and configure Series
    var pieSeries = chart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "cantidad";
    pieSeries.dataFields.category = "asignatura";
    // Let's cut a hole in our Pie chart the size of 40% the radius
    chart.innerRadius = am4core.percent(40);
    // Disable ticks and labels
    pieSeries.labels.template.disabled = true;
    pieSeries.ticks.template.disabled = true;
    // Disable tooltips
    pieSeries.slices.template.tooltipText = "";
    // Add a legend
    chart.legend = new am4charts.Legend();
    /*------------------- gráfico 4 -------------------*/
    chart = am4core.create("chartdiv4", am4charts.PieChart);
    chart.data = [
        <?php 
            foreach($consulta1 as $dato){
                echo '{"asignatura": "'.$dato[0].'", "cantidad":'.$dato[1].'},';
            }
        ?>
    ];
    // Add and configure Series
    var pieSeries = chart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "cantidad";
    pieSeries.dataFields.category = "asignatura";
    // Let's cut a hole in our Pie chart the size of 40% the radius
    chart.innerRadius = am4core.percent(40);
    // Set up fills
    pieSeries.slices.template.fillOpacity = 1;
    var hs = pieSeries.slices.template.states.getKey("hover");
    hs.properties.scale = 1;
    hs.properties.fillOpacity = 0.5;
    /*------------------- gráfico 5 -------------------*/
    // Set theme
    am4core.useTheme(am4themes_animated);
    chart = am4core.create("chartdiv5", am4charts.PieChart3D);
    // Let's cut a hole in our Pie chart the size of 40% the radius
    chart.innerRadius = am4core.percent(40);
    chart.data = [
        <?php 
            foreach($consulta1 as $dato){
                echo '{"asignatura": "'.$dato[0].'", "cantidad":'.$dato[1].'},';
            }
        ?>
    ];
    // Add and configure Series
    var pieSeries = chart.series.push(new am4charts.PieSeries3D());
    pieSeries.dataFields.value = "cantidad";
    pieSeries.dataFields.category = "asignatura";
    pieSeries.slices.template.stroke = am4core.color("#fff");
    pieSeries.slices.template.strokeWidth = 2;
    pieSeries.slices.template.strokeOpacity = 1;
    // Disabling labels and ticks on inner circle
    pieSeries.labels.template.disabled = true;
    pieSeries.ticks.template.disabled = true;
    // Disable sliding out of slices
    pieSeries.slices.template.states.getKey("hover").properties.shiftRadius = 0;
    pieSeries.slices.template.states.getKey("hover").properties.scale = 1.1;
    /*------------------- gráfico 6 -------------------*/
    am4core.useTheme(am4themes_animated);
    chart = am4core.create("chartdiv6", am4charts.PieChart);
    chart.hiddenState.properties.opacity = 0;
    // this creates initial fade-in
    chart.data = [
        <?php 
            foreach($consulta1 as $dato){
                echo '{"asignatura": "'.$dato[0].'", "cantidad":'.$dato[1].'},';
            }
        ?>
    ];
    chart.radius = am4core.percent(70);
    chart.innerRadius = am4core.percent(40);
    chart.startAngle = 180;
    chart.endAngle = 360;  
    var series = chart.series.push(new am4charts.PieSeries());
    series.dataFields.value = "cantidad";
    series.dataFields.category = "asignatura";
    series.slices.template.cornerRadius = 10;
    series.slices.template.innerCornerRadius = 7;
    series.slices.template.draggable = true;
    series.slices.template.inert = true;
    series.hiddenState.properties.startAngle = 90;
    series.hiddenState.properties.endAngle = 90;
    chart.legend = new am4charts.Legend();
</script>
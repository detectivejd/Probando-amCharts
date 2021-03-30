<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Probando librería AMChart</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
        <link href="Public/css/all.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="Public/js/all.js" type="text/javascript"></script>
        <!-- librerías necesarias para usar amCharts -->
        <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/lang/de_DE.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/geodata/germanyLow.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/fonts/notosans-sc.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-inverse">
                    <a class="navbar-brand" href="index.php?c=main&a=index">
                        <b>AM</b>CHARTS
                    </a>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-th-list"></span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="index.php?c=consultas&a=consulta1" style="margin-left: 5px;">
                                    Gráficas Circulares
                                </a>
                                <a class="dropdown-item" href="index.php?c=consultas&a=consulta2" style="margin-left: 5px;">
                                    Gráficos XY
                                </a>
                                <br />
                                <a class="dropdown-item" href="index.php?c=consultas&a=consulta3" style="margin-left: 5px;">
                                    Gráficos Lineales
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>                   
        </header>
        <section>
            <?php  
                if (\App\Session::get('msg')!=null) {  
                    echo \App\Session::get('msg')."<br /><br />"; 
                    \App\Session::set('msg', "");                     
                } 
                echo $content;
            ?>
        </section>                            
    </body>
</html>
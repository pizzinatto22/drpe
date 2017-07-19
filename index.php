<?php
spl_autoload_register(function ($class_name) {
    $class_name = strtolower(str_replace('\\', DIRECTORY_SEPARATOR, $class_name));
    include $class_name . '.class.php';
});

$book = new Book\Parser("livro3.xml", 1);


//echo "<pre>";
//var_dump($book->indexMaker);
//echo "</pre>";
//
//exit;

$html = $book->all();
?>

<html>

    <head>        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?= $book->title()?></title>
        <link rel="stylesheet" type="text/css" href="normalize.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="book.js"></script>
        <script src="jquery.touchwipe.1.1.1.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script>
            
            google.charts.load('current', {packages: ['corechart','line', 'bar']});
            google.charts.setOnLoadCallback(carregaGraficos);
            
            function carregaGraficos() {
                grafico1();
                grafico2();
            }
            

            function grafico1() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Meses');
                data.addColumn('number', 'Abatedouro');
                data.addColumn('number', 'Lavoura');
                data.addColumn('number', 'Derivados da cana de açúcar');

                data.addRows([
                  ['Jul', 15, 15, 5],
                  ['Ago', 15, 25, 7],
                  ['Set', 15, 25, 15],
                  ['Out', 15, 20, 20],
                  ['Nov', 15, 25, 22.5],
                  ['Dez', 25, 20, 15],
                  ['Jan', 20, 17.5, 0],
                  ['Fev', 17.5, 20, 0],
                  ['Mar', 20, 25, 3.5],
                  ['Abr', 12, 17.5, 3.5],
                  ['Mai', 12, 20, 3.5],
                  ['Jun', 15, 12, 3.5]
                ]);

                var options = {
                    hAxis: {
                        title: 'Meses',
                        slantedText: true, 
                        slantedTextAngle: 30 // here you can even use 180 
                    },

                    vAxis: {
                        title: 'Intensidade relativa de trabalho',
                        viewWindow: {
                            max: 30,
                            min: 0,
                        },
                        gridlines: {
                            count: 7,
                        }
                    },
                    series: {
                        1: {curveType: 'none'},
                        2: {curveType: 'none'},
                        3: {curveType: 'none'}
                    },
                    width: 800,
                    height: 600,
                    chartArea: {width: "50%", height: "70%" },
                    //legend: {position: 'top', maxlines: 4}
                };

                var chart = new google.visualization.LineChart(document.getElementById('grafico1'));
                chart.draw(data, options);
            }
                
            function grafico2() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Meses');
                data.addColumn('number', 'Ouro');
                data.addColumn('number', 'Peixe');

                data.addRows([
                    ['Mar', 30, 15],
                    ['Abr', 30, 15],
                    ['Mai', 30, 15],
                    ['Jun', 30, 15],
                    ['Jul', 30, 15],
                    ['Ago', 30, 15],
                    ['Set', 30, 15],
                    ['Out', 30, 15],
                    ['Nov', 0, 0],
                    ['Dez', 0, 0],
                    ['Jan', 0, 0],
                    ['Fev', 0, 0],

                ]);

                var options = {
                    hAxis: {
                        title: 'Meses',
                        slantedText: true, 
                        slantedTextAngle: 30 // here you can even use 180 
                    },

                    vAxis: {
                        title: 'homens/dia',
                        viewWindow: {
                            max: 30,
                            min: 0,
                        },
                        gridlines: {
                            count: 7,
                        }
                    },
                    
                    width: 800,
                    height: 600,
                    chartArea: {width: "50%", height: "70%" },
                    //legend: {position: 'top', maxlines: 4}
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('grafico2'));
                chart.draw(data, options);
            }
        </script>
        
    </head>

    <body>
        <div class="menu">
            <div class="menu-item">
                <span class="menu-link" onclick="changeFontSize(+5)">+</span>
            </div>
            <div class="menu-item">
                <span class="menu-link" onclick="changeFontSize(-5)">-</span>
            </div>
            <div class="menu-item">
                <span class="menu-link" onclick="changePage(-1)">&lt;</span>
            </div>
            <div class="menu-item">
                <span class="menu-link" onclick="changePage(+1)">&gt;</span>
            </div>
            <div class="menu-item">
                <span class="menu-link" onclick="openPopup('<?= $book->indexMaker->id ?>')">...</span>
            </div>
            <div class="menu-item">
                <span class="menu-link" onclick="switchContinuousView()" id="continuous_button">|||</span>
            </div>

        </div>
        <div class='pagina_container' id='pagina'>
            <?= $html ?>
        </div>
    </body>
</html>
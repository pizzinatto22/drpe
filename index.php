<?php
header("Content-Type:text/html; charset=UTF-8");
spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
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
        <link rel="stylesheet" type="text/css" href="gallery.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="book.js"></script>
        <script src="accordion.js"></script>
        <script src="pan.js"></script>
        <script src="gallery.js"></script>
        <script src="jquery.touchwipe.1.1.1.js"></script>
        <script src="Chart.min.js"></script>
        <script src="chart.js"></script>        
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-103807108-1', 'auto');
          ga('send', 'pageview');

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
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
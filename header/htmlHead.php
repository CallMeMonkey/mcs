<head>
    <?php
    if ($_SERVER['REQUEST_URI'] == '/mcs/index.php' || $_SERVER['REQUEST_URI'] == '/mcs/')
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/styleHome.css\">";
    else
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/styleContent.css\">";
    ?>
    <link rel="shortcut icon" href="icon/redcrossicon.jpg" type="img/jpg" />
    <script src="js/scripts.js"></script>
    <script src="js/init.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/jquery.js"></script>
    <title>生殖中心电子病历系统</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="author" content="Michael Hou">
</head>
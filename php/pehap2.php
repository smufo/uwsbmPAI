<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        // include -> dołaczenie
        // require -> wymagane

        include "data.php";
        require "data.php";

        require "function.php";

        echo "kod";
        show();
        showMessage("To jest komunikat od użytkownika");

        $x = 10;
        $y = 20;
        echo "<p> Suma $x i $y = ".sum($x, $y)."</p>";

        echo "<h4>Lista owoców</h4>";
        generateList($fruits);

        sortArray($vegetables, "desc");
    ?>
</body>
</html>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP - zajęcia 1</title>
</head>
<body>
    <?php
        echo"php<br>";
        $firstName = "Janusz";
        $lastName = "Ptak";
        echo "Imię: $firstName<br>";
        echo 'Nazwisko: $lastName<br>';

        // heredoc
        echo <<< DATA
        Imię: $firstName<br>
        Nazwisko: $lastName
        <hr>
DATA;
        echo phpinfo();
    ?>
</body>
</html>
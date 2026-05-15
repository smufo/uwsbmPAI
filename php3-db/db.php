<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "db";

    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_errno) {
        die("Błąd połączenia z bazą danych: ". $conn->connect_error);
    }
?>
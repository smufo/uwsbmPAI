<?php
    /** @var mysqli $conn */
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $dbname = "pai";

    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_errno) {
        die("Błąd połączenia z bazą danych: ". $conn->connect_error);
    }
?>
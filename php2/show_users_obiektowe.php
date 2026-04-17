<?php
    mysqli_report(MYSQLI_REPORT_OFF);
    $connection = new mysqli("127.0.0.1", "root", "", "pai");

    //print_r($connection);

    if (!$connection) {
        die("Błąd: " . $connection->connect_error);
    }

    $query = "SELECT * FROM users";

    $result = $connection->query($query);

    if (!$result) {
        die("Query failed: " . $connection->error);
    }

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo <<< DATA
                ID: $row[id], imie: $row[first_name], nazwisko: $row[last_name] data urodzenia: $row[birthday]<hr>
DATA;
        }
    } else {
        echo "Brak danych w tabeli";
    }

    $connection->close();

?>

<!--
Liczba rekordów: 3

Użytkownik: 1
ID: 1
Imię: Jan
Nazwisko: Kowalski
Data urodzenia: 2001-01-01
---------------------------------
-->
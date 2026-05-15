<?php
    mysqli_report(MYSQLI_REPORT_OFF);
    $connection = @mysqli_connect("localhost", "root", "haslo123", "pai");

    //print_r($connection);

    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM users";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connection));
    }

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            //echo $row['first_name'] . "<br>";
            echo <<< DATA
                ID: $row[id], imie: $row[first_name], nazwisko: $row[last_name] data urodzenia: $row[birthday]<hr>
DATA;
        }
    } else {
        echo "Brak danych w tabeli";
    }

    mysqli_close($connection);
?>
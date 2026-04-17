<?php
    mysqli_report(MYSQLI_REPORT_OFF);
    $connection = new mysqli("localhost", "root", "haslo123", "pai");

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
        echo "Liczba rekordów: " . $result->num_rows . "<br><br>";
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            echo <<< DATA
                Użytkownik: $i<br>
                ID: $row[id]<br>
                Imię: $row[first_name]<br>
                Nazwisko: $row[last_name]<br>
                Data urodzenia: $row[birthday]<br>
                -----------------------------------<br>
DATA;
            $i++;
        }
    } else {
        echo "Brak danych w tabeli";
    }

    $result->data_seek(0);

    if ($result->num_rows > 0) {
        $result->data_seek(0);
        echo "<table style='border: 1px solid; border-collapse: collapse; text-align: left; width: 100%;'>";
        echo "<thead>";

        echo "<tr>";
        echo "<th colspan='5' style='border: 1px solid; text-align: center'>";
        echo "Liczba użytkowników: " . $result->num_rows;
        echo "  </th>";
        echo "</tr>";

        echo "<tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Data urodzenia</th>
              </tr>
              </thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td >" . $row['id'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['birthday'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "Brak danych w tabeli";
    }

$connection->close();
?>
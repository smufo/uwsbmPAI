<?php
    session_start();

    if (!isset($_SESSION["user_id"])) {
        header("Location: index.php");
        exit();
    }

    require_once "db.php";
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Formularz użytkownika</title>
</head>
<body>
    <?php
        if (isset($_SESSION["user_id"])) {
       
    
    ?>
    <h2>Lista użytkowników</h2>
    <?php
        if (isset($_GET['delete'])) {
            $id = (int)$_GET['delete'];

            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
            echo "<p class='success'>Usunięto użytkownika</p>";
        } else {
            echo "<p class='error'>Błąd usuwania użytkownika:  ". $stmt->error ."</p>";
        }
        }

        $result = $conn->query("SELECT * FROM users");

        if ($result && $result->num_rows > 0) {
            echo "<table>";
                echo "<tr>
                    <th>ID</th>    
                    <th>Imię</th>    
                    <th>Nazwisko</th>    
                    <th>Email</th>    
                    <th>Data dodania</th>    
                    <th>Akcje</th>    
                ";
                echo "</tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>$row[id]</td>
                            <td>$row[first_name]</td>
                            <td>$row[last_name]</td>
                            <td>$row[email]</td>
                            <td>$row[created_at]</td>
                            <td>
                                <a class='delete' href='?delete={$row['id']}' onclick=\"return confirm('Na pewno usunąć?')\">Usuń</a>
                            </td>
                          </tr>";
                }
            echo "</table>";
        } else {
            echo "Brak użytkowników w bazie danych";
        }
    }
    ?>
    <h2>Użytkownik</h2>
    <form action="add_user.php" method="post">
        <label>Imię:</label><br>
        <input type="text" name="first_name"  placeholder="Podaj imię"><br><br>
        <label>Nazwisko: </label><br>
        <input type="text" name="last_name"  placeholder="Podaj nazwisko"><br><br>
        <label>Email:</label><br>
        <input type="email" name="email" placeholder="Podaj email" required><br><br>
        <label>Hasło:</label><br>
        <input type="password" name="password" placeholder="Podaj hasło" required><br><br>
        <input type="submit" value="Dodaj użytkownika">        
    </form>
    <a href="index.php">Masz konto? Zaloguj się</a>
</body>
</html>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
    require_once "db.php";

    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $first_name = $_POST['first_name'] ?? '';
        $last_name = $_POST['last_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`) VALUES (?, ?, ?, ?);");

        $stmt->bind_param("ssss", $first_name, $last_name, $email, $password);

        if ($stmt->execute()) {
            echo "<p class='success'>Prawidłowo dodano użytkownika</p>";
        } else {
            echo "<p class='error'>Błąd:  ". $stmt->error ."</p>";
        }
    }

?>

    <a href="./form.php">Strona główna</a>
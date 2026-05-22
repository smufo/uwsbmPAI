<?php
    require_once "db.php";
    session_start();
    if (!empty($_SESSION["success"])){
            echo "<p class='success'>" . $_SESSION["success"] . "</p>";
            unset($_SESSION["success"]);
        }

    $message = "";

    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        $email = $_POST["email"] ?? '';
        $password = $_POST["password"] ?? '';

        $stmt = $conn->prepare("SELECT id, first_name, password, email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["name"] = $user["first_name"];

            header("Location: form.php");
            exit();
        } else {
            $message = "Błędny email lub hasło";
        }
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h2>Logowanie</h2>

    <?php if ($message): ?>
        <p class="error"><?= $message ?></p>
    <?php endif; ?>

    <form method="post">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Hasło:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Zaloguj">
    </form><br>

    <a href="form.php">Nie masz konta? Zarejestruj się</a>
</body>
</html>
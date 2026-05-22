<?php
    session_start();
?>
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
    /** @var mysqli $conn */

    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $first_name = $_POST['first_name'] ?? '';
        $last_name = $_POST['last_name'] ?? '';
        $email = $_POST['email'] ?? '';

        $password_plain = $_POST['password'];

        // sprawdzanie siły hasła
        // $hasUpperCase = preg_match('/[A-Z]/', $password_plain);
        $hasUpperCase = preg_match('@[A-Z]@', $password_plain);
        $hasLowerCase = preg_match('@[a-z]@', $password_plain);
        $hasNumber = preg_match('@[0-9]@', $password_plain);
        $hasSpecial = preg_match('@[^a-zA-Z0-9]@', $password_plain);


        if (
            strlen($password_plain) < 8 ||
            !$hasUpperCase ||
            !$hasLowerCase ||
            !$hasNumber ||
            !$hasSpecial
        ) {
            $_SESSION['error'] = 'Hasło musi mieć:<br><br>
            - minimum 8 znaków<br>
            - dużą literę<br>
            - małą literę<br>
            - znak specjalny np. #$@!<hr>';
            header('Location: form.php');
            exit();
        } else {
         
            $password = password_hash($password_plain, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`) VALUES (?, ?, ?, ?);");

            $stmt->bind_param("ssss", $first_name, $last_name, $email, $password);

            if ($stmt->execute()) {
                $_SESSION['success'] = "Prawidłowo dodano użytkownika $email<hr>";
            header('Location: index.php');
            } else {
                $_SESSION['error'] = "Błąd:  ". $stmt->error;
                header('Location: form.php');
            }
        }
    }

?>

    <a href="./form.php">Strona główna</a>
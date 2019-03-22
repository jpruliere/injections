<?php
if (isset($_POST['username'])) {
    session_start();

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "password");

    $stmt = $pdo->query("SELECT * FROM user WHERE username = '$user' AND password = '$pass';");
    
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($userData)) {
        $_SESSION['user'] = $userData;
        header('Location:./admin.php');
    } else {
        $err = "Échec de la connexion";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="username"><br/>
        <input type="password" name="password">
        <input type="submit" value="Connexion">
    </form>
    <?php if (isset($err)) echo $err; ?>
</body>
</html>
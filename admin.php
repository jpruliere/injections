<?php

session_start();

if (isset($_POST['logout'])) unset($_SESSION['user']);

if (!isset($_SESSION['user'])) header('Location:./form.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration</title>
</head>
<body>
    <h1>Bonjour, <?php if ($_SESSION['user']['role'] == "user") echo "simple"; else echo "vénérable"; echo " ".$_SESSION['user']['username']; ?></h1>
    <form method="post">
        <input type="submit" name="logout" value="Déconnexion">
    </form>
</body>
</html>
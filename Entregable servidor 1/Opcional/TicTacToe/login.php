<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <p id="tag" style="color: red;"></p>
    <form method="POST" action="login.php">
        <label for="username">Username:</label><br>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
    <a href="./register.php">¿No tienes una cuenta? Registrate!</a>
</body>

</html>
<?php
require "./_php_exports/userFunctions.php";
require "./_php_exports/cookiesCheck.php";
$loggedUser = null;
checkUser(true);


if (isset($username) && isset($password)) {
    $loggedUser = login();
    if ($loggedUser !== null)
        echo '<script>document.cookie = "UserID = ' . $loggedUser->id . '"; window.location.replace("room.php");</script>';
    else {
        echo '<script>document.getElementById("tag").innerHTML = "Datos Iválidos"</script>';
    }
}
?>
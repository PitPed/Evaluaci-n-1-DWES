<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form method="POST">
        <label for="username">Username:</label><br>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br>
        <input type="submit" value="Registrase">
    </form>
</body>

</html>
<?php
include_once "./_php_exports/redirect.php";
include_once "./_php_exports/userFunctions.php";
include_once "./_php_exports/cookiesCheck.php";

if ($username === null || $password === null)
    return;
$user = createUser();

writeUser($user);
$loggedUser = login($user);
if ($loggedUser !== null)
    echo '<script>document.cookie = "UserID = ' . $loggedUser->id . '"; window.location.replace("room.php");</script>';


?>
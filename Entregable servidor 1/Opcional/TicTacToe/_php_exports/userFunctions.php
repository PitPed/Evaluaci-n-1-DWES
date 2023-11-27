<?php
include_once "variables.php";

const USER_DEFAULT_PICTURE = "https://www.svgrepo.com/show/529279/user-circle.svg";

$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
function newUserId()
{
    $keysData = json_decode(file_get_contents(KEYS_FILE));
    $newId = $keysData->user;
    $keysData->user++;
    file_put_contents(KEYS_FILE, json_encode($keysData));
    return intVal($newId);
}


function createUser()
{
    global $username, $password;

    if ($username === null || $password === null)
        return null;

    $user = array(
        'id' => newUserId(),
        'username' => $username,
        'password' => md5($password),
        'gamesWon' => 0,
        'friends' => array(),
        'profilePic' => USER_DEFAULT_PICTURE
    );

    return $user;
}

function writeUser($user)
{
    if ($user == null)
        return null;
    $users = json_decode(file_get_contents(USERS_FILE));
    $users_index = json_decode(file_get_contents(USERS_INDEX_FILE));
    $id = $user['id'];
    $users->$id = $user;
    $username = $user['username'];
    $users_index->$username = $id;
    file_put_contents(USERS_FILE, json_encode($users));
    file_put_contents(USERS_INDEX_FILE, json_encode($users_index));
    return true;
}

function getUserbyID($id, $safe = true)
{
    $users = json_decode(file_get_contents(USERS_FILE));
    $user = $users->$id;
    if ($safe)
        unset($user->password);
    return $user;
}

function getUserbyName($name, $safe = true)
{
    $ids = json_decode(file_get_contents(USERS_INDEX_FILE));
    $id = $ids->$name;
    return getUserbyID($id, $safe);
}

function login($user = null)
{
    global $username, $password;
    if ($user === null)
        $user = getUserbyName($username, false);

    if (md5($password) == $user->password)
        return $user;
    else
        return null;

}

?>
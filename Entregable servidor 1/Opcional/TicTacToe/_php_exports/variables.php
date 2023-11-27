<?php
const GAMES_FILE = './saved_data/games';
const KEYS_FILE = './saved_data/keys.json';
const ROOMS_FILE = './saved_data/rooms.json';
const USERS_FILE = "./saved_data/users.json";
const USERS_INDEX_FILE = "./saved_data/users_index.json";
const GAMES_DATA_FILE = './saved_data/games/games.json';
const USERS_ROOMS_FILE = './saved_data/users-rooms.json';
include_once "userInfoVariables.php";

$playerId = isset($_COOKIE["UserID"]) ? $_COOKIE["UserID"] : null;
?>
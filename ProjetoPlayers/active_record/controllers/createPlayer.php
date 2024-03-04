<?php

use models\Database;
use models\Player;

include '../models/Database.php';
include '../models/Player.php';

$db = Database::getInstance('../players.db');

$name     = $_POST['name'];
$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];

$player = new Player($name, $username, $email, $password);
$player->save();

header('Location: ../index.php');
exit();

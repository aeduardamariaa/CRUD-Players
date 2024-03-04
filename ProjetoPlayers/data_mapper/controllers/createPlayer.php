<?php

use models\Database;
use models\Player;
use models\PlayerMapper;

include '../models/Database.php';
include '../models/Player.php';
include '../models/PlayerMapper.php';

$db = Database::getInstance('../players.db');

$name     = $_POST['name'];
$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];

$player = new Player($name, $username, $email, $password);
$playerMapper = new PlayerMapper($db);
$playerMapper->insert($newPlayer);

header('Location: ../index.php');
exit();

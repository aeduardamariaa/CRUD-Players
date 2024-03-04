<?php

use models\Database;
use models\Player;

include '../models/Database.php';
include '../models/Player.php';

$db = Database::getInstance('../players.db');

$playerId   = $_POST['id'];
$name       = $_POST['name'];
$username   = $_POST['username'];
$email      = $_POST['email'];
$password   = $_POST['password'];

$existingPlayer = new Player($name, $username, $email, $password);
$existingPlayer->setId($playerId); 
$existingPlayer->update(); 

header('Location: ../index.php');
exit();
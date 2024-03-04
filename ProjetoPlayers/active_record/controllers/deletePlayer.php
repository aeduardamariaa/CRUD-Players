<?php

use models\Database;
use models\Player;

include '../models/Database.php';
include '../models/Player.php';

$db = Database::getInstance('../players.db');

$playerId = $_GET['id'];
$action   = $_GET['action'];

if($action ==='delete') {
    $playerToDelete = new Player('delete', 'delete', 'delete@example.com', 'delete');
    $playerToDelete->setId($playerId);
    $playerToDelete->delete();
}else if($action === 'cancel') {}

header('Location: ../index.php');
exit();


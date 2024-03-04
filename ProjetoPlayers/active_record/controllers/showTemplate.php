<?php

$id       = $_POST['id'];
$name     = $_POST['name'];
$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];
$registration_date = $_POST['registration_date'];

$action = $_POST['action'] === 'delete' ? 'delete' : 'edit';
$address = "../views/{$action}.html";

$template = file_get_contents($address);

$template = str_replace('{id}', $id, $template);
$template = str_replace('{name}', $name, $template);
$template = str_replace('{username}', $username, $template);
$template = str_replace('{email}', $email, $template);
$template = str_replace('{password}', $password, $template);
$template = str_replace('{registration_date}', $registration_date, $template);

echo $template;

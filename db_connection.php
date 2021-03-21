<?php

$server_name = 'localhost:3333';
$username = 'root';
$password = '';
$db = 'login-crud';

try {
    $conn = new PDO("mysql:host=$server_name;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed " . $e->getMessage();
}
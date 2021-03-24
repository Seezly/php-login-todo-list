<?php

    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['check-password'])) {
        require 'db_connection.php';

        $username = $_POST['username'];
        $email = $_POST['email'];
        $passwordHashed = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $res = $stmt->execute([$username, $email, $passwordHashed]);

        header("Location: ./loginForm.php");

        $conn = null;
        exit();
    }
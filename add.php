<?php

    session_start();

    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['urgency'])) {
        
        require 'db_connection.php';

        $user = $_SESSION['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $urgency = $_POST['urgency'];

        $stmt = $conn->prepare("INSERT INTO todos (user_id, title, description, urgency) VALUES (?, ?, ?, ?)");
        $res = $stmt->execute([$user, $title, $description, $urgency]);

        header("Location: ./dashboard.php");
        
        $conn = null;
        exit();
    }
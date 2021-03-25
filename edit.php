<?php
    if (isset($_POST['title']) || isset($_POST['description']) || isset($_POST['urgency']) && isset($_POST['id'])) {
        
        require 'db_connection.php';

        $title = $_POST['title'];
        $description = $_POST['description'];
        $urgency = $_POST['urgency'];
        $id = $_POST['id'];

        $stmt = $conn->prepare("UPDATE todos SET title = ?, description = ?, urgency = ? WHERE id = ?");
        $res = $stmt->execute([$title, $description, $urgency, $id]);

        header("Location: dashboard.php");
        
        $conn = null;
        exit();
    }
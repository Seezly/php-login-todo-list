<?php
    if (isset($_GET['id'])) {
        
        require 'db_connection.php';

        $id = $_GET['id'];

        $stmt = $conn->prepare("DELETE FROM todos WHERE id=?");
        $res = $stmt->execute([$id]);

        header("Location: dashboard.php");
        
        $conn = null;
        exit();
    }
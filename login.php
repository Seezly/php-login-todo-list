<?php

    session_start();
    
    if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true){
        header("Location: dashboard.php");
        exit();
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        require 'db_connection.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username=?");
        
        if ($stmt->execute([$username])) {
            if($stmt->rowCount() == 1){
                if($row = $stmt->fetch()){
                    $id = $row["id"];
                    $username = $row["username"];
                    $hashed_password = $row["password"];
                    if(password_verify($password, $hashed_password)){
                        session_start();
                        
                        $_SESSION["loggedIn"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;                            
                        
                        header("Location: dashboard.php");
                    }
                }
            }
        }

        $conn = null;
        exit();
    }
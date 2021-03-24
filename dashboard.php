<?php

    session_start();
    
    if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true){
        header("location: login.php");
        exit();
    } else {
        require 'db_connection.php';
        require 'login.php';
    }

?>

<!DOCTYPE html>
<html lang="en">

    <head>
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/normalize.css">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>PHP Login Crud | Dashboard</title>
    
    </head>
    
    <body>

        <main class="container">

            <section class="row">

                <div class="col s-12">
                    <h1>Welcome to your Dashboard, <?php echo $_SESSION['username'] ?></h1>
                </div>

            </section>

            <?php
                
                    $stmt = $conn->prepare('SELECT * FROM todos WHERE user_id=? ORDER BY id DESC');
                    $todos = $stmt->execute($_SESSION['id']);
                
            ?>

            <section class="row">

                <div class="col s4">
                </div>
                <div class="col s7 offset-s1">
                    <div class="col s4">
                    </div>
                </div>

            </section>
            
            </section>

        </main>

    </body>

</html>
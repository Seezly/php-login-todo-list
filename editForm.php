<?php

    session_start();
    
    if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true){
        header("Location: index.php");
        exit();
    } else {
        require 'db_connection.php';
        if (isset($_GET['title']) && isset($_GET['description']) && isset($_GET['urgency']) && isset($_GET['id'])) {
    
            $title = $_GET['title'];
            $description = $_GET['description'];
            $urgency = $_GET['urgency'];
            $id = $_GET['id'];
        }
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
            
                <div class="col s-2 offset-s10">
                    <a href="index.php" style="width: 100%" class="waves-effect waves-light btn-large z-depth-2 yellow darken-4 grey-text text-darken-4">Log Out</a>
                </div>
            
            </section>

            <section class="row">

                <div class="col s-12">
                    <h1>Editing: <?php echo $title ?></h1>
                </div>

            </section>

            <section class="row">

                <div class="col s4">

                    <form action="edit.php" method="POST">
                        
                        <label for="title">Title:</label>            
                        <input type="text" name="title" placeholder="Todo title" value=<?php echo $title ?> >

                        <label for="description">Description:</label>
                        <input type="text" name="description" placeholder="Todo description" value=<?php echo $description ?> >

                        <label for="urgency">Urgency:</label>
                        <select class="browser-default" name="urgency">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                        <input type="hidden" name="id" value=<?php echo $id ?> >
                        <br>
                        <button type="submit" style="width: 100%" class="waves-effect waves-light btn-large z-depth-2 yellow darken-4 grey-text text-darken-4">Edit todo</button>

                    </form>

                </div>
                <div class="col s7 offset-s1">
                    
                    <div class="col s4" id=<?php echo $id ?>>
                    
                        <div class="card z-depth-2">
                        
                            <div class="card-content">
                                <span class="card-title grey-text text-darken-4"><?php echo $title ?></span>
                                <small class="yellow-text text-darken-4"><?php echo $urgency ?></small>
                                <p><?php echo $description ?></p>
                            </div>
                        
                        </div>
                    
                    </div>
                </div>

            </section>
            
        </main>

    </body>

</html>
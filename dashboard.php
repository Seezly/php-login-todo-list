<?php

    session_start();
    
    if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true){
        header("Location: index.php");
        exit();
    } else {
        require 'db_connection.php';
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
                    <h1>Welcome to your Dashboard, <?php echo $_SESSION['username'] ?></h1>
                </div>

            </section>

            <?php
                
                    $stmt = $conn->prepare('SELECT * FROM todos WHERE user_id=? ORDER BY id DESC');
                    $res = $stmt->execute([$_SESSION['id']]);
                    $todos = $stmt->rowCount();
                
            ?>

            <section class="row">

                <div class="col s4">

                    <form action="add.php" method="POST">
                        
                        <label for="title">Title:</label>
                        <br>
                        <input type="text" name="title" placeholder="Todo title" required>
                        <br>
                        <label for="description">Description:</label>
                        <br>
                        <input type="text" name="description" placeholder="Todo description" required>
                        <br>
                        <label for="urgency">Urgency:</label>
                        <br>
                        <select class="browser-default" name="urgency">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                        <br>
                        <button type="submit" style="width: 100%" class="waves-effect waves-light btn-large z-depth-2 yellow darken-4 grey-text text-darken-4">Add todo</button>

                        </form>

                </div>
                <div class="col s7 offset-s1">
                    <?php if($todos <= 0){ ?>
                        <h2>Add a new todo!</h2>
                    <?php } ?>
    
                    <?php while($todo = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
                        <div class="col s4" id=<?php print_r($todo['id']); ?>>
                        
                            <div class="card z-depth-2">
                            
                                <div class="card-content">
                                    <span class="card-title grey-text text-darken-4"><?php echo $todo['title'] ?></span>
                                    <small class="yellow-text text-darken-4"><?php echo $todo['urgency'] ?></small>
                                    <p><?php echo $todo['description'] ?></p>
                                </div>
                                <div class="card-action">
                                    <a href="editForm.php?id=<?php print_r($todo['id']) ?>&title=<?php echo $todo['title'] ?>&description=<?php echo $todo['description'] ?>&urgency=<?php echo $todo['urgency'] ?>">Edit</a>
                                    <a href="delete.php?id=<?php print_r($todo['id']) ?>">Delete</a>
                                </div>
                            
                            </div>
                        
                        </div>
                    <?php } ?>
                </div>

            </section>
            
        </main>

    </body>

</html>
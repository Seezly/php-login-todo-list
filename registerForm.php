<?php

    session_start();
    
    if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true){
        header("Location: dashboard.php");
        exit();
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
        <title>PHP Login Crud | Register</title>
    
    </head>
    
    <body>

        <main class="container">

            <section class="row">

                <div class="col s-12">
                    <h1>Register form</h1>
                </div>

            </section>

            <section class="row">
            
                <div class="col s6 offset-s3">
                    <form action="./register.php" method="post">

                        <label for="username">Username*</label>
                        <br>
                        <input type="text" id="username" name="username" required>
                        <br>
                        <label for="email">Email*</label>
                        <br>
                        <input type="email" id="email" name="email" required>
                        <br>
                        <label for="password">Password*</label>
                        <br>
                        <input type="password" id="password" name="password" required>
                        <br>
                        <label for="check-password">Confirm password</label>
                        <br>
                        <input type="password" id="check-password" name="check-password" required>
                        <br>
                        <button type="submit" style="width: 100%" class="waves-effect waves-light btn-large z-depth-2 yellow darken-4 grey-text text-darken-4">Sign Up</button>
                        <small>or <a href="./loginForm.php" class="yellow-text text-darken-4">log in</a>.</small>

                    </form>
                </div>
            
            </section>
            
        </main>

    </body>

</html>
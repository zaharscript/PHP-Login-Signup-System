<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP SignUp and Login System</title>
    <style>
        .success {
            text-align: center;
            font-size: 3em;
            color: #69a76b;
            margin-bottom: 20px
        }


        .error {
            text-align: center;
            font-weight: bold;
            color: red;
            font-size: 3em;
        }
    </style>
</head>

<body>


    <div class="logon-container">
        <h2>Login </h2>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <?php
        check_login_errors();

        ?>


        <h2>Sign Up </h2>


        <form action="includes/signup.inc.php" method="post">
            <?php
            signup_inputs();
            ?>
            <button type="submit">SignUp</button>
        </form>

        <?php

        check_signup_error();
        ?>


    </div>




</body>

</html>
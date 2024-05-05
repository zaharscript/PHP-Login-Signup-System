<?php

declare(strict_types=1);

function signup_inputs()
{


    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["error_data"]["username_taken"])) {
        echo '<input type="text" name="username" placeholder="Username" value="' . $_SESSION["signup_data"]["username"] . '">';
    } else {
        echo '<input type="text" name="username" placeholder="Username">';
    }
    echo '<input type="password" name="password" placeholder="Password">';

    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["error_signup"]["email_used"]) && !isset($_SESSION["error_signup"]["invalid_email"])) {
        echo '<input type="email" name="email" placeholder="Email" value="' . $_SESSION["signup_data"]["email"] . '">';
    } else {
        echo '<input type="email" name="email" placeholder="Email">';
    }
}


function check_signup_error()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p style="text-align: center;
            font-weight: bold;
            color: red;
            font-size: 1em;">'  . $error . '</p>';
        }

        unset($_SESSION['errors_signup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '<br>';
        echo '<p style="text-align: center;
        font-size: 1em;
        color: #69a76b;
        margin-bottom: 20px">Signup success!</p>';
    }
}

<?php

declare(strict_types=1);

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

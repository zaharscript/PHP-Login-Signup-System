<?php

declare(strict_types=1);

function  check_login_errors()
{
    if (isset($_SESSION["error_login"])) {
        $errors = $_SESSION["errors_login"];

        echo "<br>";
        foreach ($errors as $error) {
            echo '<p class="error"></p>' . $error . '<p>' . "<br>";
        }
        unset($_SESSION["errors_login"]);
    } else if (isset($_GET['login']) && $_GET['login'] === "success") {
        echo "<br>";
        echo '<p class="success">Login success!</p>';
    }
}

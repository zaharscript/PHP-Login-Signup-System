<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $email = $_POST['email'];

    try {
        // Create connection
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';



        //error handler
        $errors = [];



        if (is_input_empty($username, $pwd, $email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "invalid email used!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username is already taken!";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email address is already registered!";
        }

        require_once 'config_session.inc.php'; //better to use this method then "session_start();"

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../index.php");
            die();
        }

        create_user($pdo, $pwd, $username, $email);
        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}

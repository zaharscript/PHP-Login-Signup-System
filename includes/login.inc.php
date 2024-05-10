<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["password"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        //error handler
        $errors = [];

        if (is_input_empty($username, $pwd)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_user($pdo, $username);


        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "incorrect login info!";
        }

        if (!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
            $errors["login_incorrect"] = "incorrect login info!";
        }



        require_once 'config_session.inc.php'; //better to use this method then "session_start();"

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            header("Location: ../index.php");
            die();
        }

        $newSessionId = session_create_id();
        $session_id = $newSessionId . "_" . $result["id"];
        session_id();
    } catch (PDOexception $e) {
        die("Query failed:" . $e->getMessage());
    }
} else {
    header("Location:../index.php");
    die();
}

<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
  $username = $_POST["username"];
  $pwd = $_POST["password"];

  try{
    require_once 'dbh.inc.php';
    require_once 'login_model.inc.php';
    require_once 'login_view.inc.php';
  }catch(PDOexcetion $e){
    die("Query failed:".$e->getMessage());
  }
}else{
  header("Location:../index.php");
  die();
}

//error handler
        $errors = [];



        if (is_input_empty($username, $pwd, $email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
       
        require_once 'config_session.inc.php'; //better to use this method then "session_start();"

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;

            header("Location: ../index.php");
            die();
        }



<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
  $username = $_POST["username"];
  $pwd = $_POST["password"];

  try{
    
  }catch(PDOexcetion $e){
    die("Query failed:".$e->getMessage());
  }
}else{
  header("Location:../index.php");
  die();
}



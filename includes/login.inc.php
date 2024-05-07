<?php

if ($_SERVER["REQUEST _METHOD"] === "POST") {
    $username = $_POST['username'];
    $pwd = $_POST['password'];



    try {
    } catch (PDOException $e) {
        die("Query failed" . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}

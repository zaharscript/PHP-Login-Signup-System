<?php

declare(strict_types=1);


function get_username(object $pdo, string $username)
{

    $query = "SELECT username FROM tech_blog WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();


    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function get_email(object $pdo, string $email)
{

    $query = "SELECT username FROM tech_blog WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();


    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $pwd, string $username, string $email)

{
    $query = "INSERT INTO  tech_blog(username, pwd, email) VALUE (:username, :password,  :email);";
    $stmt = $pdo->prepare($query);

    $option = [
        'cost' => 12
    ];
    // hashing
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $option);



    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $hashedPwd);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
}

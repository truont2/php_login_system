<?php
// file used to query the database

declare(strict_types=1); // prevent error

// connect to the db by passing in to the function
function get_username(object $pdo, string $username) {
    // :username = placeholder
    $query = "SELECT username FROM users WHERE username= :username;";

    $stmt = $pdo->prepare($query); // separate data from the query
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC); // fetch grabs the first result of the data 
    // fetch assoc: want to fetch data as a associative array

    // if username doesnt exists, we get a false statement
    return $result;
}

// connect to the db by passing in to the function
function get_email(object $pdo, string $email) {
    // :email = placeholder
    $query = "SELECT email FROM users WHERE email= :email;";

    $stmt = $pdo->prepare($query); // separate data from the query
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC); // fetch grabs the first result of the data 
    // fetch assoc: want to fetch data as a associative array

    // if email doesnt exists, we get a false statement
    return $result;
}
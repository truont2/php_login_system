<?php
// file to handle user input

declare(strict_types=1); // prevent error
// since we set strict type, need to set function parameter types

function is_input_empty(string $username, string $pwd, string $email) {
    if (empty($username) || empty($pwd) || empty($email)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

// check if the username exists already - need to do things in the model
function is_username_taken(object $pdo, string $username) {
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

// check if the emaiil exists already - need to do things in the model
function is_email_registered(object $pdo, string $email) {
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}


// post:create a user
function create_user(object $pdo, string $username, string $pwd, string $email) {
    // function in the model page
    set_user($pdo,$username,$pwd, $email);
}

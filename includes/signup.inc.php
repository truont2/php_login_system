<?php

// check if the user actually submit the form to access this page
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email= $_POST["email"];

    try {
        require_once 'dbh.inc.php'; // pull the code in
        require_once 'signup_model.inc.php'; // model first then controller
        require_once 'signup_view.inc.php';
        require_once 'signup_controller.inc.php';

        // associative and regular array syntax same
        $errors = [];

        // run error handlers - put in controller bc taking 
        if (is_input_empty($username, $pwd, $email)) {
            // there is an error 
            $errors["empty_input"] = "Fill in all fields";
        } 

        // check if valid email
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used";
        }

        // check if the username already exists
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken";
        }

        // check if the email is registered or not
        if (is_email_registered($pdo, $email)) {
            $errors["email_used"] = "Email already registered";
        }

        require_once 'config_session.inc.php'; // to get the data to start the session

        // array should be empty if no errors
        if ($errors) {
            // return true if there is data in the 
            $_SESSION["errors_signup"] = $errors;

            // store data that has been typed by the user
            $signupData = [
                "username" => $username, 
                "email" => $email
            ];

            $_SESSION["signup_data"] = $signupData;


            header("Location: ../index.php");
            die(); // end script
        }

        // now add the users
        create_user($pdo,$username,$pwd,$email);

        // to send the user to a new page and stop any other script from running
        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;
        die( ); // to stop the code

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    // header function to change page location
    header("Location: ../index.php");
    die( ); // to stop the code
}
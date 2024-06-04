<?php
//  file used to show data on the website
declare(strict_types=1); // prevent error

function signup_inputs() {

    // <input type="text" name="username" placeholder="Username">
    // <input type="password" name="pwd" placeholder="Password">
    // <input type="text" name="email" placeholder="E-mail">

    // check if oyu have data and that you dont have an error
    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        echo '<input type="text" name="username" placeholder="Username" value="' . $_SESSION['signup_data']["username"]  .  '">'; // single quotes for html
    } else {
        echo '<input type="text" name="username" placeholder="Username">';
    }

    echo '<input type="password" name="pwd" placeholder="Password">';

    // check if oyu have data and that you dont have an error
    if (isset($_SESSION['signup_data']["email"]) && !isset($_SESSION['errors_signup']["email_used"]) && !isset($_SESSION['errors_signup']["invalid_email"])) {
        echo '<input type="text" name="email" placeholder="E-mail" value="' . $_SESSION['signup_data']["email"]  .  '">'; // single quotes for html
    } else {
        echo '<input type="text" name="email" placeholder="E-mail">';
    }
}

function check_signup_errors() {
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        // display the errors
        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error .  '</p>';
        }

        // unset the function data after you have used it
        unset($_SESSION['errors_signup']);
    } else if (isset($_GET['signup']) && $_GET['signup'] === 'success') { // check if the signup is success
        echo "<br>";
        echo '<p class="form-success">Signup sucess!</p>';
    }
}


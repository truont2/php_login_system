<?php
//  file used to show data on the website
declare(strict_types=1); // prevent error

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
<?php

// set use only cookies and strict mode to be true
// mandatory for sessions
ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',1);

// set cookie parameters
session_set_cookie_params([
    'lifetime' => 1800, 
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true, 
    'httponly' => true
]);

// start a sesion
session_start();

// check if it does not exist
if (!isset($_SESSION["last_regeneration"])) {
    // regenerates session id to be more secure
    regenerate_session_id(); // so you can see when you last updated the session
} else {
    $interval = 60 * 30;
    if (time() - $_SESSION["last_regeneration"] >= $interval) {
        regenerate_session_id();
    }
}

function regenerate_session_id() {
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}
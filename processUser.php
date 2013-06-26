<?php
require("../../databaseAccess.php");
require("createUserClass.php");

/**
 * This is php file is just for HTML interaction.
 * It requires three arguments from an HTML form (POST method)
 * "userEmail", "password", "firstName"
 *
 */

// TODO add some regex to strip everything for security

// Information from the form
$userEmail = $_POST['userEmail'];
$firstName = $_POST['firstName'];
$password = $_POST['password'];
$rePassword = $_POST['rePassword'];

//If a valid email address is entered, retyped password is the same as  password, password is equal to or greater than 6 characters , 
//nothing is left blank then create the account, and make sure only letters are entered for the name
if ($password == $rePassword && $password != null && strlen($password) >= 6 && preg_match("/[A-Z]/", $password) && $firstName != null && filter_var($userEmail, FILTER_VALIDATE_EMAIL) && preg_match('/^\s*([A-z.?;!0-9+=,"_ ]+(\.[A-z.?;!0-9+=,"_ ]+)?)\s*$/', $firstName)
    && $password != $userEmail && $password != $firstName && $firstName != $userEmail
) {
    $user = new createUser($userEmail, $password, $firstName);
    header("processLogin.php");
} else {

    header("../../createUser.php");
}
/*
//This is just for debug information, we'll remove it when we're done.
print_r($user);
*/


?>
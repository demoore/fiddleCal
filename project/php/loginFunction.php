<?php
/**
 * User: dylan
 * Date: 2013-05-01
 * Time: 10:11 AM
 */
include ("session.php");
function login($email, $password, $database){

    //if The user has the correct username and password they can access the calendar
    if (!isset($_SESSION['loginForm'], $_SESSION['passwordForm'])&&isset($_POST['loginForm'], $_POST['passwordForm'])) {
// First we get the parameters

        $userEmail = $_POST['loginForm'];
        $password = $_POST['passwordForm'];
        $_SESSION['loginForm'] = $userEmail;
        $_SESSION['passwordForm'] = $password;

    } else {
        return false;
    }

    if (isset($userEmail, $password)) {
        require('../../databaseAccess.php');
        // This query will return all the data, we may just have to change
        // the scope to the table name we're trying to access
        $userQuery = "SELECT * FROM users WHERE
              userEmail = \"$userEmail\" AND userPassword = \"$password\"";

    } else {
        return false;
    }

    // Make the connection...
    $DBConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // ... and ensure it works
    if (mysqli_connect_errno($DBConnection)) {
        echo "Failed to connect to the database: " . mysqli_connect_error();
        exit();

    }
    return true;

}
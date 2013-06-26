<!DOCTYPE html>
<?php
include("session.php");
// Check if the user has already logged in
if (isset($userEmail, $password) ) {
    require("databaseAccess.php");
    header("location:userPage.php");
}

//If user isn't logged in, don't show the calendar
if (!isset($userEmail, $password)) {
//Get the navigation bar variable to choose what page to show
    if (isset ($_GET['s'])) {
        $s = $_GET['s'];
    } elseif (isset($_POST['s'])) {
        $s = $_POST['s'];
    } else {
        $s = NULL;
    }


//Determines which webpage to display
    switch ($s) {
        case 'createUser':
            $page = 'createUser.php';
            $pageTitle = "Create User";
            break;

        case 'userEntry':
            $page = 'userEntryTest.html';
            $pageTitle = "Just a user entry test";
            break;

        case 'login':
            $page = 'login.html';
            $pageTitle = "Login";
            break;

        case 'CalendarT':
            $page = 'calendar.php';
            $pageTitle = "Test the Calendar";
            break;

        case 'logout':
            $page = '/php/logout.php';
            $pageTitle = 'Logout';
            break;

        case 'forgotPassword':
            $page = 'FGPassword.php';
            $pageTitle = 'Forgot Password!';
            break;

        default:
            $page = "home.html";
            $pageTitle = "Welcome";
            break;
    }


    include("project/php/includes.inc");

    if ($s == 'CalendarT') {

        echo "<script src=\"project/js/jquery.calendario.js\"></script>";
    }

    include("project/php/navbar.inc");
    include("project/" . $page);
}
?>


<?php
//}
//include("project/php/footer.inc");
?>


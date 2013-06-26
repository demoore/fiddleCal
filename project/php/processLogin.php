
/**
 * User: dylan
 * Date: 2013-04-17
 * Time: 12:10 PM
 */

/**
 * User: Gus
 * Date: 2013-04-21
 * Time: 9:43 PM
 */



include ("session.php");

//if The user has the correct username and password they can access the calendar
if (!isset($_SESSION['loginForm'], $_SESSION['passwordForm'])&&isset($_POST['loginForm'], $_POST['passwordForm'])) {
// First we get the parameters

    $userEmail = $_POST['loginForm'];
    $password = $_POST['passwordForm'];
    $_SESSION['loginForm'] = $userEmail;
    $_SESSION['passwordForm'] = $password;
	
} 
//If nothing was typed head back to the login page
if($userEmail == "" || $password == ""){
 header("location:project/project/php/logout.php");
}

if (isset($userEmail, $password)) {
require('../../databaseAccess.php');
// This query will return all the data, we may just have to change
// the scope to the table name we're trying to access
$userQuery = "SELECT * FROM users WHERE
              userEmail = \"$userEmail\" AND userPassword = \"$password\"";

// Make the connection...
$DBConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// ... and ensure it works
if (mysqli_connect_errno($DBConnection)) {
    echo "Failed to connect to the database: " . mysqli_connect_error();
    exit();

}

$queryResults = $DBConnection->query($userQuery) or die(mysqli_error($DBConnection));
$userInfo = $queryResults->fetch_object();
echo "<div class=\"container\">";
echo "<h1>Welcome " . $userInfo->userFirstName  . "</h1>";

if ($queryResults->num_rows == 1) {
   // echo "<pre>";
   // print_r($queryResults);
   // echo $userInfo->userName;
   // echo "\n";
   // echo $userInfo->userTable;
   // echo "</pre>";
	include("../calendar.php");
} else {
    //echo "<pre>";
	 //If username or password does not exist or is incorrect then return to login page
	 echo "login or password is incorrect";
	 header("location:project/project/php/logout.php");
}
echo "</div>";
$queryResults->free();
$DBConnection->close();
}


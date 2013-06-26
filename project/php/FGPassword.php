<?php
include("php/emailClass.php");
//Check if user already exists. If it does stop, display message and go to create user page
function fgPassword($userName, $email)
{
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT * FROM users WHERE userFirstName LIKE \"$userName\" AND userEmail LIKE \"$email\"");

    $row = mysqli_fetch_array($result);

    if ($row['userID'] == "" && $row['userEmail'] == "") {
        mysqli_close($con);
        echo "<head><center><h1>" . $row['userName'] . "  user not found </center> </span><br></head>";
        echo '<font  color="white">';
        return;

    }
    $password = $row['userPassword'];
    mysqli_close($con);

    $message = "Here is you're username and password.\n  userName: " . $email . "\n  password: " . $password;
    $send = new email($email, "GD forgotten password", $message);
    echo "<center><h1>Information sent to $email</h1></center>";
    return;

}

if (!isset($_POST['firstName'], $_POST['userEmail'])) {
    ?>
    <br>
    <div class="container">

        <div class="page-header">
            <h1>Forgot Password</h1>
        </div>
        <h3>Enter your email and first name and click send to retrieve your password.</h3>

        <form action="project/FGPassword.php" method="POST" class="form-horizontal" id="forgotPassword">

            <div class="control-group">
                <label class="control-label" for="userEmail">Email:</label>

                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <input type="text" name="userEmail" class="span3" id="userEmail" onblur="validateForm()"/>
                        <span id="confirmEmail"></span> <br>
                    </div>
                </div>
            </div>


            <div class="control-group">
                <label for="firstName" class="control-label">First Name:</label>

                <div class="controls">
                    <div class="input-prepend">
                        <span class="add-on"><i class=" icon-user"></i></span>
                        <input type="text" name="firstName" class="span3" id="firstName"/> <br>
                    </div>
                </div>
            </div>
            <div class="controls">
                <input type="submit" value="Send" class="btn btn-primary"/>
            </div>
        </form>
	<?php
	} else {
	include("menu.php");
	require("../../databaseAccess.php");
    fgPassword($_POST['firstName'], $_POST['userEmail']);
}
?>
 <?php
if (!isset($message)){
  $message = "";
}
if(!isset($userEmail,$password)){
 $userEmail = "";
 $password = "";
 
}

?>


<?php
echo $message;
include ("menu.php");
?>
<br>
    <h1>Login</h1>

    <form action="userPage.php" method="POST" class="form-horizontal" id="login">

        <div class="control-group">
            <label for="loginForm" class="control-label">Email:</label>

            <div class="controls">
			    <div class="input-prepend">
                    <span class="add-on"><i class="icon-envelope"></i></span>
                <input type="text" name="loginForm" value = <?php echo "'$userEmail'";?> id="loginForm" class="span3"/>
            </div>
        </div>
        </div>
        <div class="control-group">
            <label for="passwordForm" class="control-label"> Password:</label>

            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-eye-open"></i></span>
                <input type="password" name="passwordForm" value = <?php echo "'$password'";?> id="passwordForm" class="span3"/>
                <br><br>
                <input type="submit" value="Login" class="btn"/>

            </div>
                <a href="project/FGPassword.php"   target="_top" class="btn btn-danger">Forgot Password?</a> <br>
        </div>

    </form>

</div>

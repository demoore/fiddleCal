<?php

if (!isset($userEmail, $password, $rePassword, $firstName)) {
    $userEmail = null;
    $password = null;
    $rePassword = null;
    $firstName = null;
}
if (isset($message)) {
    include("menu.php");
    echo $message;
}

?>


<br>
<div class="container">
    <div class="page-header">
        <h1>Create User</h1>
    </div>

    <br>

    <div class="row-fluid">
        <div class="span8">
            <form action="project/php/processUser.php" method="POST" class="form-horizontal" id="createUser">

                <div class="control-group">
                    <label class="control-label" for="userEmail">Email:</label>

                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-envelope"></i></span>
                            <input type="text" name="userEmail" value=<?php echo "'$userEmail'"; ?>  class="input-large"
                            id="userEmail" onblur="validateForm()"/>
                            <span id="confirmEmail"></span> <br>
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <label for="password" class="control-label">Password:</label>

                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class=" icon-eye-open"></i></span>
                            <input type="password" value= <?php echo "'$password'"; ?> name="password"
                            class="input-large"
                            id="password"
                            onblur="passwordStrength(this.value,document.getElementById('strength'),document.getElementById('passError'))"/>
                            <span id="passError"></span><span id="strength"></span> <br>
                        </div>
                    </div>
                </div>


                <div class="control-group">
                    <label for="rePassword" class="control-label">Retype Password:</label>

                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class=" icon-eye-open"></i></span>
                            <input type="password" value= <?php echo "'$rePassword'"; ?> name="rePassword"
                            class="input-large" id="rePassword"
                            onkeyup="checkPass(); return false;"/>
                            <span id="confirmMessage"></span><br>
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <label for="firstName" class="control-label">First Name:</label>

                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class=" icon-user"></i></span>
                            <input type="text" value= <?php echo "'$firstName'"; ?> name="firstName" class="input-large"
                            id="firstName"/> <br>
                        </div>
                    </div>
                </div>
                <div class="controls">
                    <input type="submit" value="Submit" class="btn btn-primary"/>
                </div>
            </form>
        </div>
        <div class="span4" id="passwordWell">
            <div class="well">
                <ul class="unstyled">
                    <li>Your password requires at least:
                        <ul>
                            <li>Six characters</li>
                            <li>One upper and one lowercase letter</li>
                            <li>One number</li>
                        </ul>
                    </li>
                    <br>
                    <li>Your email is used to send you reminders</li>
                    <br>
                    <li>Your name is used to identify you – put whatever you want here.
                    </li>
                </ul>


            </div>
        </div>
    </div>

</div>
</div>

</body>

</html>
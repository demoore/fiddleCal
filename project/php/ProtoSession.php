<?Php
// we have assigned a string to the variable $username and password here
$userEmail = $_POST['loginForm'];
  $password = $_POST['passwordForm']; 
if(isset($userEmail)){        // checking the existence of the variable by using isset function
echo "The variable exists";} 
else{ echo " Variable does not exists ";}
?>
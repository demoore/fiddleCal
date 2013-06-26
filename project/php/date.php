#!/usr/bin/php
<?php
    //mailer.php
	$schedule = date("m/d/Y");
    if ($schedule == "05/20/2013") {
        mail("lallyGus@gmail.com", "Subject", "Just a reminder","lallyGus@gmail.com");
    }
	//1 14 * * * root php /path/to/your/scrip/mailer.php
?>


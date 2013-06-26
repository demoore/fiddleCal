<?php
/**
 * User: dylan
 * Date: 2013-05-15
 * Time: 7:25 PM
 */

print_r($_POST);
include("mail/write.php");
include("php/entryClass.php");
include("../databaseAccess.php");
$filename = 'mail/rt.txt';
if (isset($_POST)) {

    //$data = json_decode($_POST['parameters']);
    //echo print_r($data);
    $desc = $_POST['name'];
    $date =  $_POST['date'];
    $table = $_POST['tableName'];
    $email = $_POST['email'];

    $newEntry = new \entry\entry($table, $desc, $date);
    $newEntry->createEntry();
    $newEntry->getEntryID();
	$date = new DateTime($date);
	//echo $date->format('d/m/Y');
	write($filename,$date->format('d/m/Y')."||".$email."||".$desc."\n");
}


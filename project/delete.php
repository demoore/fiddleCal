<?php
/**
 * User: dylan
 * Date: 2013-05-27
 * Time: 9:04 PM
 */

print_r($_POST);
echo "...";
include("php/entryClass.php");
include("../databaseAccess.php");

if (isset($_POST)) {

    //$data = json_decode($_POST['parameters']);
    //echo print_r($data);
    $desc = $_POST['name'];
    $date =  $_POST['date'];
    $table = $_POST['tableName'];
    $email = $_POST['email'];
    $ID = $_POST['id'];

    $newEntry = new \entry\entry($table, $desc, $date);



    $newEntry->setterEntryID($ID);
    echo "Hola" . $newEntry->getterEntryID();
    $newEntry->deleteEntry($ID);


}
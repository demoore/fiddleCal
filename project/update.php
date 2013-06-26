<?php
/**
 * Created by IntelliJ IDEA.
 * User: dylan
 * Date: 2013-05-28
 * Time: 9:51 PM
 * To change this template use File | Settings | File Templates.
 */

print_r($_POST);

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
    $newEntry->editEntry($table, $ID, $desc);

}


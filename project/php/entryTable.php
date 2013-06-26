<?php
/**
 * Created by IntelliJ IDEA.
 * User: dylan
 * Date: 2013-05-13
 * Time: 7:21 PM
 * To change this template use File | Settings | File Templates.
 */

namespace entry;


class entryTable {
    private $entryTable;
    private $userTable;

    function __construct($inTableName){
        $this->entryTable = $inTableName;
        $this->userTable = $this->returnTable();

    }

    public function returnTable(){
        // Make the connection...
        $DBConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // ... and ensure it works
        if(mysqli_connect_errno($DBConnection)){
            echo "Failed to connect to the database: " . mysqli_connect_error();
            exit();
        }

        $entryQuery = "SELECT * FROM $this->entryTable";
        $result = $DBConnection->query($entryQuery);
        $table =  mysqli_fetch_all($result, MYSQL_ASSOC);

        return $table;
    }

    public function userPageOutputImportantDates(){
        $userTable = $this->userTable;
        echo "<ul class=\"unstyled\">";
        $index = 0;
        foreach($userTable as $entry){
            echo "<li>" . "Index[" . $index ."]</li>";
            echo "<ul>";
            foreach($entry as $key=>$value){
                echo "<li>[" .  $key . "] = " . $value . "</li>";
            }
            echo "</ul>";
            $index++;

        }
        echo "</ul>";
    }

    private function sortDates(){

    }

    public function returnJSON() {
        $jsonObject = json_encode($this->userTable);

        return $jsonObject;
    }

    public function getUserTable()
    {
        return $this->userTable;
    }



}
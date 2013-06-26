<?php
//echo `echo python send.py | at 1:00`;
$filename = 'rt.txt';
//$somecontent = "26/05/2013,lallyGus@gmail.com,I Wrote this,write script\n";

function write($filename, $text)
{
//Check to make sure the file exists
    if (is_writable($filename)) {

        //Open the file to see if it exists and display a message if it
        //and display a message if it doesn't exist.
        if (!$handle = fopen($filename, 'a')) {
            echo "Cannot open file ($filename)";
            exit;
        }

        // If you can't write text display a message
        if (fwrite($handle, $text) === FALSE) {
            echo "Cannot write to file ($filename)";
            exit;
        }
        fclose($handle);

    } else {
        echo "The file $filename is not writable";
    }
}


?>
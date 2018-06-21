<?php
 
    $file = "log.txt";
    $handle = fopen($file, 'r+');
    // see the parameters in: http://php.net/manual/en/function.fopen.php

    // check if handle is ok
    if(!$handle){
        die("Check your file source.");
    }

    // get the content of the log file
    echo $content = fread($handle, filesize($file));

    fclose($handle);

    // to delete a file, use unlink($file)

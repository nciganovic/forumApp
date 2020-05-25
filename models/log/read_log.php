<?php
function read_log()
{
    $filename = 'data/log.txt';

    // Open the file
    $fp = @fopen($filename, 'r');

    $url_and_date = [];

    // Add each line to an array
    if ($fp) {
        $lines = explode("\n", fread($fp, filesize($filename)));

        array_pop($lines);

        // split each line by " "
        foreach($lines as $line){
            $line_items = explode("\t", $line);

            array_push($url_and_date, [
                "url" => $line_items[0],
                "date" => $line_items[1]
            ]);
        }
    }
    
    return $url_and_date;
}
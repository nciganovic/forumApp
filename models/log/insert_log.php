<?php
$url =  "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$current_time = time();
$myfile = file_put_contents('data/log.txt', $url . "\t" . $current_time . PHP_EOL , FILE_APPEND | LOCK_EX);

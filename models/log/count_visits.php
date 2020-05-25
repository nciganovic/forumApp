<?php 
require_once "read_log.php";

$log_array = read_log();

$urls_and_counts = [];
$urls_and_counts_ld = []; //last 24h
$used_items = [];
$total_visits = 0;

$last_day_timestamp = time() - (60 * 60 * 24);

for($i = 0; $i < count($log_array); $i++){

    $count_total = 0;
    $count_last_day = 0;

    if(in_array($log_array[$i]["url"], $used_items)){
        continue;
    }

    for($y = 0; $y < count($log_array); $y++){
        
        if($log_array[$i]["url"] == $log_array[$y]["url"]){
            $count_total += 1;
            $total_visits += 1;
        }

        if( $log_array[$i]["url"] == $log_array[$y]["url"] && 
            $log_array[$y]["date"] > $last_day_timestamp ){
                
                $count_last_day += 1;
        }

    }

    $new_arr = [
        "url" => $log_array[$i]["url"],
        "count" => $count_total
    ];

    $last_day_new_arr = [
        "url" => $log_array[$i]["url"],
        "count" => $count_last_day
    ];

    array_push($urls_and_counts, $new_arr);
    array_push($urls_and_counts_ld, $last_day_new_arr);
    array_push($used_items, $log_array[$i]["url"]);

}

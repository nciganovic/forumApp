<?php

// Basic setup
define("BASE_URL", "http://localhost/forumApp");
define("ABSOLUTE_PATH_APP", $_SERVER["DOCUMENT_ROOT"]."/forumApp"); //apsolute path for web app
define("ABSOLUTE_PATH_ENV", $_SERVER["DOCUMENT_ROOT"]."/dbinfo"); //apsolute path to .env file

// Rest of setup
define("ENV_FILE", ABSOLUTE_PATH_ENV."/.env");
define("LOG_FILE", ABSOLUTE_PATH_APP."/data/log.txt");
define("ADDRESS", ABSOLUTE_PATH_APP."/data/address.txt");
define("SEPARTOR", "&");

// Database setup
define("SERVER", env("SERVER"));
define("DATABASE", env("DBNAME"));
define("USERNAME", env("USERNAME"));
define("PASSWORD", env("PASSWORD"));




function env($name){
    // $podaci = explode("\n",file_get_contents(BASE_URL."/config/.env"));
    $open = fopen(ENV_FILE, "r");
    $data = file(ENV_FILE);
    $env_value = "";
    foreach($data as $key=>$value){
        $config = explode("=", $value);
        if($config[0]==$name){
            $env_value = trim($config[1]); // trim() zbog \n
        }
    }
    return $env_value;
}
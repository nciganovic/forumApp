<?php
require_once "../../config/connection.php";
require_once "get_bio.php";
    
// Create new COM object – word.application
try{
    $word = new COM("word.application");
}
catch(Exception $e){
    http_response_code(500);
}


// Hide MS Word application window
$word->Visible = 0;

//Create new document
$word->Documents->Add();

// Define page margins
$word->Selection->PageSetup->LeftMargin = '2';
$word->Selection->PageSetup->RightMargin = '2';

// Define font settings
$word->Selection->Font->Name = 'Arial';
$word->Selection->Font->Size = 12;

// Add text
$word->Selection->TypeText($bio[0]["text"]);

// Save document
$filename = tempnam(sys_get_temp_dir(), "word");
$word->Documents[1]->SaveAs($filename);

// Close and quit
$word->quit();
unset($word);

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document_name.doc");

http_response_code(202);

// Send file to browser
readfile($filename);
unlink($filename);
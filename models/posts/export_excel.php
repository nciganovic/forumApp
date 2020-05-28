<?php 
require_once "../../config/connection.php";
require_once "get_all_posts.php";

$excel_app = new COM("excel.application") or Die ("Konekcija sa Excel-om nije bila uspešna!");
$Workbook = $excel_app->Workbooks->Add();
$Worksheet = $Workbook->Worksheets('Sheet1');

//Set Width & Height
$excel_app->ActiveSheet->Range("A1:G1")->ColumnWidth = 20.0;

$excel_alphabet = ["A", "B", "C", "D", "E", "F", "G"]; //for creating A1, A2 etc..

$current_row = 1;

//Creating names for every column

$idx = 0;
$step = 1;
foreach($allPosts[0] as $key => $value){
    if($step % 2 == 0){
        $step += 1;
        continue;
    }

    $excel_col = $excel_alphabet[$idx] . $current_row;

    $polje = $Worksheet->Range($excel_col);
    $polje->activate;	
    $polje->Value = $key;

    $idx += 1;
    $step += 1;
}
$current_row += 1;

//Create rows from items in database

foreach($allPosts as $post){

    for($i = 0; $i < count($excel_alphabet); $i++){

        $excel_col = $excel_alphabet[$i] . $current_row;

        $polje = $Worksheet->Range($excel_col);
        $polje->activate;	
        $polje->Value = $post[$i];

    }

    $current_row += 1;

}

// Save document
$filename = tempnam(sys_get_temp_dir(), "xls");
try{
    $Workbook->_SaveAs($filename, -4143);
}
catch(Exception $e){
    die("Exporting failed.");
}

$Workbook->Save();
$Workbook->Saved = true;
$Workbook->Close;

unset($Worksheet);
unset($Workbook);	

$excel_app->Workbooks->Close();
$excel_app->Quit();

unset($excel_app);

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=all-posts.xls");

// Send file to browser
readfile($filename);
unlink($filename);

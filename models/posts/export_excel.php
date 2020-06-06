<?php 
require_once "../../config/connection.php";
require_once "get_all_posts.php";
require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

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
    
    $sheet->setCellValue($excel_col, $key);

    $idx += 1;
    $step += 1;
}
$current_row += 1;

//Create rows from items in database

foreach($allPosts as $post){

    for($i = 0; $i < count($excel_alphabet); $i++){
        
        $excel_col = $excel_alphabet[$i] . $current_row;

        $sheet->setCellValue($excel_col, $post[$i]);
    }

    $current_row += 1;

}

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=posts.xls");

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

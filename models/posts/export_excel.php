<?php 
$excel_aplikacija = new COM("Excel.application") or Die ("Konekcija sa Excel-om nije bila uspešna!");
$Workbook = $excel_aplikacija->Workbooks->Add();
$Worksheet = $Workbook->Worksheets('Sheet1');

$polje = $Worksheet->Range("A4");
$polje->activate;	
$polje->Value = "Pera 123";

// Save document
$filename = tempnam(sys_get_temp_dir(), "xls");
$Workbook->_SaveAs($filename, -4143);

$Workbook->Save();
$Workbook->Saved = true;
$Workbook->Close;

unset($Worksheet);
unset($Workbook);	

$excel_aplikacija->Workbooks->Close();
$excel_aplikacija->Quit();

unset($excel_aplikacija);

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=" . $filename . ".xls");

// Send file to browser
readfile($filename);
unlink($filename);

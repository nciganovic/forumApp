<?php

require_once "../../config/connection.php";
require_once "get_bio.php";
require_once '../../vendor/autoload.php';

// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();

/* Note: any element you append to a document must reside inside of a Section. */

// Adding an empty Section to the document...
$section = $phpWord->addSection();
// Adding Text element to the Section having font styled by default...

// Adding Text element with font customized inline...
$section->addText(
    $bio[0]["text"]
);

header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=author.doc");

// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');

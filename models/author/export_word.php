<?php
if(isset($_POST["bio"])){
    $bio = $_POST["bio"];
    
    // Create new COM object – word.application
    $word = new COM("word.application");

    // Hide MS Word application window
    $word->Visible = 0;

    //Create new document
    $word->Documents->Add();

    // Define page margins
    $word->Selection->PageSetup->LeftMargin = '2';
    $word->Selection->PageSetup->RightMargin = '2';

    // Define font settings
    $word->Selection->Font->Name = 'Arial';
    $word->Selection->Font->Size = 10;

    // Add text
    $word->Selection->TypeText("TEXT!");

    // Save document
    $filename = tempnam(sys_get_temp_dir(), "word");
    $word->Documents[1]->SaveAs($filename);

    // Close and quit
    $word->quit();
    unset($word);

    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=document_name.doc");

    // Send file to browser
    readfile($filename);
    unlink($filename);
        
    
    echo(json_encode([
        "bio" => $bio
    ]));
}


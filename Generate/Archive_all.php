<?php
  $file = "Archive/all_archives.zip";
  // if(!file_exists($file)){
    $zip = new ZipArchive();
    if ($zip->open($file,ZipArchive::CREATE) === TRUE) {
      foreach($db->query("Select * From tests")->fetchAll() as $testa_info){
        $file1 = "Archive/test".$testa_info['ID'].".zip";
        if(!file_exists($file1)){
          $testa = new Test($testa_info['ID']);
          $html_file = "HTML/test".$testa->getID().".html";
          $html_file_answers = "HTML/test_answers".$testa->getID().".html";
          $pdf_file = "PDF/test".$testa->getID().".pdf";
          $pdf_file_answers = "PDF/test_answers".$testa->getID().".pdf";
          $testa->generateHTMLTest($html_file);
          $testa->generatePDFTest($pdf_file);
          $testa->generatePDFAnswers($pdf_file_answers);
          $testa->generateHTMLAnswers($html_file_answers);
          $zip1 = new ZipArchive();
          if ($zip1->open($file1,ZipArchive::CREATE) === TRUE) {
            $zip1->addFile($html_file,substr($html_file,5,-1).substr($html_file,-1));
            $zip1->addFile($html_file_answers,substr($html_file_answers,5,-1).substr($html_file_answers,-1));
            $zip1->addFile($pdf_file,substr($pdf_file,4,-1).substr($pdf_file,-1));
            $zip1->addFile($pdf_file_answers,substr($pdf_file_answers,4,-1).substr($pdf_file_answers,-1));
          }
          $zip1->close();
        }
        $zip->addFile($file1,substr($file1,8,-1).substr($file1,-1));
      }
    }else{
        echo 'failed';
    } 
    $zip->close();
  // }
  if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
  }
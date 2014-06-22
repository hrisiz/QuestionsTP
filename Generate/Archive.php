<?php
  $test = new Test($_GET['test_id']);
  $html_file = "HTML/test".$test->getID().".html";
  $html_file_answers = "HTML/test_answers".$test->getID().".html";
  $pdf_file = "PDF/test".$test->getID().".pdf";
  $pdf_file_answers = "PDF/test_answers".$test->getID().".pdf";
  $file = "Archive/test".$test->getID().".zip";
  $test->generateHTMLTest($html_file);
  $test->generatePDFTest($pdf_file);
  $test->generatePDFAnswers($pdf_file_answers);
  $test->generateHTMLAnswers($html_file_answers);
  $zip = new ZipArchive();
  if ($zip->open($file,ZipArchive::CREATE) === TRUE) {
    $zip->addFile($html_file,substr($html_file,5,-1).substr($html_file,-1));
    $zip->addFile($html_file_answers,substr($html_file_answers,5,-1).substr($html_file,-1));
    $zip->addFile($pdf_file,substr($pdf_file,4,-1).substr($pdf_file,-1));
    $zip->addFile($pdf_file_answers,substr($pdf_file_answers,4,-1).substr($pdf_file,-1));
  }else{
      echo 'failed';
  } 
  $zip->close();
  closedir($handle);
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
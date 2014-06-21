<?php
  $test = new Test($_GET['test_id']);
  $html_file = "HTML/test".$test->getID().".html";
  // $pdf_file = "PDF/test".$test->getID().".pdf";
  $file = "Archive/test".$test->getID().".zip";
  $test->generateHTMLTest($html_file);
  $test->generatePDFTest($pdf_file);
  $zip = new ZipArchive();
  if ($zip->open($file,ZipArchive::CREATE) === TRUE) {
    $zip->addFile($html_file,substr($html_file,5,-1).substr($html_file,-1));
    // $zip->addFile($pdf_file,substr($pdf_file,4,-1).substr($pdf_file,-1));
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
<?php 
  foreach($db->query("Select * From tests")->fetchAll() as $test_info){
    $testa = new Test($test_info['ID']);
    $testa->clearTest();
  }
  header("Location: ?page=Pages_Home");
<?php 
  $testa = new Test($_GET['test_id']);
  $testa->clearTest();
  header("Location: ?page=Pages_Home");
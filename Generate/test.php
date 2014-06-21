<?php
  for($i=0;$i < $_POST['tests'];$i++){
    $test[$j] = new Test();
    // $test[$j]->generateAnswers();
  }
  header("Location: ?");
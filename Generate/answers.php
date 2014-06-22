<?php
  $test = new Test($_GET['test_id']);
  $test->setAnswers();
  header("Location: ?page=Pages_Home");
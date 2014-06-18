<?php
  $test = new Test();
  $test->generateQuestions();
  $test->generateAnswers();
  echo $test->getQuestionAnswer(0);
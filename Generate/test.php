<?php
  $test = new Test();
  $test->generateQuestions();
  $test->generateAnswers();
  $counter = 0;
  foreach($test->getQuestions() as $qustion){
    $counter++;
    echo "<div style=\"border:3px solid white\">";
      // echo"<p>Question $counter:<br>";
      // echo $qustion->getQuestion("HTML");
      // echo"</p>";
      // echo"<p>Answer:";
      print_r($test->getQuestionAnswer($counter-1));
      echo $test->getQuestionAnswer($counter-1)[0];
      // echo"</p>";
    echo "</div>";
  }
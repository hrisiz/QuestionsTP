<?php
  $test = new Test();
  $test->generateQuestions();
  $test->generateAnswers();
  $counter = 0;
  foreach($test->getQuestions() as $qustion){
    $counter++;
    echo "<div style=\"border:3px solid white\">";
      echo"<p>Question $counter:<br>";
      echo $qustion->getQuestion("HTML");
      echo"</p>";
      echo"<p>Answer:";
      echo $test->getQuestionAnswer(0);
      echo"</p>";
    echo "</div>";
  }
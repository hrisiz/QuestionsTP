<?php
  for($j = 1;$j <= $_POST['tests'];$j++){
    echo"<h2>Test $j</h2>";
    $test = new Test();
    $test->generateQuestions();
    $test->generateAnswers();
   
    echo "<table style=\"margin-left:auto;margin-right:auto;\">";
    for($i=0;$i < count($test->getQuestions());$i+=2){
        echo"<tr><td style=\"border:2px solid white\">";
        echo $test->getQuestions()[$i]->getQuestion("HTML");
        echo"<br>";
        echo"Answer:";
        echo $test->getQuestions()[$i]->getAnswer()->getAnswer();
        echo"</td>";
        echo"<td style=\"border:2px solid white\">";
        echo $test->getQuestions()[$i+1]->getQuestion("HTML");
        echo"<br>";
        echo"Answer:";
        echo $test->getQuestions()[$i+1]->getAnswer()->getAnswer();
        echo"</td></tr>";
    }
    echo "</table>";
  } 
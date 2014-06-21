<?php
  for($j = 1;$j <= $_POST['tests'];$j++){
    echo"<h2>Test $j</h2>";
    $test[$j] = new Test(2);
    // $test[$j] = new Test();
    // $test[$j]->generateQuestions();
    $test[$j]->generateAnswers();
   
    echo "<table style=\"margin-left:auto;margin-right:auto;\">";
    for($i=0;$i < count($test[$j]->getQuestions());$i+=2){
        echo"<tr><td style=\"text-align:left;vertical-align:top;border:2px solid white\">";
        echo $test[$j]->getQuestions()[$i]->getQuestion("HTML");
        echo"<br>";
        echo"Answer:";
        echo $test[$j]->getQuestions()[$i]->getAnswer()->getAnswer();
        echo"</td>";
        echo"<td style=\"text-align:left;vertical-align:top;border:2px solid white\">";
        echo $test[$j]->getQuestions()[$i+1]->getQuestion("HTML");
        echo"<br>";
        echo"Answer:";
        echo $test[$j]->getQuestions()[$i+1]->getAnswer()->getAnswer();
        echo"</td></tr>";
    }
    echo "</table>";
  } 
// $questions = generateQuestions();
// foreach($questions as $question){
  // echo $question->getQuestion("HTML")."<br><br>";
// }
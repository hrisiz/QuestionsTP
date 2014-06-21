<?php
function generateNumber($type,$difficulty,$count){
  switch($type){
    case "Hex":
      if($difficulty == "Easy")
        $numbers = array("F","0");
      else
        $numbers = array("0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F");
      break;
    case "Numbers":
      $numbers = array("1","2","3","4","5","6","7","8","9");
      break;
    default:
      $numbers = array("1","2","3","4","5","6","7","8","9");
  }
  $result = "";
  for($i=0;$i < $count;$i++){
    $result .= $numbers[array_rand($numbers)];
  }
  return $result; 
}
function generateShift($difficulty){
  switch($difficulty){
    case "Easy":
        $numbers = array(4,8);
      break;
    case "Hard":
      $numbers = array(3,4+rand(1,3),8+rand(1,4));
      break;
    default:
      $numbers = array(3,4+rand(1,3),8+rand(1,4));
  }
  $result = $numbers[array_rand($numbers)];
  return $result; 
}
function generateQuestions(){
  $type = "result = %X";
  $questions[0] = "";
  $left = generateShift("Easy");
  $a = generateNumber("Hex","Easy",4);
  $b = generateNumber("Hex","Easy",4);
  $questions[0] .= "int a = 0x$a;\n";
  $questions[0] .= "int b = 0x$b;\n";
  $questions[0] .= "int result = a | (b << $left);\n";
  $questions[0] .= "printf(\"$type\\\\n\",result);\n";
  
  $questions[1] = "";
  $left = generateShift("Hard");
  $a = generateNumber("Hex","Easy",8);
  $b = generateNumber("Hex","Easy",8);
  $questions[1] .= "int a = 0x$a;\n";
  $questions[1] .= "int b = 0x$b;\n";
  $questions[1] .= "int result = a | (b << $left);\n";
  $questions[1] .= "printf(\"$type\\\\n\",result);\n";
  
  $questions[2] = "";
  $left = generateShift("Easy");
  $a = generateNumber("Hex","Hard",4);
  $b = generateNumber("Hex","Hard",4);
  $questions[2] .= "\tint a = 0x$a;\n";
  $questions[2] .= "\tint b = 0x$b;\n";
  $questions[2] .= "\tint a1 = a | (b << $left);\n";
  $left = generateShift("Easy");
  $questions[2] .= "\tint b1 = a | (b << $left);\n";
  $questions[2] .= "\tint result = a1 & b1;\n";
  $questions[2] .= "\tprintf(\"$type\\\\n\",result);";
  
  $questions[3] = "";
  $left = generateShift("Hard");
  $a = generateNumber("Hex","Hard",4);
  $b = generateNumber("Hex","Hard",4);
  $questions[3] .= "\tint a = 0x$a;\n";
  $questions[3] .= "\tint b = 0x$b;\n";
  $questions[3] .= "\tint a1 = a | (b << $left);\n";
  $left = generateShift("Hard");
  $questions[3] .= "\tint b1 = a | (b << $left);\n";
  $questions[3] .= "\tint result = a1 & b1;\n";
  $questions[3] .= "\tprintf(\"$type\\\\n\",result);";
  
  $questions[4] = "";
  $left = generateShift("Hard");
  $a = generateNumber("Hex","Hard",4);
  $b = generateNumber("Hex","Hard",4);
  $questions[4] .= "\tint a = 0x$a;\n";
  $questions[4] .= "\tint b = 0x$b;\n";
  $questions[4] .= "\tint a1 = a | (b << $left);\n";
  $left = generateShift("Hard");
  $questions[4] .= "\tint b1 = a | (b << $left);\n";
  $questions[4] .= "\tint result = a1 ^ b1;\n";
  $questions[4] .= "\tprintf(\"$type\\\\n\",result);";
  
  $questions[5] = "";
  $left = generateShift("Hard");
  $a = generateNumber("Hex","Hard",4);
  $questions[5] .= "\tint a1 = 0x$a;\n";
  $questions[5] .= "\tint result = a1 << $left;\n";
  $questions[5] .= "\tprintf(\"$type\\\\n\",result);";
  
  $questions[6] = "";
  $left = generateShift("Hard");
  $a = generateNumber("Hex","Hard",8);
  $b = generateNumber("Hex","Hard",8);
  $questions[6] .= "\tlong la = 0x$a;\n";
  $questions[6] .= "\tlong lb = 0x$b;\n";
  while(($right = generateShift("Hard")) == $left);
  $questions[6] .= "\tint result = (la << $left) ^ (lb >> $right);\n";
  $questions[6] .= "\tprintf(\"$type\\\\n\",result);";
  
  $questions[7] = "";
  $type = "result = %d";
  $left = generateShift("Hard");
  $a = generateNumber("Numbers","Hard",3);
  $b = generateNumber("Numbers","Hard",3);
  $questions[7] .= "\tlong a = $a;\n";
  $questions[7] .= "\tlong b = $b;\n";
  while(($right = generateShift("Hard")) == $left);
  $questions[7] .= "\tint result = (a << $left) ^ (b >> $right);\n";
  $questions[7] .= "\tprintf(\"$type\\\\n\",result);";
  
  $questions[8] = "";
  $left = generateShift("Hard");
  $a = generateNumber("Hex","Hard",8);
  $questions[8] .= "\tlong la = 0x$a;\n";
  $questions[8] .= "\tint result = 0;\n";
  $questions[8] .= "\tif(la & (1 << $left))\n";
  $questions[8] .= "\tresult = 1;\n";
  $questions[8] .= "\telse\n";
  $questions[8] .= "\tresult = 2;\n";
  $questions[8] .= "\tprintf(\"$type\\\\n\",result);";
  
  $questions[9] = "";
  $type2 = "result1 = %X";
  $left = generateShift("Hard");
  $a = generateNumber("Hex","Hard",8);
  $questions[9] .= "\tlong la = 0x$a;\n";
  $questions[9] .= "\tint result = 0;\n";
  $questions[9] .= "\tint result1 = 0;\n";
  $questions[9] .= "\tif((result = la & la ^ la | (1 << $left)))\n";
  $questions[9] .= "\tresult1 = 1;\n";
  $questions[9] .= "\telse\n";
  $questions[9] .= "\tresult1 = 2;\n";
  $questions[9] .= "\tprintf(\"$type,$type2\\\\n\",result,result1);";
  
  $questions[10] = "";
  $left = generateShift("Hard");
  $a = generateNumber("Numbers","Hard",3);
  $b = generateNumber("Numbers","Hard",3);
  $questions[10] .= "\tlong la = $a;\n";
  $questions[10] .= "\tlong lb = $b;\n";
  while(($right = generateShift("Hard")) == $left);
  $questions[10] .= "\tint result = (la << $left) ^ (lb >> $right);\n";
  $questions[10] .= "\tprintf(\"$type\\\\n\",result);";
  
  $questions[11] = "";
  $left = generateShift("Hard");
  $a = generateNumber("Numbers","Hard",3);
  $b = generateNumber("Numbers","Hard",3);
  $questions[11] .= "\tlong la = $a;\n";
  $questions[11] .= "\tlong lb = $b;\n";
  while(($right = generateShift("Hard")) == $left);
  $questions[11] .= "\tint result = (la << $left) ^ (lb >> $right);\n";
  $questions[11] .= "\tprintf(\"$type\\\\n\",result);";
  for($i=0;$i<12;$i++){
    $questions[$i] = new Question($questions[$i]);
  }
  return $questions;
}
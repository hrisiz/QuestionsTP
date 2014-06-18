<?php
  class Test{
    private $questions;
    private function GenerateQuestionCode($number){
      $result = "";
      srand(time());
      switch($number){
        case 0:
          
          break;
        case 1:
          
          break;
      }
      return $result;
    }
    public function __construct(){
      $this->questions = array(new Question(),new Question(),new Question(),new Question(),new Question(),new Question(),new Question(),new Question(),new Question(),new Question(),new Question(),new Question());
    }
    public function generateQuestions(){
      $type = "result = %X";
      $code = "";
      $arr = array(4,8);
      $arr1 = array("F","0");
      $left = $arr[array_rand($arr)];
      $a = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $b = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $code .= "int a = 0x$a;\n";
      $code .= "int b = 0x$b;\n";
      $code .= "int result = a | (b << $left);\n";
      $code .= "printf(\"$type\",result);\n";
      $this->questions[0]->setQuestion($code);
      
      $code = "";
      $arr = array(3,4+rand(1,3),8+rand(1,4));
      $left = $arr[array_rand($arr)];
      $code .= "int a = 0x$a;\n";
      $code .= "int b = 0x$b;\n";
      $code .= "int result = a | (b << $left);\n";
      $code .= "printf(\"$type\",result);\n";
      $this->questions[1]->setQuestion($code);
      
      $code = "";
      $arr = array(4,8);
      $arr1 = array("0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F");
      $left = $arr[array_rand($arr)];
      $a = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $b = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $code .= "\tint a = 0x$a;\n";
      $code .= "\tint b = 0x$b;\n";
      $code .= "\tint a1 = a | (b << $left);\n";
      while(($left1 = $arr[array_rand($arr)]) == $left);
      $code .= "\tint b1 = a | (b << $left1);\n";
      $code .= "\tint result = a1 & b1;\n";
      $code .= "\tprintf(\"$type\",result);";
      $this->questions[2]->setQuestion($code);
      
      $code = "";
      $arr = array(3,4+rand(1,3),8+rand(1,4));
      $left = $arr[array_rand($arr)];
      $a = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $b = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $code .= "\tint a = 0x$a;\n";
      $code .= "\tint b = 0x$b;\n";
      $code .= "\tint a1 = a | (b << $left);\n";
      while(($left1 = $arr[array_rand($arr)]) == $left);
      $code .= "\tint b1 = a | (b << $left1);\n";
      $code .= "\tint result = a1 & b1;\n";
      $code .= "\tprintf(\"$type\",result);";
      $this->questions[3]->setQuestion($code);
      
      $code = "";
      $left = $arr[array_rand($arr)];
      $a = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $b = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $code .= "\tint a = 0x$a;\n";
      $code .= "\tint b = 0x$b;\n";
      $code .= "\tint a1 = a | (b << $left);\n";
      while(($left1 = $arr[array_rand($arr)]) == $left);
      $code .= "\tint b1 = a | (b << $left1);\n";
      $code .= "\tint result = a1 ^ b1;\n";
      $code .= "\tprintf(\"$type\",result);";
      $this->questions[4]->setQuestion($code);
      
      $code = "";
      $left = $arr[array_rand($arr)];
      $a = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $code .= "\tint a1 = 0x$a;\n";
      $code .= "\tint result = a1 << $left;\n";
      $code .= "\tprintf(\"$type\",result);";
      $this->questions[5]->setQuestion($code);
      
      $code = "";
      $left = $arr[array_rand($arr)];
      $a = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $b = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $code .= "\tlong a = 0x$a;\n";
      $code .= "\tlong b = 0x$b;\n";
      while(($right = $arr[array_rand($arr)]) == $left);
      $code .= "\tint result = (a << $left) ^ (b >> $right);\n";
      $code .= "\tprintf(\"$type\",result);";
      $this->questions[6]->setQuestion($code);
      
      $code = "";
      $type = "result = %d";
      $left = $arr[array_rand($arr)];
      $a = rand(0,999);
      $b = rand(0,999);
      $code .= "\tlong a = $a;\n";
      $code .= "\tlong b = $b;\n";
      while(($right = $arr[array_rand($arr)]) == $left);
      $code .= "\tint result = (a << $left) ^ (b >> $right);\n";
      $code .= "\tprintf(\"$type\",result);";
      $this->questions[7]->setQuestion($code);
      
      $code = "";
      $left = $arr[array_rand($arr)];
      $a = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $code .= "\tlong a = 0x$a;\n";
      $code .= "\tint result = 0;\n";
      $code .= "\tif(a & (1 << $left))\n";
      $code .= "\tresult = 1;\n";
      $code .= "\telse\n";
      $code .= "\tresult = 2;\n";
      while(($right = $arr[array_rand($arr)]) == $left);
      $code .= "\tprintf(\"$type\",result);";
      $this->questions[8]->setQuestion($code);
      
      $code = "";
      $type2 = "result1 = %X";
      $left = $arr[array_rand($arr)];
      $a = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $code .= "\tlong a = 0x$a;\n";
      $code .= "\tint result = 0;\n";
      $code .= "\tint result1 = 0;\n";
      $code .= "\tif((result = a & a ^ a | (1 << $left)))\n";
      $code .= "\tresult1 = 1;\n";
      $code .= "\telse\n";
      $code .= "\tresult1 = 2;\n";
      $code .= "\tprintf(\"$type,$type2\",result,result1);";
      $this->questions[9]->setQuestion($code);
      
      $code = "";
      $left = $arr[array_rand($arr)];
      $a = rand(0,999);
      $b = rand(0,999);
      $code .= "\tlong a = $a;\n";
      $code .= "\tlong b = $b;\n";
      while(($right = $arr[array_rand($arr)]) == $left);
      $code .= "\tint result = (a << $left) ^ (b >> $right);\n";
      $code .= "\tprintf(\"$type\",result);";
      $this->questions[10]->setQuestion($code);
      
      $code = "";
      $left = $arr[array_rand($arr)];
      $a = rand(0,999);
      $b = rand(0,999);
      $code .= "\tlong a = $a;\n";
      $code .= "\tlong b = $b;\n";
      while(($right = $arr[array_rand($arr)]) == $left);
      $code .= "\tint result = (a << $left) ^ (b >> $right);\n";
      $code .= "\tprintf(\"$type\",result);";
      $this->questions[11]->setQuestion($code);
    }
    public function generateAnswers(){
      foreach($this->questions as $question){
        $question->genAnswer();
      }
    }
    public function getQuestions(){
      return $this->questions;
    }
    public function getQuestionAnswer($number){
      return $this->questions[$number]->getAnswer()->getAnswer();
    }
    public function generatePDFTests(){
      return 1;
    }
    public function generatePDFAnswers(){
      return 1;
    }
    public function generateHTMLTests(){
      return 1;    
    }
    public function generateHTMLAnswers(){
      return 1;    
    }
  }
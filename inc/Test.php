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
      $this->questions = array(new Question(),new Question(),new Question());
    }
    public function generateQuestions(){
      $type = "%X";
      $code = "";
      $arr = array(4,8,16);
      $arr1 = array("F","0");
      $left = $arr[array_rand($arr)];
      $orig = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $insert = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $code .= "int orig = 0x$orig;\n";
      $code .= "int insert = 0x$insert;\n";
      $code .= "int result = orig | (insert << $left);\n";
      $code .= "printf(\"$type\",result);\n";
      $this->questions[0]->setQuestion($code);
      
      $code = "";
      $arr = array(3,4+rand(1,3),8+rand(1,7));
      $left = $arr[array_rand($arr)];
      $code .= "int orig = 0x$orig;\n";
      $code .= "int insert = 0x$insert;\n";
      $code .= "int result = orig | (insert << $left);\n";
      $code .= "printf(\"$type\",result);\n";
      $this->questions[1]->setQuestion($code);
      
      $code = "";
      $arr = array(3,4+rand(1,3),8+rand(1,7));
      $arr1 = array("0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F");
      $left = $arr[array_rand($arr)];
      $orig = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $insert = $arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)].$arr1[array_rand($arr1)];
      $code .= "\tint orig = 0x$orig;\n";
      $code .= "\tint insert = 0x$insert;\n";
      $code .= "\tint result = orig | (insert << $left);\n";
      while(($left1 = $arr[array_rand($arr)]) != $left);
      $code .= "\tint result = orig | (insert << $left1);\n";
      $code .= "\tint result = a & b;\n";
      $code .= "\tprintf(\"$type\",result);";
      $this->questions[2]->setQuestion($code);
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
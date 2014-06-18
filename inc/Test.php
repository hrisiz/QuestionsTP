<?php
  class Test{
    private $questions;
    private function GenerateQuestionCode(){
      $type = "%X";
      $result = "";
      $result .= "int orig = 0xF0F0;";
      $result .= "int insert = 0x000A;";
      $result .= "int result = orig | (insert << 8);";
      $result .= "printf(\"$type\",result);";
      return $result;
    }
    public function __construct(){
      $this->questions = array_fill(0,12,new Question());
    }
    public function generateQuestions(){
      foreach($this->questions as $question){
        $code = $this->GenerateQuestionCode();
        $question->setQuestion($code);
      }
    }
    public function generateAnswers(){
      foreach($this->questions as $question){
        $question->genAnswer();
      }
    }
    public function getQuestion($number){
      return $this->questions[$number]->getQuestion();
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
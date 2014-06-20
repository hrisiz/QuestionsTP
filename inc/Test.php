<?php
  class Test{
    private $id;
    private $questions;
    public function generateQuestions(){
      
      $this->questions = generateQuestions();
    }
    public function generateAnswers(){
      $code = "#include<stdio.h>\nint main(){\n".$question->getQuestion("Code")."\treturn 0;\n}";
      file_put_contents("c/"..".c",$code,FILE_APPEND)
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
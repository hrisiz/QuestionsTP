<?php
  class Test{
    private $id;
    private $questions = array();
    public function generateQuestions(){
      global $db;
      $db->beginTransaction();
      $db->exec("Insert Into tests(`GeneratedDate`) values('".date("Y-m-d h:i:s",time())."')");
      $this->questions = generateQuestions();
      $id = $db->query("Select MAX(ID) From tests")->fetch();
      $this->id = $id[0];
      foreach($this->questions as $question){
        $db->exec("INSERT INTO questions(`TestID`, `Question`) VALUES (".$this->id.",'".$question->getQuestion()."')");
      }
      $db->commit();
    }
    public function __construct($id){
      if(isset($id)){
        global $db;
        $this->id=$id;
        $questions = $db->query("Select Question From questions Where TestID=".$this->id."")->fetchAll();
        foreach($questions as $question){
          array_push($this->questions, new Question($question['Question']));
        }
      }
    }
    public function generateAnswers(){
      $code = "#include<stdio.h>\nint main(){";
      file_put_contents("c/test".$this->id.".c",$code);
      foreach($this->questions as $question){
        file_put_contents("c/test".$this->id.".c",$question->getQuestion(),FILE_APPEND);
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
    public function clearTest(){
      $db->beginTransaction();
      $db->exec("Delete From tests where ID='".$this->id."'");
      $db->exec("Delete From questions where TestID='".$this->id."'");
      $db->exec("Delete From questions where TestID='".$this->id."'");
      $db->commit();
    }
  }
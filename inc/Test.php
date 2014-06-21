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
        $used_variables = array();
        foreach($questions as $question){
          $ready_question = "";
          foreach(explode("\n",$question['Question']) as $quetion_row){
            if(preg_match('/int /',$quetion_row,$matches,PREG_OFFSET_CAPTURE) || preg_match('/(\b|\w)long /',$quetion_row,$matches,PREG_OFFSET_CAPTURE)){
              $variable = explode("=",$quetion_row);
              if($matches[0][0] == "int "){
                $shift = 4;
              }else{
                $shift = 5;
              }
              $variable = substr($variable[0],$matches[0][1]+$shift,-1);
              if(in_array($variable,$used_variables)){
                $ready_question .= substr($quetion_row,$matches[0][1]+$shift,-1)."\n";
              }else{
                array_push($used_variables,$variable);
                $ready_question .= $quetion_row."\n";
              }
            }else{
              $ready_question .= $quetion_row."\n";
            }
          }
          array_push($this->questions, new Question($ready_question));
        }
      }
    }
    public function generateAnswers(){
      $code = "#include<stdio.h>\nint main(){";
      file_put_contents("c/test".$this->id.".c",$code);
      foreach($this->questions as $question){
        file_put_contents("c/test".$this->id.".c",$question->getQuestion(),FILE_APPEND);
      } 
      $code = "return 0;\n}";
      file_put_contents("c/test".$this->id.".c",$code,FILE_APPEND);
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
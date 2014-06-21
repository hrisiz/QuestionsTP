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
        $question_id = $db->query("Select MAX(ID) From questions")->fetch();
        $question->setId($question_id[0]);
      }
      $db->commit();
    }
    public function __construct($id){
      if(isset($id)){
        global $db;
        $this->id=$id;
        $questions = $db->query("Select ID,Question From questions Where TestID=".$this->id."")->fetchAll();
        
        foreach($questions as $question){
          array_push($this->questions, new Question($question['Question'],$question['ID']));
        }
      }else{
        $this->generateQuestions();
      }
    }
    private function generateCFile(){
      $code = "#include<stdio.h>\nint main(){";
      file_put_contents("c/test".$this->id.".c",$code);
      $used_variables = array();
      foreach($this->questions as $question){
        $ready_question = "";
        foreach(explode(";\n",$question->getQuestion()) as $quetion_row){
          if(preg_match('/int /',$quetion_row,$matches,PREG_OFFSET_CAPTURE) || preg_match('/(\b|\w)long /',$quetion_row,$matches,PREG_OFFSET_CAPTURE)){
            $variable = explode("=",$quetion_row);
            if($matches[0][0] == "int "){
              $shift = 4;
            }elseif($matches[0][0] == "long "){
              $shift = 5;
            }
            $variable = substr($variable[0],$matches[0][1]+$shift,-1);
            if(in_array($variable,$used_variables)){
              $ready_question .= substr($quetion_row,$matches[0][1]+$shift,-1).substr($quetion_row,-1).";"."\n";
              echo $quetion_row[-1];
            }else{
              array_push($used_variables,$variable);
              $ready_question .= $quetion_row.";\n";
            }
          }else{
            $ready_question .= $quetion_row.";\n";
          }
        }
        
        file_put_contents("c/test".$this->id.".c",$ready_question,FILE_APPEND);
      } 
      $code = "return 0;\n}";
      file_put_contents("c/test".$this->id.".c",$code,FILE_APPEND);
    }
    public function generateAnswers(){
      global $db;
      $this->generateCFile();
      $retval;
      system("cd c & gcc test".$this->id.".c -o test".$this->id."",$retval);
      exec("cd c & test".$this->id.".exe",$retval);
      $counter = 0;
      $db->beginTransaction();
      foreach($retval as $answer){
        echo "";
        $this->questions[$counter]->setAnswer($answer);
        $answer_db = $db->query("Select * From Answers  Where QuestionID=".$this->questions[$counter]->getID()." AND TestID=".$this->id."")->fetchAll();
        if(count($answer_db) > 0){
          $answer_db = $answer_db[0];
          $db->exec("Update Answers Set Answer='".$this->questions[$counter]->getAnswer()->getAnswer()."' Where ID=".$answer_db['ID']."");
        }else{
          $db->exec("Insert Into Answers(`QuestionID`,`TestID`,`Answer`)values(".$this->questions[$counter]->getID().",".$this->id.",'".$this->questions[$counter]->getAnswer()->getAnswer()."')");
        }
        $counter++;
      }
      $db->commit();
    }
    public function getQuestions(){
      return $this->questions;
    }
    public function getID(){
      return $this->id;
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
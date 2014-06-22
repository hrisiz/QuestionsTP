<?php
  class Question{
    private $id;
    private $question;
    private $answer; 
    public function __construct($val,$id){
      if($id){
        $this->id = $id;
        global $db;
        $questions_info = $db->query("Select * From answers Where QuestionID=".$this->id."")->fetch();
        $answer = new Answer($questions_info['Answer'],$questions_info['ID']);
      }else{
        $answer = new Answer("No Answer");
      }
      $this->question = $val;
      $this->answer = $answer;
    }
    public function setAnswer($answer){
      $this->answer->setAnswer($answer,$id);
    }
    public function setId($id){
      $this->id = $id;
    }
    public function getID(){
      return $this->id;
    }
    public function getAnswer(){
      return $this->answer;
    }
    public function getQuestion($type){
      $result = "";
      $ex = explode("printf(\"",$this->question);
      $ex = explode(')',$ex[1]);
      $ex = explode("\",",$ex[0]);
      $end .= preg_replace("/((%X|%d)\\\\n|(%X|%d))/",".....................\n",$ex[0]);
      $end = preg_replace('/,/',"\n",$end);
      preg_match('/printf/',$this->question,$matches,PREG_OFFSET_CAPTURE);
      $ready = $end."\n";
      $ready .= substr($this->question,0,$matches[0][1]);
      switch($type){
        case "HTML":
          $result = str_replace("\n","<br>",$ready);
          break;
        case "PDF":
          $result = $ready;
          break;
        case "Code":
          $result = $this->question;
          break;
        default:
          $result = $this->question;
      }
      return $result;
    }
  }
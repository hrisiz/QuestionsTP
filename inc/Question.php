<?php
  class Question{
    private $question;
    private $answer; 
    public function __construct($val){
      $this->question = $val;
      $this->answer = new Answer("No Answer");
    }
    public function setAnswer($answer){
      $this->answer->setAnswer($answer);
    }
    public function getAnswer(){
      return $this->answer;
    }
    public function getQuestion($type){
      $result = "";
      $ex = explode("printf(\"",$this->question);
      $ex = explode(')',$ex[1]);
      $ex = explode("\",",$ex[0]);
      $end = "\n";
      $end .= preg_replace('/%X|%d/','?',$ex[0]);
      $end = preg_replace('/,/',"\n",$end);
      preg_match('/printf/',$this->question,$matches,PREG_OFFSET_CAPTURE);
      $ready = substr($this->question,0,$matches[0][1]);
      $ready .= $end;
      switch($type){
        case "HTML":
          $result = str_replace("\n","<br>",$ready);
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
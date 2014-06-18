<?php
  class Question{
    private $question;
    private $answer;
    public function setQuestion($val){
      $this->question = $val;
      $this->answer = new Answer("Empty(No Answer)");
    }
    public function genAnswer(){
      $this->answer->genAnswer($this);
    }
    public function getAnswer(){
      return $this->answer;
    }
    public function getQuestion($type){
      switch($type){
        case "HTML":
          $result = str_replace("\n","<br>",$this->question);
          break;
        default:
          $result = $this->question;
      }
      return $result;
    }
  }
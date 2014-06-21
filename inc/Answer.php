<?php
  class AnswerException extends Exception { }
  class Answer{
    private $id;
    private $answer;
    public function __construct($answer,$id){
      $this->setAnswer($answer,$id);
    }
    public function setAnswer($answer,$id){
      $this->answer = $answer;
      if($id)
        $this->id = $id;
    }
    public function getAnswer($type){
      switch($type){
        case "HTML":
          $result = preg_replace('/,/',"<br>",$this->answer);
          break;
        case "Code":
          $result = $this->answer;
          break;
        default:
          $result = $this->answer;
      }
      return $result;
    }
  }
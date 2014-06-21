<?php
  class AnswerException extends Exception { }
  class Answer{
    private $answer;
    public function __construct($answer){
      $this->answer = $answer;
    }
    public function setAnswer($answer){
      $this->answer = $answer;
    }
    public function getAnswer(){
      return $this->answer;
    }
  }
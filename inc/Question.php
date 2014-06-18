<?php
  class Question{
    private $question;
    private $answer;
    public function __construct($val){
      $this->question = $val;
      $this->answer = new Answer($question);
    }
    public function getAnswer(){
      return $this->answer;
    }
    public function getQuestion(){
      return $this->question;
    }
  }
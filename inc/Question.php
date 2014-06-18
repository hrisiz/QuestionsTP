<?php
  class Question{
    private $question;
    private $answer;
    public function __constructor($val){
      self::$question = $val;
      self::$answer = new Answer($question);
    }
    public static function getAnswer(){
      return self::$answer;
    }
    public static function getQuestion(){
      return self::$question;
    }
  }
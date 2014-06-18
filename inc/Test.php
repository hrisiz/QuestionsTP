<?php
  class Test{
    public static $questions;
    
    public function __constructor(){
      setQuestion();
    }
    public function setQuestion(){
       $this->questions = array_fill(0,12,"xaxa");
    }
    public static function getQuestion($number){
      echo self::$questions[$number];
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
  }
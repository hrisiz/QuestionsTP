<?php
  class Test{
    private $questions;
    
    public function __construct(){
      $this->questions = array_fill(0,12,new Question("xaxa"));
    }
    public function getQuestion($number){
      echo $this->questions[$number]->getQuestion();
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
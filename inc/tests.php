<?php
  class Test{
    private $tests;
    private $questions;
    
    public __constructor(){
      $questions = 12;
    }
    public __constructor($val){
      $test = $val;
      $questions = 12;
    }
    public setTests($val){
      $tests = $val;
    }
    public setQuestions($val){
      $questions = $val;
    }
    public generatePDFTests(){
      return 1;
    }
    public generatePDFAnswers(){
      return 1;
    }
    public generateHTMLTests(){
      return 1;    
    }
    public generateHTMLAnswers(){
      return 1;    
    }
  }
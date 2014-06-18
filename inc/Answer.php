<?php
  class Answer{
    private $answer;
    public function __construct($qustion){
      $this->answer = genAnswer($qustion);
    }
    public function getAnswer(){
      if(empty($this->answer)){
        throw new Execption("Empty Answer");
      }
      return $this->answer;
    }
    public function genAnswer($qustion){
      if(empty($this->answer)){
        throw new Execption("Empty Answer");
      }
      $code = "
        #include<stdio.h>
        
        int main(){
          ".$this->qustion."
          return 0;
        }
      ";
      $retval = 0;
      if(file_put_contents("getanswer.c",$code)){
        system ("gcc getanswer.c",$retval);
      }else{
        throw new Execption("Generate Question's Answer problem.");
      }
      return $retval;
    }
  }
<?php
  class AnswerException extends Exception { }
  class Answer{
    private $answer;
    public function __construct($answer){
      $this->answer = $answer;
    }
    public function genAnswer($question){
      $code = "#include<stdio.h>\nint main(){\n".$question->getQuestion("Code")."\treturn 0;\n}";
      $retval = 0;
      if(file_put_contents("c/getanswer.c",$code)){
        system("cd c & gcc getanswer.c",$retval);
        if($retval == 0){
          exec("cd c & a.exe",$retval);
          $this->answer = $retval[0];
        }
      } 
    }
    public function getAnswer(){
      return $this->answer;
    }
  }
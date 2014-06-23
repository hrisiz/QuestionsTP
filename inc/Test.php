<?php
  class Test{
    private $id;
    private $questions = array();
    public function generateQuestions(){
      global $db;
      $db->beginTransaction();
      $db->exec("Insert Into tests(`GeneratedDate`) values('".date("Y-m-d h:i:s",time())."')");
      $questions = generateQuestions();
      $id = $db->query("Select MAX(ID) From tests")->fetch();
      $this->id = $id[0];
      foreach($questions as $question){
        $db->exec("INSERT INTO questions(`TestID`, `Question`) VALUES (".$this->id.",'".$question->getQuestion()."')");
        $question_id = $db->query("Select MAX(ID) From questions")->fetch();
        $question->setId($question_id[0]);
      }
      $db->commit();
      $this->setQuestions();
    }
    public function __construct($id){
      if(isset($id)){
        $this->id=$id;
        $this->setQuestions();
      }else{
        $this->generateQuestions();
      }
    }
    private function setQuestions(){
      global $db;
      $questions = $db->query("Select ID,Question From questions Where TestID=".$this->id."")->fetchAll();
      
      foreach($questions as $question){
        array_push($this->questions, new Question($question['Question'],$question['ID']));
      }
    }
    private function generateCFile(){
      $code = "#include<stdio.h>\nint main(){";
      file_put_contents("c/test".$this->id.".c",$code);
      $used_variables = array();
      foreach($this->questions as $question){
        $ready_question = "";
        foreach(explode(";\n",$question->getQuestion()) as $quetion_row){
          if(preg_match('/int /',$quetion_row,$matches,PREG_OFFSET_CAPTURE) || preg_match('/(\b|\w)long /',$quetion_row,$matches,PREG_OFFSET_CAPTURE)){
            $variable = explode("=",$quetion_row);
            if($matches[0][0] == "int "){
              $shift = 4;
            }elseif($matches[0][0] == "long "){
              $shift = 5;
            }
            $variable = substr($variable[0],$matches[0][1]+$shift,-1);
            if(in_array($variable,$used_variables)){
              $ready_question .= substr($quetion_row,$matches[0][1]+$shift,-1).substr($quetion_row,-1).";"."\n";
              echo $quetion_row[-1];
            }else{
              array_push($used_variables,$variable);
              $ready_question .= $quetion_row.";\n";
            }
          }else{
            $ready_question .= $quetion_row.";\n";
          }
        }
        file_put_contents("c/test".$this->id.".c",$ready_question,FILE_APPEND);
      } 
      $code = "return 0;\n}";
      file_put_contents("c/test".$this->id.".c",$code,FILE_APPEND);
    }
    public function generateAnswers(){
      global $db;
      $this->generateCFile();
      $retval;
      system("cd c & gcc test".$this->id.".c -o test".$this->id."",$retval);
      if($retval == 0){
        exec("cd c & test".$this->id.".exe",$retval);
        $counter = 0;
        $db->beginTransaction();
        foreach($retval as $answer){
          echo "";
          $this->questions[$counter]->setAnswer($answer);
          $answer_db = $db->query("Select * From Answers Where QuestionID=".$this->questions[$counter]->getID()." AND TestID=".$this->id."")->fetchAll();
          if(count($answer_db) > 0){
            $answer_db = $answer_db[0];
            $db->exec("Update Answers Set Answer='".$this->questions[$counter]->getAnswer()->getAnswer()."' Where ID=".$answer_db['ID']."");
          }else{
            $db->exec("Insert Into Answers(`QuestionID`,`TestID`,`Answer`)values(".$this->questions[$counter]->getID().",".$this->id.",'".$this->questions[$counter]->getAnswer()->getAnswer()."')");
          }
          $counter++;
        }
        $db->commit();
      }
    }
    public function setAnswers(){
      global $db;
      $answers = $db->query("Select * From answers Where TestID=".$this->id."")->fetchAll();
      echo count($answers);
      if(count($answers) == 12){
        $counter = 0;
        foreach($answers as $answer){
          $this->questions[$counter]->setAnswer($answer['Answer'],$answer['ID']);
          $counter++;
        }
      }else{
        $this->generateAnswers();
      }
    }
    public function getQuestions(){
      return $this->questions;
    }
    public function getID(){
      return $this->id;
    }
    public function getQuestionAnswer($number){
      return $this->questions[$number]->getAnswer()->getAnswer();
    }
    public function generatePDFTest($file){
      if(!file_exists($file)){
        $pdf = new FPDF();
        $pdf->SetFont('Arial','',14);
        $pdf->AddPage();
        for($i=0;$i < count($this->questions);$i+=2){
          $question[0] = explode("\n",$this->questions[$i]->getQuestion("PDF"));
          $question[1] = explode("\n",$this->questions[$i+1]->getQuestion("PDF"));
          $counter = 0;
          while($counter < count($question[0]) && $counter < count($question[1])){
            $pdf->Cell(120,5,$question[0][$counter]);
            $pdf->Cell(120,5,$question[0][$counter]);
            $pdf->Ln();
            $counter++;
          }
          $pdf->Ln();
          $pdf->Ln();
        }
        $pdf->Output($file,'F');
      }
    }
    public function generatePDFAnswers($file){
      if(!file_exists($file)){
        $pdf = new FPDF();
        $pdf->SetFont('Arial','',14);
        $pdf->AddPage();
        foreach($this->questions as $question){
          $pdf->Cell(120,5,$question->getAnswer()->getAnswer());
          $pdf->Ln();
          $pdf->Ln();
        }
        $pdf->Output($file,'F');
      }
    }
    public function generateHTMLTest($file){
      if(!file_exists($file)){
        $content = file_get_contents("HTML/template.html");
        preg_match('/<table>/',$content,$matches,PREG_OFFSET_CAPTURE);
        $start = substr($content,0,$matches[0][1]+7);
        $end = substr($content,$matches[0][1]+7,-1);
        $questions = "";
        for($i=0;$i < count($this->questions);$i+=2){
          $questions .= "\n\t\t\t<tr>\n\t\t\t\t<td><br>\n\t\t\t\t".$this->questions[$i]->getQuestion("HTML")."\n\t\t\t\t</td>\n\t\t\t\n\t\t\t\t<td><br>\n\t\t\t\t".$this->questions[$i+1]->getQuestion("HTML")."\n\t\t\t\t</td>\n\t\t\t</tr>";
        }
        file_put_contents($file,$start.$questions.$end);
      }
    }
    public function generateHTMLAnswers($file){
      if(!file_exists($file)){
        $this->setAnswers();
        $content = file_get_contents("HTML/template_answers.html");
        preg_match('/<body>/',$content,$matches,PREG_OFFSET_CAPTURE);
        $start = substr($content,0,$matches[0][1]+6);
        $end = substr($content,$matches[0][1]+6,-1);
        $questions = "";
        foreach($this->questions as $question){
          $questions .= "\n\t\t<p>".$question->getAnswer()->getAnswer("HTML")."</p>";
        }
        file_put_contents($file,$start.$questions.$end);
      }
    }
    public function clearTest(){
      global $db;
      $db->beginTransaction();
      $db->exec("Delete From tests where ID='".$this->id."'");
      $db->exec("Delete From questions where TestID='".$this->id."'");
      $db->exec("Delete From answers where TestID='".$this->id."'");
      $db->exec("alter table questions AUTO_INCREMENT=1");
      $db->exec("alter table tests AUTO_INCREMENT=1");
      $db->exec("alter table answers AUTO_INCREMENT=1");
      $files = array(
        "Archive/all_archives.zip",
        "Archive/test".$this->id.".zip",
        "PDF/test".$this->id.".pdf",
        "PDF/test_answers".$this->id.".pdf",
        "HTML/test".$this->id.".html",
        "HTML/test_answers".$this->id.".html"
        );
      foreach($files as $file)
        if(file_exists($file))
          unlink($file);
      $db->commit();
    }
  }
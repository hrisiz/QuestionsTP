<a href="?page=Generate_All-With-All-Archive"><button>Download All Archives in Archive</button></a>
<table>
<thead>
  <tr><th>ID</th><th>View Test</th><th>Answers</th><th>Download</th></tr>
</thead>
<?php 
  $rows = $db->query("Select * From tests order by ID desc")->fetchAll();
  for($j = 1;$j <= count($rows);$j++){ 
    $test[$j] = new Test($rows[$j-1]['ID']);
?>
    <tr>
      <td><?=$test[$j]->getID()?></td>
      <td>
        <p>View Test</p>
        <table class="test">
        <?php for($i=0;$i < count($test[$j]->getQuestions());$i+=2){?>
            <tr><td>
              <p>
                <?=$test[$j]->getQuestions()[$i]->getQuestion("HTML")?>
              </p>
              <p>
                <?=$test[$j]->getQuestions()[$i]->getAnswer()->getAnswer("HTML")?>
              </p>
            </td>
            <td>
              <p>
                <?=$test[$j]->getQuestions()[$i+1]->getQuestion("HTML")?>
              </p>
              <p>
                <?=$test[$j]->getQuestions()[$i+1]->getAnswer()->getAnswer("HTML")?>
              </p>
            </td></tr>
        <?php } ?>
        </table>
      </td>
      <td>
        <a href="?page=Generate_Answers&test_id=<?=$test[$j]->getID()?>"><button>Generate Answers</button></a>
        <!--<ul class="options">
          <li><a href="?page=Generate_Questions-PDF&test_id=<?=$test[$j]->getID()?>"><button>Download Questions PDF File</button></a></li>
          <li><a href="?page=Generate_Questions-HTML&test_id=<?=$test[$j]->getID()?>"><button>Download Questions HTML File</button></a></li>
          <li><a href="?page=Generate_Questions-Archive&test_id=<?=$test[$j]->getID()?>"><button>Download Questions Archive</button></a></li>
          <li><a href="?page=Generate_Answers-PDF&test_id=<?=$test[$j]->getID()?>"><button>Download Answers PDF File</button></a></li>
          <li><a href="?page=Generate_Answers-HTML&test_id=<?=$test[$j]->getID()?>"><button>Download Answers HTML File</button></a></li>
          <li><a href="?page=Generate_Answers-Archive&test_id=<?=$test[$j]->getID()?>"><button>Download Answers Archive</button></a></li>
        </ul>-->
      </td>
      <td>
        <a href="?page=Generate_All-Archive&test_id=<?=$test[$j]->getID()?>"><button>Download All in Archive File</button></a>
        <ul class="options">
          <li><a href="?page=Generate_Questions-PDF&test_id=<?=$test[$j]->getID()?>"><button>Download Questions PDF File</button></a></li>
          <li><a href="?page=Generate_Questions-HTML&test_id=<?=$test[$j]->getID()?>"><button>Download Questions HTML File</button></a></li>
          <li><a href="?page=Generate_Questions-Archive&test_id=<?=$test[$j]->getID()?>"><button>Download Questions Archive</button></a></li>
          <li><a href="?page=Generate_Answers-PDF&test_id=<?=$test[$j]->getID()?>"><button>Download Answers PDF File</button></a></li>
          <li><a href="?page=Generate_Answers-HTML&test_id=<?=$test[$j]->getID()?>"><button>Download Answers HTML File</button></a></li>
          <li><a href="?page=Generate_Answers-Archive&test_id=<?=$test[$j]->getID()?>"><button>Download Answers Archive</button></a></li>
        </ul>
      </td>
    </tr>
  <?php } ?> 
    </table>
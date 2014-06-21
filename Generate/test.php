<?php 
  set_time_limit(10000000);
  for($j = 1;$j <= $_POST['tests'];$j++){    
    $test[$j] = new Test(2);
    // $test[$j] = new Test();
    // $test[$j]->generateQuestions();
    // $test[$j]->generateAnswers();
?>
    <table>
    <thead>
      <tr><th>ID</th><th>View Test</th><th>Options</th></tr>
    </thead>
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
        <button>Download All in Archive File</button>
        <ul class="options">
          <li><a href=""><button>Download Questions PDF File</button></a></li>
          <li><a href=""><button>Download Questions HTML File</button></a></li>
          <li><a href=""><button>Download Questions Archive</button></a></li>
          <li><a href=""><button>Download Answers PDF File</button></a></li>
          <li><a href=""><button>Download Answers HTML File</button></a></li>
          <li><a href=""><button>Download Answers Archive</button></a></li>
        </ul>
      </td>
    </tr>
    </table>
  <?php } ?> 
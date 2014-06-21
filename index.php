<?php
  include "inc/Answer.php";
  include "inc/Question.php";
  include "inc/Test.php";
  include "inc/generate_test.php";
  include "inc/sql_connect.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Generate Questions</title>
		<meta charset="UTF-8"/>
		<link  rel="stylesheet" type="text/css" href="CSS/style.css"></link>	
    <script type="text/javascript" src="JavaScripts/topLogo.js"></script>
    <script type="text/javascript" src="JavaScripts/Ajax.js"></script>
  </head>
	<body>
    <header>
      <h1>Generate Test</h1>
    </header>
    <section>
      <?php include "inc/switch.php"?>
    </section>
    <footer>
			<p>GrizisMu © All Rights Reserved</p>
    </footer>
	</body>
</html>

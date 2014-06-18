<?php
  if(empty($_GET['page']) && !isset($_GET['page'])){
    $page = "Pages_Generate-Tests";
  }else{
    $page = $_GET['page'];
  }
  // $name = explode("_",$page);
  // $name = str_replace("-"," ",array_slice($name,-1)[0]);
  // echo"<h2>$name</h2>";
	if(!empty($page) && isset($page)){
		$page = str_replace("_","/",$page);
		$page = str_replace("-","_",$page);
		$page = strtolower($page);
		$page = $page.".php";
		if (file_exists($page)) {
			include $page;
		}else{
			echo"
				<h1 style=\"text-align:center;\">Error 404 <br>Object not found!</h1>
			";
		}
	}else{
		include "Pages/form.php";
	}
?>
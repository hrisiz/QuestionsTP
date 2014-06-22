<?php
  if(empty($_GET['page']) && !isset($_GET['page'])){
    $page = "Pages_Home";
  }else{
    $page = $_GET['page'];
  }
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
		include "Pages/home.php";
	}
  include "Pages/view.php";
?>
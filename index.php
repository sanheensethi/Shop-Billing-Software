<?php
	if(file_exists('system/db/inidb.php')){
		header('Location: admin/');
	}else{
		header('Location: ini.html');
	}
?>
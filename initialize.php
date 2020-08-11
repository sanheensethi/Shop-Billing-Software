<?php
	extract($_POST);
	
	if(!file_exists('system/ini.php') && !file_exists('system/db/inidb.php')){
		$handle  = fopen('system/ini.php','w');
		$handle2 = fopen('system/db/inidb.php','w');
		
		$data = '';
		$data .= '<?php';
		$data .= '
';
		$data .= "\$cs='".$company."';\n";
		$data .= "\$us='".$user."';\n";
		$data .= "?>";
		
		
		$data2 = '
';
		$data2 .= '<?php';
		$data2 .= '
		';
		$data2 .= "\$server='".$server."';\n";
		$data2 .= "\$dbname='".$dbname."';\n";
		$data2 .= "\$username='".$dbuser."';\n";
		$data2 .= "\$pass='".$dbpass."';\n";
		$data2 .= "?>";
		
		if(fwrite($handle,$data) && fwrite($handle2,$data2)){
			echo "<p class='text-success'>File Created Successfully</p>";
			echo "<script>window.location.href='';</script>";
		}else{
			echo "<p class='text-danger'>Error</p>";
		}
	}
?>
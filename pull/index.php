<?php
	echo "pull and push";
	$ex = shell_exec('sh pull.sh');
	echo "git message : ";
	print($ex);
?>
<?php
	echo "pull and push";
	$ex = shell_exec('pull.sh');
	echo "git message : ";
	print($ex);
?>
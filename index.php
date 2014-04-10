<?php
	define('DS',DIRECTORY_SEPARATOR);
	define('ROOT',dirname(__FILE__));
	header('Content-Type: text/html; charset=utf-8');
	require_once(ROOT.DS.'class'.DS.'getClientInfos.php');
	$page = isset($_GET['page'])?$_GET['page']:"tweets";
	$getClientInfos = new GetClientInfos('tweets');
?>
<html>
<head>
	<title>Twitter page : <?php echo $page; ?></title>
	<link rel="stylesheet" type="text/css" href="/twitter/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/twitter/css/style.css">
</head>
<body>
	<h1>Resultats</h1>
	<div class='container'>
		<div class='content'>
			<?php
				print $getClientInfos->infosFromTable($page);
			?>
		</div>
	</div>
</body>
</html>
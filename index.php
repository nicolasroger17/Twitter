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
	<?php
		if($page != "tweets"){
			?>
			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    </script>
			<?php
		}
	?>
</head>
<body>
	<div class='container'>
		<h1><?php echo $page; ?></h1>
		<?php
		if($page != "tweets"){
			?>
			<div id='chart_div'></div>
			<?php
		}
		?>
		<div class='content'>
			<?php
				print $getClientInfos->infosFromTable($page);
			?>
		</div>
	</div>
</body>
</html>
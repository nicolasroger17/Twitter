<?php
	define('DS',DIRECTORY_SEPARATOR);
	define('ROOT',dirname(__FILE__));
	header('Content-Type: text/html; charset=utf-8');
	require_once(ROOT.DS.'class'.DS.'getClientInfos.php');

	// the page to show is determine by the url parameter get : page
	// exemple : localhost/twitter?page=@Le_Figaro, localhost/twitter?page=tweets
	$page = isset($_GET['page'])?$_GET['page']:"tweets";
	//Get information from the table $page
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
				// display the html code returned
				print $getClientInfos->infosFromTable($page);
			?>
		</div>
	</div>
</body>
</html>
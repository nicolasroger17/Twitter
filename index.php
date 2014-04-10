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
</head>
<body>
<h1>Resultats</h1>


	var_dump($getClientInfos->infosFromTable($page));
	exit();
	?>
	<table>
		<tr>
			<th>Tweet's ID</th>
			<th>Created at</th>
			<th>Text</th>
			<th>Retweeted</th>
			<th>Favorited</th>
		</tr>
		<?php
			for($i=0; $i<count($data); $i++){
				echo '<tr>';
					echo '<td>'.$data[$i]['id'].'</td>';
					echo '<td>'.$data[$i]['date'].'</td>';
					echo '<td>'.$data[$i]['text'].'</td>';
					echo '<td>'.$data[$i]['retweeted'].'</td>';
					echo '<td>'.$data[$i]['favorited'].'</td>';
				echo '</tr>';
			}
		?>
	</table>	
</body>
</html>
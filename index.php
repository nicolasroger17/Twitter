<html>
<head>
	<title>Twitter</title>
	<link rel="stylesheet" type="text/css" href="index.css" /> 
</head>
<body>
<h1>Resultat</h1>
	<?php
	define('DS',DIRECTORY_SEPARATOR);
	define('ROOT',dirname(__FILE__));
	header('Content-Type: text/html; charset=utf-8');
	require_once(ROOT.DS.'class'.DS.'manageReturnContent.php');
	$manageReturnContent = new ManageReturnContent();
	$data=$manageReturnContent->filter();
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
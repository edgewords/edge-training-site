<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>DB Test Write To tables</title>
</head>
<body>
<?php
	$pageText = "";
	require ("../cgi-bin/db_access.php");
	$config = parse_ini_file('../cgi-bin/db_config.ini');
	
	$sql = new MYSQL_class;
	$sql->Setup ($config['username'], $config['password']);
	$sql->Connect($config['dbname']);
	
	function randString( $length ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
		$str = "";
		$size = strlen( $chars );
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}

		return $str;
	}
	
	function writeAccessUser() {
		global $sql;
		$user ="Ewords";
		$user .= randString(4);
		$query = "INSERT INTO access_users ( user, pw) VALUES ( '$user', PASSWORD('Millichamp1'));";
		$sql->Insert($query);
	}
	
	function writeRecordUser() {
		global $sql;
		$user ="edgewd";
		$user .= randString(4);
		$query = "INSERT INTO records ( name, uname, pin, pw) VALUES ( 'tom millichamp', '$user', '1234', PASSWORD('Edgewords1'));";
		$sql->Insert($query);
	}
	
	$pageText .= "<p>writing into access table</p>";
	$pageText .= "<br>";
	writeAccessUser();
	
	$pageText .= "<p>writing into records table</p>";
	$pageText .= "<br>";
	writeRecordUser();
	echo $pageText;
?>
</body>
</html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>DB Test Read from tables</title>
</head>
<body>
<?php
	$pageText = "";
	require ("../cgi-bin/db_access.php");
	$config = parse_ini_file('../cgi-bin/db_config.ini');
	
	$sql = new MYSQL_class;
	$sql->Setup ($config['username'], $config['password']);
	$sql->Connect($config['dbname']);
	


function getAccessData() {
	global $sql;
	$query = "SELECT user, pw from access_users";
	$sql->Query($query);
	return $sql->rows;
}

function returnAccessDataRow($row)
{
	global $sql;
	$sql->Fetch($row);
	$user = $sql->data[0];
	$pw = $sql->data[1];
	return array ($user, $pw);
}

function getRecordData() {
	global $sql;
	$query = "SELECT name, uname, pin, pw from records";
	$sql->Query($query);
	return $sql->rows;
}

function returnRecordDataRow($row)
{
	global $sql;
	$sql->Fetch($row);
	$name = $sql->data[0];
	$uname = $sql->data[1];
	$pin = $sql->data[2];
	$pw = $sql->data[3];
	
	return array ($name, $uname, $pin, $pw);
}
	$rc = getAccessData();
	
	$row = 0;
	while ($row < $rc) {
		list ($us, $pw) = returnAccessDataRow ($row);
		$pageText .= "<p> For Row $row, the user is $us and the password is $pw </p>";
		$row++;
	
	}
	$pageText .= "<br>";
	$rc = getRecordData();
	$row = 0;
	while ($row < $rc) {
		list ($name, $uname, $pn, $pw) = returnRecordDataRow ($row);
		$pageText .= "<p> For Row $row, the record is $name, $uname, $pn, $pw</p>";
		$row++;
	
	}
	$pageText .= "<br>";
	echo "$pageText";

?>
</body>
</html>


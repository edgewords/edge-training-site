<?php
	// in the beginning
	$pageText = "";
	require ("../cgi-bin/db_access.php");
	$config = parse_ini_file('../cgi-bin/db_config.ini');
	
	$sql = new MYSQL_class;
	$sql->Setup ($config['username'], $config['password']);
	$sql->Connect($config['dbname']);
	
	
function page_header () {
	echo "Content-type:  text/html\n\n";
	echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>\n";
	echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">\n";
	echo "<head>\n";
    echo "<title>Automated Tools Test Site</title>\n";
    echo "<link href='../css/styles.css' type='text/css' rel='stylesheet'/>\n";
    echo "<script type='text/javascript' src='../script/httpsscript.js'></script>\n";
    echo "<script type='text/javascript' src='../script/jquery-1.6.4.min.js'></script>\n";
	echo "</head>\n";
}
// check its there
function user_present($id) {
	global $sql;
	$query = "SELECT COUNT(user) FROM access_users WHERE user='$id'";
	$check = $sql->QueryItem($query);
	if ($check > 0 )
		return 1;
	else
		return 0;
}
// password is ok
function write_password_ok ($user,$pw) {
	global $sql;
	$query = "INSERT INTO access_users ( user, pw) VALUES ( '$user', PASSWORD('$pw'));";
	$dbpw = $sql->Insert($query);
	return 1;

	
}


	page_header();
	$uname = $_GET['uname'];
	$pw = $_GET['pw'];
	if (user_present($uname)) {
		//clear the cookie
		setcookie("user", "", time() - 3600,  "/");
		$pageText .= "<h1>$uname Error - Already Registered</h1>\n";
	}
	else {
		if (write_password_ok($uname, $pw)) {
			// set the cookie
			$cookie_name = "user";
			$cookie_value = "$uname";
			setcookie($cookie_name, $cookie_value, time() + (60 * 30), "/"); // 30 mins 
			$pageText .= "<h1>$uname Registered OK</h1>\n";
		} else {
			//clear the cookie
			setcookie("user", "", time() - 3600, "/");
			$pageText .= "<h1>Password Error - Cannot Set</h1>\n";
		}
	}
	echo $pageText;
	
echo "<a href='#' onclick='self.close()' class='orange-button'>Close Window</a>\n";
echo "</center>\n";
echo "</body>\n";
echo "</html>";
?>
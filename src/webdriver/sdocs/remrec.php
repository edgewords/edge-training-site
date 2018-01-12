
<?php
	// in the beginning
	$pageText = "";
	require ("../cgi-bin/db_access.php");
	$config = parse_ini_file('../cgi-bin/db_config.ini');
	
	$sql = new MYSQL_class;
	$sql->Setup ($config['username'], $config['password']);
	$sql->Connect($config['dbname']);
	
	
function page_header () {
	// echo "Content-type:  text/html\n\n";
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
function record_present($id) {
	global $sql;
	$query = "SELECT COUNT(uname) FROM records WHERE uname='$id'";
	$check = $sql->QueryItem($query);
	if ($check > 0 )
		return 1;
	else
		return 0;
}
// add the record
function remove_record ($uname) {
	global $sql;
	$query = "DELETE FROM records WHERE uname='$uname'";
	$sql->Delete($query);
}

	page_header();
	$uname = $_GET['uname'];

	if (record_present($uname)) {	
		//$pageText .= "<h1>Removing $uname from Database......</h1>\n";
		remove_record($uname);
		$pageText .= "<h1>$uname Record Successfully Removed From Database</h1>\n";
	}
	else {
		$pageText.= "<h1>$uname Record Not found in Database</h1>\n";
	}
	echo $pageText;
	
echo "<a href='#' onclick='self.close()' class='orange-button'>Close Window</a>\n";
echo "</center>\n";
echo "</body>\n";
echo "</html>";
?>
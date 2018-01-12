
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
// check its not there
function record_present($id) {
	global $sql;
	$query = "SELECT COUNT(uname) FROM records WHERE uname='$id'";
	$check = $sql->QueryItem($query);
	if ($check > 0 )
		return 1;
	else
		return 0;
}
// remove existing record
function remove_record ($uname) {
	global $sql;
	$query = "DELETE FROM records WHERE uname='$uname'";
	$sql->Delete($query);
}
// add the record
function add_record ($name, $uname, $hs, $ad, $tn, $co, $pc, $pn, $pw) {
	global $sql;
	$query = "INSERT INTO records (name, uname, house, AL_1, town, county, postcode, pin, pw) VALUES ('$name', '$uname', '$hs', '$ad', '$tn', '$co', '$pc', '$pn', PASSWORD('$pw'))";
	$sql->Insert($query);
}

// format response
function format_response () {
}


	page_header();
	$name = $_GET['user'];
	$uname = $_GET['uname'];
	$pn = $_GET['pn'];
	$hs = $_GET['house'];
	$ad = $_GET['address'];
	$tn = $_GET['town'];
	$co = $_GET['county'];
	$pc = $_GET['postcode'];
	$pw = $_GET['pw'];
	if (record_present($uname)) {
		//$pageText .= "<h1>Removing $nm from Database......</h1>\n";
		remove_record($uname);
		add_record($name, $uname, $hs, $ad, $tn, $co, $pc, $pn, $pw);
		$pageText .= "<h1>$uname Record Re Added to Database</h1>\n";
	}
	else {
		$pageText .= "<h1>$uname Record Not found in Database</h1>\n";
	}
	echo $pageText;
	
echo "<a href='#' onclick='self.close()' class='orange-button'>Close Window</a>\n";
echo "</center>\n";
echo "</body>\n";
echo "</html>";
?>
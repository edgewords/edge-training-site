<?php
$cookie_name = 'user';
$printText = "";
if(!isset($_COOKIE[$cookie_name])) {
	$printText .= "User is not Logged in<br>";
	header('Refresh: 2; URL=../sdocs/auth.php');
    die();
} else {
    $printText .= "User is Logged in<br>";
	
}
?>

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
function not_empty() {
	global $sql;
	$query = "SELECT COUNT(uname) FROM records";
	$check = $sql->QueryItem($query);
	if ($check > 0 )
		return 1;
	else
		return 0;
}

// add the record
function grab_list () {
	global $sql;
	$query = "SELECT name, uname, house, AL_1, town, county, postcode
				FROM records 
				ORDER BY uname";
	$sql->Query($query);

	return $sql->rows;
	
}

function get_row ($row) {
	global $sql;
	$sql->Fetch($row);
	$name  = $sql->data[0];
	$uname = $sql->data[1];
	$house = $sql->data[2];
	$al1   = $sql->data[3];
	$town  = $sql->data[4];
	$county   = $sql->data[5];
	$postcode = $sql->data[6];
	return array ($name, $uname, $house, $al1, $town, $county, $postcode);
}

function write_table ($rows) {
	$row = 0;
	global $pageText;
	$pageText .= "<table id='recordlistheader' cellspacing='0' cellpadding='0' border='1' width='100%'>";

	$pageText .= "  <tr>";
	$pageText .= "    <td>";
	$pageText .= "       <table cellspacing='0' cellpadding='1' border='1' width='75%' >";
	$pageText .= "        <tr>";
	$pageText .= "           <th width='25%'>Name</th>";
	$pageText .= "           <th width='25%'>User Name</th>";
	$pageText .= "           <th width='50%'>Address</th>";
	$pageText .= "         </tr>";
	$pageText .= "      </table>";
	$pageText .= "   </td>";
	$pageText .= "  </tr>";
	
	$pageText .= "  <tr>";
	$pageText .= "   <td>";
	$pageText .= "      <div style='width:100%; height:200px; overflow:auto;'>";
	$pageText .= "        <table id='records' cellspacing='0' cellpadding='1' border='1' width='75%' >";
 
	while ($row < $rows) {
		list ($name, $uname, $house, $al1, $town, $county, $postcode) = get_row($row);
	
		$pageText .= "       <tr>";
		$pageText .= "         <td width='25%'>$name</td>";
		$pageText .= "         <td width='25%'>$uname</td>";
		$pageText .= "         <td width='50%'>$house, $al1, $town, $county, $postcode</td>";
		$pageText .= "       </tr>";
		$row++;
	}
    $pageText .= "     </table>";  
    $pageText .= "   </div>";
    $pageText .= "</td>";
	$pageText .= "</tr>";
	$pageText .= "</table>";	
}

	page_header();
?>
        <div id="header">
            <div id="logo"></div>
        </div>
        <div id="main-page">
            <div id="left-column">
                <div id="menu">
                    <ul>
                        <li>
							<a href="add_record.php">
                                <span>Add Record</span>
                            </a>
                        </li>
						<li>
							<a href="edit_record.php">
                                <span>Edit Record</span>
                            </a>
                        </li>
						<li>
							<a href="remove_record.php">
                                <span>Remove Record</span>
                            </a>
                        </li>
						<li>
							<a href="listrec.php">
                                <span>List Records</span>
                            </a>
                        </li>
                        <li class="last">
                        	<a href="#" onclick="javascript:exitApplication();return false;" >
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="right-column">
			<h1>LIST of Database Records</h1>
			<form id="recordlist">
				<h2> This table represents the user details in our database</h2>
<?php				
	if (not_empty()) {
		$rows = grab_list();
		write_table($rows);
	
	}
	else {
		$pageText .= "<h1>No Records Not found in Database</h1>\n";
	}
	echo $pageText;
	
?>
		</div>
        </div>
        <div id="footer">&copy;2014 Edgewords Limited</div>
    </body>
</html>
<?php
header('Refresh: 2; URL=../sdocs/auth.php');

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


page_header();
echo "<body>\n";
$cookie_name = 'user';
if(!isset($_COOKIE[$cookie_name])) {
   echo "User is not Logged in<br>";
} else {
    echo "User is Logged in<br>";
}
setcookie("user", "", time() - 3600,  "/");
echo "<center>\n";
	
echo "<h1>Secure Site Invalid Authorisation Redirection</h1>\n";

//echo "<a href='#' onclick='self.close()' class='orange-button'>Close Window</a>\n";
echo "</center>\n";
echo "</body>\n";
echo "</html>";
?>
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Automated Tools Test Site</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
        <link href="../css/styles.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="../script/httpsscript.js"></script>
        <script type="text/javascript" src="../script/jquery-1.6.4.min.js"></script>
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
    </head>

	<body>
<?php
	echo $printText;
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
			<h1>Remove A Record</h1>
			<form id="RemoveRecord">
				<h2> Remove </h2>
				<table class="formTable">
					<tr>
                    	<td>UserName?<span class="red"></span>
                    	</td>
                        <td>
                                <input class="formInput" id="username" type="text" />
                        </td>
                    </tr>
                	<tr>
                    	<td></td>
                        <td>
                                <a href="#" onclick="javascript:removeRecord();return false;" class="orange-button">Submit</a>
                                <a href="#" onclick="javascript:clearRemRecord();return false;" class="orange-button">Clear</a>

                        </td>
                    </tr>
                </table>
            </form>
			</div>
        </div>
        <div id="footer">&copy;2014 Edgewords Limited</div>
      
    </body>
</html>
<?php
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Automated Tools Test Site</title>
        <link href="../css/styles.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="../script/httpsscript.js"></script>
        <script type="text/javascript" src="../script/jquery-1.6.4.min.js"></script>

    </head>
    <body>
<?php
$cookie_name = 'user';
if(!isset($_COOKIE[$cookie_name])) {
   echo "User is not Logged in<br>";
} else {
    echo "User is Logged in<br>";
}
?>
        <div id="header">
            <div id="logo"></div>
        </div>
        <div id="main-page">
            <div id="left-column">
                <div id="menu">
                    <ul>
                        <li>
							<a href="#" onclick="javascript:clearLogin();return false;">
                                <span>Login</span>
                            </a>
                        </li>

                        <li class="last">
                        	<a href="#" onclick="javascript:registerInstead();return false;" disabled = "true" >
                                <span>Register</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="right-column">
			<h1>Access and Authentication</h1>
			<form id="Login">
				<h2> Login </h2>
				<table class="formTable">
                	<tr>
                    	<td>User Name?<span class="red"></span>
                    	</td>
                        <td>
                                <input class="formInput" id="username" type="text" />
                        </td>
                    </tr>

                    <tr>
						<td>Password?<span class="red"></span>
					    </td>
					    <td>
					         	<input class="formInput" type="password" name="password" id="password"/>
						</td>
                    </tr>


                	<tr>
                    	<td></td>
                        <td>
                                <a href="#" onclick="javascript:submitLogin();return false;" class="orange-button">Submit</a>
                                <a href="#" onclick="javascript:clearLogin();return false;" class="orange-button">Clear</a>

                        </td>
                    </tr>
                </table>
            </form>

            <form id="Register">
            	<h2> Register</h2>
                <table class="formTable">
                	<tr>
				    	<td>User Name?<span class="red"></span>
				        </td>
				        <td><input class="formInput" id="username" type="text" />
				        </td>
                    </tr>
                    <tr>
						<td>Password?<span class="red"></span>
						</td>
						<td>
							<input class="formInput" type="password" name="password" id="password"/>
						</td>
                    </tr>
                    <tr>
						<td>Password?<span class="red"></span>
						</td>
						<td>
							<input class="formInput" type="password" name="password" id="password2"/>
						</td>
                    </tr>
                    
                    <tr>
						<td></td>
                        <td>
                                <a href="#" onclick="javascript:submitRegister();return false;" class="orange-button">Submit</a>
                                <a href="#" onclick="javascript:clearRegister();return false;" class="orange-button">Clear</a>
                        </td>
                   </tr>
                </table>
            </form>
			</div>
        </div>
        <div id="footer">&copy;2014 Edgewords Limited</div>
        <script>$('#Register').hide(); </script>
    </body>
</html>
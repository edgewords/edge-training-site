#!C:\Perl64\bin\perl.exe
use CGI::Carp qw(fatalsToBrowser warningsToBrowser);
use CGI::Cookie;
use Apache::Htpasswd;
use MIME::Base64;

my $htpasswd = new Apache::Htpasswd("C:\\Tools\\apache\\passwd\\passwords");
@users = $htpasswd->fetchUsers();
my $text = "mcatt:dogfight";
$text = encode_base64($text);

$cookie1 = new CGI::Cookie(-name=>'user',-value=>'marcus');
print "Set-Cookie: $cookie1\n";
print "Content Type: text/html \n\n";
print <<ENDHTML;
<html>
<head><title>Testing Cookie</title></head>
<body>This is a simple test for authentication using cookie<br>
ENDHTML

%cookies = fetch CGI::Cookie;
foreach $key (keys %cookies) {
$currCookie = $cookies{$key};
$currValue = $currCookie->value;
 print "<br> name = $key, value = $currValue<br>\n";
}

foreach my $user (@users) {
	print "<br> user in pw files is $user and the password is $htpasswd->fetchPass($user)<br>\n";
}
print "<br> encode is $text <br>\n";
print <<MRC;
</body>
</html>
MRC

# Req Header Authorization Basic bWNhdHQ6ZG9nZmlnaHQ= --- this is what the browser sends with every request until logged out
# 401 Response Header WWW-Authenticate	Basic realm="Restricted Access Area" from server when it rejects
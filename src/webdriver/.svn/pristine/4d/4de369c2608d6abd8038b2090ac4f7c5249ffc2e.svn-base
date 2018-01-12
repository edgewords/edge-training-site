#!C:\Perl64\bin\perl.exe
use CGI qw(:standard);
use warnings;


sub printpageheader {
	print "Status: 401 Not Authorised\n";
	print "Content-Type: text/html\n\n";

	print "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>\n";
	print "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">\n";
	print "<head>\n";
    print "<title>Automated Tools Test Site</title>\n";
	print "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>";
    print "<link href='../css/styles.css' type='text/css' rel='stylesheet'/>\n";
    print "<script type='text/javascript' src='../script/httpsscript.js'></script>\n";
    print "<script type='text/javascript' src='../script/jquery-1.6.4.min.js'></script>\n";
	print "</head>\n";
}



package main;
#simple script to check its there 
	my $query = new CGI;
	
	printpageheader();
	print "<body>\n";
	print "<div id='header'><div id='logo'></div></div>\n";
	print "<div id='main-page'>\n";
	print "<center>\n";
	# we should get the URL/STATUS and REQUEST methods at least
	#foreach my $key (keys %ENV) {
	#	if ($key =~ "REDIRECT") {
	#		print "$key --> $ENV{$key}<br>";
	#	}	
	#}
	print "<br>\n";
	print "<h2>Error type $ENV{\"REDIRECT_STATUS\"}, from page $ENV{\"REDIRECT_URL\"}. Not Authorised to access</h2><br>\n";
	print button("startagain","Start Again?","findStart()");
	print "</center>\n";
	print "</div>\n";
	print "<div id='footer'>&copy;2014 Edgewords Limited</div>\n";
	print "</body>\n";
	print "</html>";
	
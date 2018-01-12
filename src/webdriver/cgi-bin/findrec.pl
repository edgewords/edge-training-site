#!C:\Perl64\bin\perl.exe
use CGI qw(:standard);
use warnings;

@records = ();
$found = 0;
$file = "../db/recs.txt";
sub printpageheader {
    print "Content-type:  text/html\n\n";
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

sub readncheck {
	my ($nm) = @_;
	my $result = 0;
	open (MFILE, "<".$file) or die "cannot open $file: $! \n";
	my $i = 0;
	while (!eof MFILE){
            my $line = <MFILE>;
            chomp ($line);
			my ($person, $un, $pin, $pw) = split /;/, $line, 4;
			if ( $nm eq $un ) {
				# we have found the record exists
				#print "<h1>Found username $nm exists in Databaase</h1>\n";
				$found = 1;
				#format an error page return?
				$result = $line;
				print "<h1>Record FOUND</h1>\n";
				print "<p>$line</p>\n";
			}
			else {
				$records[$i++] = $line;
			}
	}
	close MFILE;
	return $result;
}

package main;
#simple script to check its there 
	my $query = new CGI;
	
	my $uname = $query->param('uname');
	# read/check/write/read it back?
	
	printpageheader();
	print "<body>\n";
	print "<center>\n";
	if (!readncheck($uname)) {
		print "<h1>nope</h1>\n";
	}
	print "<a href='#' onclick='self.close()' class='orange-button'>Close Window</a>\n";
	print "</center>\n";
	print "</body>\n";
	print "</html>";
	
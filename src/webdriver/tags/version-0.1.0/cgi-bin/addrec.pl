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
    print "<link href='../css/styles.css' type='text/css' rel='stylesheet'/>\n";
    print "<script type='text/javascript' src='../script/httpsscript.js'></script>\n";
    print "<script type='text/javascript' src='../script/jquery-1.6.4.min.js'></script>\n";
	print "</head>\n";
}


sub readncheck {
	my ($nm) = @_;
	
	open (MFILE, "<".$file) or die "cannot open $file: $! \n";
	my $i = 0;
	while (!eof MFILE){
            my $line = <MFILE>;
            chomp ($line);
			my ($person, $un, $pin, $pw) = split /;/, $line, 4;
			$records[$i++] = $line;
			if ( $nm eq $un ) {
				# we have found the record exists
				print "<h1>Found username $nm exists in Databaase</h1>\n";
				$found = 1;
				#format an error page return?
			}
	}
	close MFILE;
	return $found;
}

sub appendrec {
	my ($us, $nm, $pn, $pw) = @_;
	open (WFILE, ">>".$file) or die "cannot open $file: $! \n";
	my $line = "$us;$nm;$pn;$pw\n";
	print WFILE $line;
	close WFILE;
	#if ok return 1;
	return 1;
}


package main;
#simple script to check its not there and add it
#very little parsing and verification server side

	my $query = new CGI;

	
	my $user = $query->param('user');
	my $uname = $query->param('uname');
	my $pin = $query->param('pn');
	my $passwd = $query->param('pw');
	
	# read/check/write/read it back?
	
	printpageheader();
	print "<body>\n";
	print "<center>\n";
	readncheck($uname);
	if (!$found) {
		#print "username $uname NOT found in file so Adding, value of found is $found\n";
		appendrec($user, $uname, $pin, $passwd);
		#write the done page answer - page or popup or just a string to parse?
		print "<h1>$uname Record Added to Database</h1>\n";
		
		
	}
	print "<a href='#' onclick='self.close()' class='orange-button'>Close Window</a>\n";
	print "</center>\n";
	print "</body>\n";
	print "</html>";
	
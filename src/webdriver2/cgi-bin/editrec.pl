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
	
	open (MFILE, "<".$file) or die "cannot open $file: $! \n";
	my $i = 0;
	while (!eof MFILE){
            my $line = <MFILE>;
            chomp ($line);
			my ($person, $un, $pin, $pw) = split /;/, $line, 4;
			if ( $nm eq $un ) {
				# we have found the record exists
				print "<h1>Removing $nm from Database......</h1>\n";
				$found = 1;
	
			}
			else {
				$records[$i++] = $line;
			}
	}
	close MFILE;
	return $found;
}

sub remrec {
	open (WFILE, ">".$file) or die "cannot open $file: $! \n";
	foreach $line (@records) {
		print WFILE "$line\n";
	}
	close WFILE;
	#if ok return 1;
	return 1;
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
# we delete the record and add a new one
# assumes the username has not changed 
# So we find it and remove it - delete
# then we append a new one

	my $query = new CGI;
	
	my $user = $query->param('user');
	my $uname = $query->param('uname');
	my $pin = $query->param('pn');
	my $passwd = $query->param('pw');
	
	
	printpageheader();
	print "<body>\n";
	print "<center>\n";
	readncheck($uname);
	if ($found) {
		remrec();
		appendrec($user, $uname, $pin, $passwd);
		print "<h1>$uname Record Re Added to Database</h1>\n";
		
		
	} else {
		print "<h1>$uname Record Not found in Database</h1>\n";
	}
	print "<a href='#' onclick='self.close()' class='orange-button'>Close Window</a>\n";
	print "</center>\n";
	print "</body>\n";
	print "</html>";


#!C:\Perl64\bin\perl.exe
use strict;
use warnings;

print "Content-type: text/html\n\n";
print "Hello, Marcs World.<br><br>";

foreach my $key (keys %ENV) {
    print "$key --> $ENV{$key}<br>";
}
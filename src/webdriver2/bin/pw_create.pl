#!C:\Perl64\bin\perl.exe
use strict;
use warnings;

$pwpath = "C:\tools\apache\passwd\";
$user = "validuser";
$pass = "edgewords";

$command = "htpasswd -b -c $pwpath $user $pass\n";
`$command`;
# check directory exists - if not create it
# then add user to file Need username and password for this

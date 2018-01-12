#!C:\Perl64\bin\perl.exe
use JSON;
use Data::Dumper;

$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

$text = decode_json($json);
print  Dumper($text);
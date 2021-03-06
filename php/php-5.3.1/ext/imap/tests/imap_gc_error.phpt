--TEST--
imap_gc() incorrect parameter count
--CREDITS--
Paul Sohier
#phptestfest utrecht
--SKIPIF--
<?php
require_once(dirname(__FILE__).'/skipif.inc');
?>
--FILE--
<?php
echo "Checking with no parameters\n";
imap_gc();

echo  "Checking with incorrect parameter type\n";
imap_gc('', false);
imap_gc(false, false);

?>
--EXPECTF--
Checking with no parameters

Warning: imap_gc() expects exactly 2 parameters, 0 given in %s on line %d
Checking with incorrect parameter type

Warning: imap_gc() expects parameter 1 to be resource, %unicode_string_optional% given in %s on line %d

Warning: imap_gc() expects parameter 1 to be resource, boolean given in %s on line %d

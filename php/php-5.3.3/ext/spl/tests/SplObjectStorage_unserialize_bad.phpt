--TEST--
SPL: Test that serialized blob contains unique elements (CVE-2010-2225)
--FILE--
<?php

$badblobs = array(
'x:i:2;i:0;,i:1;;i:0;,i:2;;m:a:0:{}',
'x:i:3;O:8:"stdClass":0:{},O:8:"stdClass":0:{};R:1;,i:1;;O:8:"stdClass":0:{},r:2;;m:a:0:{}',
'x:i:3;O:8:"stdClass":0:{},O:8:"stdClass":0:{};r:1;,i:1;;O:8:"stdClass":0:{},r:2;;m:a:0:{}',
);
foreach($badblobs as $blob) {
try {
  $so = new SplObjectStorage();
  $so->unserialize($blob);
  var_dump($so);
} catch(UnexpectedValueException $e) {
	echo $e->getMessage()."\n";
}
}
--EXPECTF--
Error at offset 6 of 34 bytes
Error at offset 46 of 89 bytes
object(SplObjectStorage)#2 (1) {
  ["storage":"SplObjectStorage":private]=>
  array(2) {
    ["%s"]=>
    array(2) {
      ["obj"]=>
      object(stdClass)#3 (0) {
      }
      ["inf"]=>
      int(1)
    }
    ["%s"]=>
    array(2) {
      ["obj"]=>
      object(stdClass)#1 (0) {
      }
      ["inf"]=>
      object(stdClass)#4 (0) {
      }
    }
  }
}


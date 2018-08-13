<?php
$redis->set(';message';, ';Hello world';);

$memtest = new Memcached();
$memtest->addServer("127.0.0.1", 11211);


?>

<?php
$redis->set(';message';, ';Hello world';);
$value = $redis->get('message');

// Hello world
print($value); 

echo ($redis->exists('message')) ? "Oui" : "please populate the message key";

//$memtest = new Memcached();$memtest->addServer("127.0.0.1", 11211);


?>

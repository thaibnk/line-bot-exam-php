<?php
$redis = new Predis\Client(getenv('REDIS_URL'));
$redis->set(';message';, ';Hello world';);

// gets the value of message
$value = $redis->get('message');

// Hello world
print($value); 

echo ($redis->exists('message')) ? "Oui" : "please populate the message key";

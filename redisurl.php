<?php
  $redis = new Redis(); 
   $redis->connect('127.0.0.1', 6379); 
   echo "Connection to server sucessfully"; 
/*
$redis = new redis\Client($_ENV('REDIS_URL'));
echo "ทดสอบ redis".getenv('REDIS_URL');

//$redis->set(';message';, ';Hello world';);

// gets the value of message
//$value = $redis->get('message');

$value=$redis->get('foo');
*/
// Hello world
//print('สวัสดี ='.$value); 
echo $value;
//echo 'a='.($redis->exists('message')) ? "Oui" : "please populate the message key";
?>

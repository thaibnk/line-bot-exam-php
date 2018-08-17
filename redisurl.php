<?php
require "vendor/autoload.php";
  //edis = new Redis(); 
  //redis->connect("redis://h:p94a00b50a567eef4d65cb6230d498f1603ecdb5eac09324791a4c77f4a0a20f5@ec2-18-214-19-12.compute-1.amazonaws.com:15009, 6379); 
  // new RedisURI("redis://h:p94a00b50a567eef4d65cb6230d498f1603ecdb5eac09324791a4c77f4a0a20f5@ec2-18-214-19-12.compute-1.amazonaws.com:15009", 6379, 60, TimeUnit.SECONDS);
 
echo "Connection to server sucessfully";
//echo getenv('REDIS_URL');
 
$redis new Redis();
//$redis = new redis\Client($_ENV['REDIS_URL']);
//echo "ทดสอบ redis".$_ENV['REDIS_URL'];

 $value = $redis->get('foo');
 
//$redis->set(';message';, ';Hello world';);

// gets the value of message
//$value = $redis->get('message');

$value=$redis->get('foo');

// Hello world
//print('สวัสดี ='.$value); 
echo $value;
//echo 'a='.($redis->exists('message')) ? "Oui" : "please populate the message key";
?>

<?php
echo "สวัสดี redis";

// --------------------------------
//  Plain Redis + phpredis
// --------------------------------
$redis = new Redis();
$redis->connect('127.0.0.1');
$cache = $redis->get('foo');
//Cache miss
if($cache === false) {
    ob_start(); // Start output buffering
    // ... output what you want cached
    $cache = ob_end_clean(); // Stop ob, get contents
    $redis->set('key',$cache);
}
// At this point $cache is either the retrieved cache or a fresh copy, so echo it
echo "redis key=foo value=".$cache;
// --------------------------------
//  With Redis_OB_Func
// --------------------------------
// Named function call
function my_output_fn() {
   //...echo things!
}
$rob = new Redis_OB_Func('my-key','my_output_fn');
// Using closures
$rob = new Redis_OB_Func('my-key',function() {
   // ... output what you want cached
});


$mc = new Memcached();
$mc->setOption(Memcached::OPT_BINARY_PROTOCOL, true);

//$mc->addServers(array_map(function($server) { return explode(':', $server, 2); }, explode(',', $_ENV['MEMCACHEDCLOUD_SERVERS']) )    );
$mc->addServers('memcached-11878.c14.us-east-1-2.ec2.cloud.redislabs.com',11878);

//$mc->setSaslAuthData($_ENV['MEMCACHEDCLOUD_USERNAME'], $_ENV['MEMCACHEDCLOUD_PASSWORD']);
$mc->setSaslAuthData('memcached-app103432799', '7rKlQcdY6FeJT8kf07pA2ULedG8DZTX4');

switch ($_GET['a']) {
  case 'set':
    echo $mc->set('welcome_msg', 'Hello from Redis!');
    break;
  case 'get':
    echo $mc->get('welcome_msg');
    break;
  case 'stats':
    foreach ($mc->getStats() as $key => $value) {
      foreach ($value as $k => $v) {
        echo "$k: $v <br />\n";
      }
    }
    break;
  case 'delete':
    echo $mc->delete('welcome_msg');
    break;
  default:
    echo '';
    break;
}
?>

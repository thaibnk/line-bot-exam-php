<?php
// --------------------------------
//  Plain Redis + phpredis
// --------------------------------
$redis = new Redis();
$redis->connect('127.0.0.1');
$cache = $redis->get('key');
//Cache miss
if($cache === false) {
    ob_start(); // Start output buffering
    // ... output what you want cached
    $cache = ob_end_clean(); // Stop ob, get contents
    $redis->set('key',$cache);
}
// At this point $cache is either the retrieved cache or a fresh copy, so echo it
echo $cache;
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
?>

<?php 
require 'vendor/autoload.php';

// create a new persistent client
$m = new Memcached("memcached_pool");
//connect(‘localhost’, 11211) or die (“Could not connect”);

// ติดต่อกับ server โดย localhost และ 11211 คือ port สำหรับติดต่อ memcache

   // echo “Version : “.$memcache->getVersion();



?>

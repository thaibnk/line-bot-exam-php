<?php
error_reporting(E_ALL & ~E_NOTICE);

//error_reporting(E_ALL & ~E_NOTICE);
$memcache = new Memcached ( 'a_mem_pool' );
$ss = $memcache->getServerList ();
if (empty ( $ss )) {
$memcache->setOption(Memcached::OPT_RECV_TIMEOUT, 1000);
$memcache->setOption(Memcached::OPT_SEND_TIMEOUT, 1000);
$memcache->setOption(Memcached::OPT_TCP_NODELAY, true);
$memcache->setOption(Memcached::OPT_SERVER_FAILURE_LIMIT, 50);
$memcache->setOption(Memcached::OPT_CONNECT_TIMEOUT, 500);
$memcache->setOption(Memcached::OPT_RETRY_TIMEOUT, 300);
$memcache->setOption(Memcached::OPT_DISTRIBUTION, Memcached::DISTRIBUTION_CONSISTENT);
$memcache->setOption(Memcached::OPT_REMOVE_FAILED_SERVERS, true);
$memcache->setOption(Memcached::OPT_LIBKETAMA_COMPATIBLE, true);
$memcache->addServer ( '10.10.1.75', 11211, 1 );
$memcache->addServer ( '10.10.1.76', 11211, 1 );
$memcache->addServer ( '10.10.1.77', 11211, 1 );
}

/*
$mc = new Memcached('a');
$mc->addServer("localhost", 11211);

$mc->set("foo", "Hello!");
$mc->set("bar", "Memcached...");

$arr = array(
    $mc->get("foo"),
    $mc->get("bar")
);
var_dump($arr);
/*
$memcache = new Memcache;
$memcache->connect('localhost',11211) or die ("Could not connect");

$version = $memcache->getVersion();
echo "Server's version: ".$version."<br/>\n";

$tmp_object = new stdClass;
$tmp_object->str_attr = 'test';
$tmp_object->int_attr = 123;

$memcache->set('key', $tmp_object, false, 10) or die ("Failed to save data at the server");
echo "Store data in the cache (data will expire in 10 seconds)<br/>\n";

$get_result = $memcache->get('key');
echo "Data from the cache:<br/>\n";

var_dump($get_result);
*/
?>

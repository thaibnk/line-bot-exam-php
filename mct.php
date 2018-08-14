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
?>

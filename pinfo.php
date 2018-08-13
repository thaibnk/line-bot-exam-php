<?php 

     connect(‘localhost’, 11211) or die (“Could not connect”);

// ติดต่อกับ server โดย localhost และ 11211 คือ port สำหรับติดต่อ memcache

    echo “Version : “.$memcache->getVersion();

$m = new Memcached();
$m->addServer('localhost', 11211);

$m->set('int', 99);
$m->set('string', 'a simple string');
$m->set('array', array(11, 12));
/* expire 'object' key in 5 minutes */
$m->set('object', new stdclass, time() + 300);


var_dump($m->get('int'));
var_dump($m->get('string'));
var_dump($m->get('array'));
var_dump($m->get('object'));
//phpinfo();

?>

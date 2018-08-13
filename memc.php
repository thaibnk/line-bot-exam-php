<?php
//$redis->set(';message';, ';Hello world';); $value = $redis->get('message'); // Hello world  print($value); 

//echo ($redis->exists('message')) ? "Oui" : "please populate the message key";

$memtest = new Memcached();
$memtest->addServer("memcached-11878.c14.us-east-1-2.ec2.cloud.redislabs.com", 11878);

//$memtest->addServer("127.0.0.1", 11878);
$memtest->set("Bilbo", "สุดยอด"); 
$response = $mem_var->get("Bilbo");
echo $response;

if ($response) {
&nbsp; &nbsp; echo $response;
 
} else {
&nbsp; &nbsp; echo "Adding Keys (K) for Values (V), You can then grab Value (V) for your Key (K) \m/ (-_-) \m/ ";
&nbsp; &nbsp; $mem_var->set("Bilbo", "Here s Your (Ring) Master stored in MemCached (^_^)") or die(" Keys Couldn't be Created : Bilbo Not Found :'( ");
}

?>

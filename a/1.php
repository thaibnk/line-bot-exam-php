<?php 
$ip = getenv('REMOTE_ADDR');
$envredis=getenv('REDIS_URL');
echo "ip remote= ".$ip."<br>";
echo "redis url=".$envredis;
?>


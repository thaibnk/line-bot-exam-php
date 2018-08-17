<html>
<head>
  <title>PHP Redis Demo</title>
</head>
<body>

<?php

// Check if Redis is configured
if (!isset($_ENV['REDIS_URL'])) {
  ?>
  <h1>REDIS_URL environment variable not found.</h1> 

  <h2>Running Locally</h2>
  <pre>export REDIS_URL=redis://localhost:6379</pre>
  <p>Restart Apache</p>

  <h2>Running on Heroku</h2>
  <pre>heroku config:add redis:add</pre>
  <?php
  exit;
}

// Parse out the URL and set as session handler
$redis_url = "tcp://" . parse_url($_ENV['REDIS_URL'], PHP_URL_HOST) . ":" . parse_url($_ENV['REDIS_URL'], PHP_URL_PORT);
if (!is_array(parse_url($_ENV['REDIS_URL'], PHP_URL_PASS))) {
  $redis_url .= "?auth=" . parse_url($_ENV['REDIS_URL'], PHP_URL_PASS);
}
ini_set("session.save_path", $redis_url);
ini_set("session.save_handler", "redis");

// Start the session
session_start();

// Write a value to the session
if (isset($_REQUEST['value'])) {
    $_SESSION['value'] = $_REQUEST['value'];
}

// Close the session to new writes
session_write_close();


// Connecting to Redis for use PHP code directly (non-sessions)
$r = new Redis();
$r->connect(parse_url($_ENV['REDIS_URL'], PHP_URL_HOST), parse_url($_ENV['REDIS_URL'], PHP_URL_PORT));
if (!is_array(parse_url($_ENV['REDIS_URL'], PHP_URL_PASS))) {
  $r->auth(parse_url($_ENV['REDIS_URL'], PHP_URL_PASS));
}
?>

<h1>PHP Redis Demo</h1>

<h2>Backing PHP Sessions with Redis</h2>
<p>Use this form to get and set a value to the PHP session backed by Redis.</p>
<form method="post" action="">
  Value: <input name="value" value="<?php if(isset( $_SESSION['value'])) echo $_SESSION['value']; ?>"/>
  <input type="submit" value="Set in Session"/>
</form>

<h2>Using Redis Directly from PHP</h2>
<p>Hit counter: <?php echo $r->incr('hit_counter'); ?></p>

<h2>Scalability and Relatibity</h2>
<p>Try scaling out the web processes so there are multiple Apaches running. Notice how this the Redis-backed sessions and data are unaffected.</p>
<pre>heroku scale web=2</pre>

</body>
</html>

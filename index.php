<?php 

require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
    echo "<pre>";
    $sql = new Hcode\DB\Sql();
	$results = $sql -> select("select * from tb_users");
	echo json_encode($results);
	echo "</pre>";
});

$app->run();

 ?>
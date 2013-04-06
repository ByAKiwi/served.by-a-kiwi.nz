<?php
namespace ByAKiwi;
use Tonic;
use Pimple;
use PDO;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RegexIterator;

define('ROOT', __DIR__);

include __DIR__.'/vendor/autoload.php';

$dir = new RecursiveDirectoryIterator( __DIR__.'/classes/ByAKiwi/');
$ite = new RecursiveIteratorIterator($dir);
$files = new RegexIterator($ite,'/.*\.php$/', RegexIterator::GET_MATCH);
foreach($files as $file) {
  foreach ($file as $path) {
    include $path;
  }
}

include __DIR__.'/config.php';

$app = new Tonic\Application();
$request = new Tonic\Request();

try {
  $resource = $app->getResource($request);
    
  $container = new Pimple();
  $container['dsn'] = $config['dsn'];
  $container['username'] = $config['username'];
  $container['password'] = $config['password'];
  $container['options'] = $config['options'];
  $container['database'] = function ($c) {
    return new PDO($c['dsn'], $c['username'], $c['password'], $c['options']);
  };

  $resource->container = $container;
  $response = $resource->exec();

} catch (Tonic\NotFoundException $e) {
  $response = new Tonic\Response(404, $e->getMessage());
} catch (Tonic\UnauthorizedException $e) {
  $response = new Tonic\Response(401, $e->getMessage());
  $response->wwwAuthenticate = 'Basic realm="My Realm"';
} catch (Tonic\Exception $e) {
  $response = new Tonic\Response($e->getCode(), $e->getMessage());
}

$response->output();

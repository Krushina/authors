<?php

define('ROOT_PATH', dirname(dirname(__FILE__)) .  DIRECTORY_SEPARATOR);
define('SCRIPTS_PATH', dirname(dirname(__FILE__)) .  DIRECTORY_SEPARATOR . 'scripts' .  DIRECTORY_SEPARATOR);
define('CONFIG_PATH', dirname(dirname(__FILE__)) .  DIRECTORY_SEPARATOR . 'config' .  DIRECTORY_SEPARATOR);
//set_include_path(get_include_path() . ':' . ROOT_PATH  . ':' . SCRIPTS_PATH  . ':' . CONFIG_PATH);

require ROOT_PATH . 'vendor/autoload.php';

 set_include_path(join(PATH_SEPARATOR, [ SCRIPTS_PATH, CONFIG_PATH,
      get_include_path()
 ]));


require 'config.php';
$app = new \Slim\App();

$container = $app->getContainer();

require 'dependencies.php';
$app->get('/', function ($request, $response) {
    $response->write(file_get_contents('api-docs.json'));
});

$app->get('/api/v1/authors/{id:[0-9]+}[/]',  '\App\Controllers\GetAuthor');

try {
$app->run();
} catch (Exception $e) {
    error_log($e->getMessage());
    error_log($e->getTraceAsString());
}
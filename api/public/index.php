<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}



session_start();


require __DIR__ . '/../bootstrap.php';

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Api\Action\TodoAction;



// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';


$container = $app->getContainer();
$todoAction = $container['Api\Action\TodoAction'];


$app->get("/todos/", function(Request $request, Response $response) use ($todoAction){
    echo $todoAction->fetch($response);
});

$app->get("/todos/{id}", function(Request $request, Response $response,  $id) use ($todoAction){
    echo $todoAction->fetchOne($response,['id' => $id]);
});

// Run app
$app->run();

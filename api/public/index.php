<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}
require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';


// Get container
$container = $app->getContainer();


//// Register component on container
//$container['view'] = new \Slim\Views\PhpRenderer("../../templates/dist/frontend");
//
//$app->get('', function (Request $request, Response $response) {
////    $this->logger->addInfo('Ticket list');
////    $mapper = new TicketMapper($this->db);
////    $tickets = $mapper->getTickets();
//
//    $response = $this->view->render($response,'index.html');
//    return $response;
//});




// Register component on container
//$container['view'] = function ($container) {
//    $view = new \Slim\Views\Twig('path/to/templates', [
//        'cache' => 'path/to/cache'
//    ]);
//
//    // Instantiate and add Slim specific extension
//    $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
//    $view->addExtension(new Slim\Views\TwigExtension($container->get('router'), $basePath));
//
//    return $view;
//};


$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});


// Run app
$app->run();

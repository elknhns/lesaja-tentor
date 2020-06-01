<?php
declare(strict_types=1);

// use Phalcon\Di\FactoryDefault;

// error_reporting(E_ALL);
// ini_set('display_errors', 'true');

// define('BASE_PATH', dirname(__DIR__));
// define('APP_PATH', BASE_PATH . '/app');

// require __DIR__ . '/../vendor/autoload.php';

// $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__.'/../');
// $dotenv->load();

// try {
//     /**
//      * The FactoryDefault Dependency Injector automatically registers
//      * the services that provide a full stack framework.
//      */
//     $di = new FactoryDefault();

//     $config = include APP_PATH . "/config/config.php";

//     /**
//      * Read services
//      */
//     include APP_PATH . '/config/services.php';

//     /**
//      * Handle routes
//      */
//     include APP_PATH . '/config/router.php';

//     /**
//      * Include Autoloader
//      */
//     include APP_PATH . '/config/loader.php';

//     /**
//      * Handle the request
//      */
//     $application = new \Phalcon\Mvc\Application($di);

//     echo $application->handle($_SERVER['REQUEST_URI'])->getContent();
// } catch (\Exception $e) {
//     echo $e->getMessage() . '<br>';
//     echo '<pre>' . $e->getTraceAsString() . '</pre>';
// }

use Phalcon\Di\FactoryDefault;

error_reporting(E_ALL);
ini_set('display_errors', 'true');

// Set Base Path
define('BASE_PATH', dirname(__DIR__));

// Set App Path
define('APP_PATH', BASE_PATH . '/app');

// Autoload
require __DIR__ . '/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

try 
{
    /**
     * The FactoryDefault Dependency Injector automatically registers
     * the services that provide a full stack framework.
     */
    $di = new FactoryDefault();

    // Register config
    $config = include APP_PATH . "/config/config.php";

    // Register autoloader
    include APP_PATH . '/config/loader.php';

    // Register services
    include APP_PATH . '/config/services.php';

    // Handle routes
    include APP_PATH . '/config/router.php';

    // Handle request
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle($di->get('request_uri'))->getContent();
} 

catch (\Exception $e) 
{
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
<!-- <php

$loader = new \Phalcon\Loader();
$loader->registerNamespaces([
    'Phalcon\Db' => APP_PATH . '/lib/Phalcon/Db',
    'App\Controllers'  => APP_PATH . '/controllers',
]);
/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
)->register(); -->


<?php

$loader = new \Phalcon\Loader();

/** @var \Phalcon\Config $config */

// Melakukan register namespace
$loader->registerNamespaces([
    'Phalcon\Db' => APP_PATH . '/lib/Phalcon/Db',

    // Directories
    'App\Controllers' => $config->application->controllersDir,
    'App\Models' => $config->application->modelsDir,
]);

$loader->register();
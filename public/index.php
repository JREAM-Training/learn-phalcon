<?php

try {
    // Autoloader
    $loader = new \Phalcon\Loader();
    $loader->registerDirs([
        '../app/controllers/',
        '../app/models/'
    ]);
    $loader->register();

    // Dependency Injection
    $di = new \Phalcon\DI\FactoryDefault();

    // Database
    $di->set('db', function() {
        $db = new \Phalcon\Db\Adapter\Pdo\Mysql([
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'dbname' => 'learning-phalcon'
        ]);
        return $db;
    });

    // View
    $di->set('view', function() {
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir('../app/views/');
        $view->registerEngines([
            ".volt" => 'Phalcon\Mvc\View\Engine\Volt'
        ]);
        return $view;
    });

    // Session
    $di->setShared('session', function() {
        $session = new \Phalcon\Session\Adapter\Files();
        $session->start();
        return $session;
    });

    // Meta-Data
    // $di['modelsMetadata'] = function() {
    //     $metaData = new \Phalcon\Mvc\Model\MetaData\Apc([
    //         "lifetime" => 86400,
    //         "prefix"   => "metaData"
    //     ]);
    //     return $metaData;
    // };

    // Deploy the App
    $app = new \Phalcon\Mvc\Application($di);
    echo $app->handle()->getContent();

} catch(\Phalcon\Exception $e) {
    echo $e->getMessage();
}
<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$app = new \Silex\Application();
$app->register(new \Silex\Provider\ServiceControllerServiceProvider());

$app['debug'] = true;
$app['torrents.dataFile'] = __DIR__ . '/../../data/torrents.json';
$app['repositories.torrents'] = $app->share(function(\Silex\Application $app){
    return new \PirateGulf\Api\Repositories\FileTorrentsRepository($app['torrents.dataFile']);
});

$app['controllers.torrentsList'] = $app->share(function(\Silex\Application $app){
    return new \PirateGulf\Api\Controllers\TorrentsListController(
        $app['repositories.torrents']
    );
});

$app->get('torrents', 'controllers.torrentsList:getTorrentsList');

$app->run();

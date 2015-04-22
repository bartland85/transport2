<?php

require_once(__DIR__ . '/vendor/autoload.php');

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path'  => __DIR__ . '/views'
));

$app['debug'] = true;

$app->get('/', function()use($app){

    return $app['twig']->render('index.twig', array());
});

$pages = array(
    'cennik',
    'oferta',
    'kontakt',
    'test'
);

foreach($pages as $page){

    $app->get('/' . $page . '/', function()use($app, $page){
        return $app['twig']->render($page . '.twig', array());
    });
}

$app->run();


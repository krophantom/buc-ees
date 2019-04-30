<?php

namespace Symfony\Component\Routing\Loader\Configurator;

use App\Controller\CommentController;
use App\Controller\StoresController;
use App\Controller\VendorController;
use App\Controller\ContributionsController;
use App\Controller\PageController;

return function (RoutingConfigurator $routes) {

    $routes->add('index', '/')
        ->controller([PageController::class, 'index']);

    $routes->add('vendors', '/vendors')
        ->controller([VendorController::class, 'vendor']);

    $routes->add('vendor_by_id', '/vendors/{id}')
        ->controller([VendorController::class, 'vendorApi']);

    $routes->add('contributions', '/contributions')
        ->controller([ContributionsController::class, 'contributions']);

    $routes->add('contact', '/contact')
        ->controller([CommentController::class, 'comment']);

    $routes->add('locations', '/locations')
        ->controller([StoresController::class, 'locations']);

    $routes->add('page', '/{slug}')
        ->controller([PageController::class, 'page']);

};

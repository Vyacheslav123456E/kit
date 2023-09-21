<?php

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once __DIR__ . '/util/Route.php';
require_once __DIR__ . '/controller/AuthController.php';
require_once __DIR__ . '/controller/ProductsPricesController.php';



Route::add('POST', '/api/products', function (Request $request) {
    echo (new ProductsPricesController())->actionCreateUpdate($request->getJSON());
});


Route::add('POST', '/api/auth/login', function (Request $request) {
    echo (new AuthController())->login($request->getJSON());
}, false);

Route::run();
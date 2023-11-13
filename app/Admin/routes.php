<?php

use App\Admin\Controllers\FormController;
use App\Admin\Controllers\TechnologyController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
  'prefix'        => config('admin.route.prefix'),
  'namespace'     => config('admin.route.namespace'),
  'middleware'    => config('admin.route.middleware'),
  'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('technologies', TechnologyController::class);
    $router->resource('form', FormController::class);
});

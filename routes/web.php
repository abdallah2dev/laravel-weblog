<?php

use GeneaLabs\LaravelWeblog\Http\Controllers\Images;
use GeneaLabs\LaravelWeblog\Http\Controllers\Posts;
use GeneaLabs\LaravelWeblog\Http\Controllers\Rss;
use GeneaLabs\LaravelWeblog\Http\Controllers\Sitemap;

// TODO: see if there's a way to get middleware groups working in L5.1
// Route::group(['middleware' => ['web']], function () {
    Route::get(config('genealabs-laravel-weblog.blog-route-name'), Posts::class.'@index');
    Route::get(config('genealabs-laravel-weblog.rss-route-name'), Rss::class.'@index');
    Route::get(config('genealabs-laravel-weblog.sitemap-route-name'), Sitemap::class.'@index');
    Route::resource('posts', Posts::class);

    // Route::group(['prefix' => 'genealabs/laravel-weblog'], function () {
        Route::resource('genealabs-laravel-weblog-images', Images::class);
    // });
// });

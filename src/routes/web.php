<?php

use Illuminate\Support\Facades\Route;

Route::get('calculator', function () {
    echo 'Hello from the calculator package!';
});

Route::group([
    'namespace'  => 'Likeaway\Calculator\Http\Controllers',
    'middleware' => [
        'web',
    ],
], function () {
    Route::get('add/{a}/{b}', 'CalculatorController@add')->name('calc_add');
    Route::get('sub/{a}/{b}', 'CalculatorController@subtract')->name('calc_sub');
});

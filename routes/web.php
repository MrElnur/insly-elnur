<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('calculator', 'CarInsurance@index');
Route::post('/calculate', 'CarInsurance@result');
Route::get('/bin', function () {
    return view('bintotext');
});

Route::get('/', function()
{
    return View::make('pages.home');
});
Route::get('/calculator', function()
{
    return View::make('calculator.index');
});
Route::get('/binaryString', function()
{
    return View::make('pages.binary');
});
Route::get('/source', function()
{
    return View::make('pages.source');
});

Route::get('/binaryCalc', 'BinaryToString@result');
Route::get('/stringCalc', 'BinaryToString@stringResult');

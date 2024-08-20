<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.common.home');
});

Route::get('base64-encode', function () {
    return view('pages.base64.base64-encode');
});

Route::get('base64-decode', function () {
    return view('pages.base64.base64-decode');
});

Route::get('img-to-base64', function () {
    return view('pages.base64.img-to-base64');
});

Route::get('md5-generator', function () {
    return view('pages.md5-generator');
});

Route::get('translit-url', function () {
    return view('pages.home');
});

Route::get('case-converter', function () {
    return view('pages.case-converter');
});

Route::get('word-counter', function () {
    return view('pages.word-counter');
});

Route::get('unixtimestamp', function () {
    return view('pages.unixtimestamp');
});

Route::get('privacy-policy', function () {
    return view('pages.common.privacy-policy');
});

Route::get('uuid', function () {
    return view('pages.uuid');
});

Route::get('json-stringify', function () {
    return view('pages.json-stringify');
});

Route::get('html-formatter', function () {
    return view('pages.formatter.html-formatter');
});

Route::get('minify-css', function () {
    return view('pages.formatter.minify-css');
});

Route::get('beautify-js', function () {
    return view('pages.formatter.beautify-js');
});

Route::get('beautify-css', function () {
    return view('pages.formatter.beautify-css');
});
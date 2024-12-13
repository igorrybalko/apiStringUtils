<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'home']);

Route::get('privacy-policy', [PageController::class, 'privacyPolicy']);

Route::get('donate', [PageController::class, 'donate']);

Route::get('base64-encode', [PageController::class, 'base64Encode']);
Route::get('base64-decode', [PageController::class, 'base64Decode']);

Route::get('img-to-base64', function () {
    return view('pages.base64.img-to-base64');
});

Route::get('md5-generator', [PageController::class, 'md5Generator']);
Route::get('sha-256', [PageController::class, 'sha256Generator']);

Route::get('translit-url', [PageController::class, 'translitUrl']);
Route::get('url-encode', [PageController::class, 'urlEncode']);
Route::get('url-decode', [PageController::class, 'urlDecode']);

Route::get('case-converter', function () {
    return view('pages.case-converter');
});

Route::get('word-counter', function () {
    return view('pages.word-counter');
});

Route::get('unixtimestamp', function () {
    return view('pages.unixtimestamp');
});

Route::get('uuid', function () {
    return view('pages.uuid');
});

Route::get('json-stringify', [PageController::class, 'jsonStringify']);
Route::get('json-minify', [PageController::class, 'jsonMinify']);

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
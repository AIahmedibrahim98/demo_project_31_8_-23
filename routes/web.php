<?php

use App\Http\Controllers\TestController;
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
    // return 'test';
    return view('welcome');
});

Route::get('/test', function () {
    foreach (range(1, 100) as $item) {
        echo "$item <br>";
    }
});

Route::get('/test-view', fn () => view('test_view'));

Route::get('hello/{name}/{age}', function ($x, $y) {
    return "Hello $x .. Your Age is $y";
});

/* Route::get('hello-v2/{name}/{age?}', function ($x, $y = 5) {
    return "Hello $x .. Your Age is $y";
}); */

Route::get('hello-v2/{name}/{age?}', [TestController::class, 'name']);
Route::get('hello-v2/{name}/{age?}', "TestController@name");

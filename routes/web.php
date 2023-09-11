<?php

use App\Http\Controllers\ClacController;
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

/* Route::get('/', function () {
    // return 'test';
    return view('welcome');
}); */

Route::view('/', 'welcome');

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
// Route::get('hello-v2/{name}/{age?}', "TestController@name");

/* Route::get('clc/sum/{x}/{y}',[ClacController::class,'sum']);
Route::get('clc/sub/{x}/{y}',[ClacController::class,'sub']);
Route::get('clc/multi/{x}/{y}',[ClacController::class,'multi']);
Route::get('clc/dev/{x}/{y}',[ClacController::class,'dev']); */

// Route::prefix('clc')->as('calc.')->group(function () {
Route::prefix('clc')->name('calc.')->group(function () {
    Route::get('sum/{x}/{y}', [ClacController::class, 'sum'])->name('sum');
    Route::get('sub/{x}/{y}', [ClacController::class, 'sub'])->name('sub');
    Route::get('multi/{x}/{y}', [ClacController::class, 'multi'])->name('multi');
    Route::get('dev/{x}/{y}', [ClacController::class, 'dev'])->name('dev');
});

Route::match(['get', 'post'], 'get-post', fn () => 'This Request can Call GET OR POST');

Route::any('call-all', fn () => 'This Request can Call With any method');


Route::get('hello-v3/{name}', [TestController::class, 'hello']);


/* Route::get('clc/sum/{x}/{y}',[ClacController::class,'sum'])
->where('y','[0-9]*')
->where('x','[0-9]*'); */

/* Route::get('clc/sum/{x}/{y}',[ClacController::class,'sum'])
->where(['y'=>'[0-9]*', 'x'=>'[0-9]*']); */

/* Route::get('clc/sum/{x}/{y}', [ClacController::class, 'sum'])
    ->whereNumber(['x', 'y']);
// ->whereIn('x',[1,2]); */

Route::get('hamada/{id}', function ($id) {
    return "This data for user Num $id";
})->name('user-data');

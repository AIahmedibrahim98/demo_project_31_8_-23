<?php

use App\Http\Controllers\ClacController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HrController;
use App\Http\Controllers\SalesContoller;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
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

Route::prefix("users")->as('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');
});


Route::get('lec5-1', fn () => view('lec5-1'));
Route::get('lec5-2', fn () => view('lec5-2'));

Route::get('page1', function () {
    $name = "ahmed";
    $age = 20;
    // return view('page1', ['koko' => $name]);
    /* return view('page1')->with('koko', $name)
                        ->with('name','sara'); */
    // return view('page1')->with(compact('name'))->with(compact('age'));
    return view('page1', compact('name'), compact('age'));
});

Route::get('sales', [SalesContoller::class, 'sales']);

Route::get('page2', fn () => view('page2'));

Route::prefix('hr')->group(function () {
    Route::get('', [HrController::class, 'index'])->name('index');
    Route::get('dml', [HrController::class, 'dml'])->name('dml');
})->name('hr.');

Route::get('employees', [EmployeeController::class, 'index'])->name('employees');

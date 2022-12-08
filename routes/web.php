<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PdfController;

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

Route::get('/', function () {
    return view('welcome');
});

// Playground
// Route::get('/playgrounds', function(){
//     return view('playground/lel');
// });
// Route::post('/playgrounds', [MainController::class, 'store']);


// View Route
Route::get('/index', function(){
    return view('index');
});
Route::get('/viewdata', [MainController::class, 'index']);
Route::get('/addCertificate', function(){
    return view('ajax/addcertificate');
});
Route::get('/postCertificate', [MainController::class, 'store']);
Route::get('/editdatashow/{id}', [MainController::class, 'edit']);
Route::get('/editdatapost/{id}', [MainController::class, 'update']);
Route::get('/deletedata/{id}', [MainController::class, 'destroy']);

// PDF Route
Route::get('/convert-pdf/{id}', [PdfController::class, 'generatePDF']);
Route::get('/pdf-preview', function(){
    return view('pdf');
});

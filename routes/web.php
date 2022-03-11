<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

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

Route::get('/test', [TestController::class, 'test']);

Route::get('/cars', [TestController::class, 'cars']);

Route::get('/students', [StudentController::class, 'index'])->name('student.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/students/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/students/show/{id}', [StudentController::class, 'show'])->name('student.show');
Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/students/update/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/students/delete/{id}', [StudentController::class, 'destroy'])->name('student.destroy');


Route::group(['middleware' => ['auth']], function() {
    Route::get('/category', [PhoneController::class, 'category'])->name('category.index');
    Route::get('/phones', [PhoneController::class, 'index'])->name('phones.index');
    Route::get('/phones/create', [PhoneController::class, 'create'])->name('phones.create');
    Route::post('/phones/store', [PhoneController::class, 'store'])->name('phones.store');
    Route::get('/phones/show/{phone}', [PhoneController::class, 'show'])->name('phones.show');
    Route::get('/phones/edit/{phone}', [PhoneController::class, 'edit'])->name('phones.edit');
    Route::put('phones/update/{phone}', [PhoneController::class, 'update'])->name('phones.update');
    Route::delete('/phones/delete/{phone}', [PhoneController::class, 'destroy'])->name('phones.destroy');
});

Route::get('/author', [BookController::class, 'author']);
Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/books/store', [BookController::class, 'store'])->name('book.store');
Route::get('/books/show/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('/books/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
Route::put('/books/update/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('/books/delete/{book}', [BookController::class, 'destroy'])->name('book.destroy');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

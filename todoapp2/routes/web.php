<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

// Route::get('/', function () {
//     return view('/index');
// });

Route::post('/todo', NoteController::class . '@store')->name('Notes.store');
Route::get('/todo', NoteController::class . '@index')->name('Notes.index');
Route::get('/index', NoteController::class . '@index')->name('Notes.index');
Route::get('/accomplished', NoteController::class . '@accomplished')->name('Notes.accomplished');
Route::get('/todo/finished/{id}', NoteController::class . '@finished')->name('Notes.finished');
Route::delete('/todo/delete/{id}', NoteController::class . '@delete')->name('Notes.delete');
Route::put('/todo/update/{id}', [NoteController::class, 'update'])->name('Notes.update');


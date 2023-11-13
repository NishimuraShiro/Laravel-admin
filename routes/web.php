<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/forms', [DataController::class, 'showForm']);

Route::get('/technologies', [DataController::class, 'showTechnology']);

Route::get('/combinedData', [DataController::class, 'showCombinedData']);

// 関連するルートのグループ化
Route::group(['prefix' => 'form'], function () {

    Route::get('/index', [FormController::class, 'showIndex']); //一覧
    Route::post('/store', [FormController::class, 'store'])->name('form.store'); //保存（ビューなし）

    Route::get('/edit/{id}', [FormController::class, 'edit'])->name('form.edit'); //編集
    Route::post('update/{id}', [FormController::class, 'update'])->name('form.update'); //更新（ビューなし）

    Route::get('/delete/{id}', [FormController::class, 'delete'])->name('form.delete'); //削除（ビューなし）
});
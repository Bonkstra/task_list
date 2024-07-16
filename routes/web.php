<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

Route::get('/', function() {
    return view('index', ['tasks' => Task::all()]);
})->name('tasks.index');


Route::fallback(function() {
    return redirect()->route('tasks.index');
});

Route::get('/{id}', function($id) {
    $task = Task::find($id);
    if(!isset($task) || !$task) {
        abort(Response::HTTP_NOT_FOUND);
    }

    return view('show', ['task' => $task]);
})->name('tasks.show');
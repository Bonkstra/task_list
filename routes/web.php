<?php

use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('tasks', function() {
    return view('index', ['tasks' => Task::latest()->get()]); // Gets the latest record based on the created_at column
})->name('tasks.index');

Route::view('tasks/create', 'create')->name('tasks.create');
Route::post('tasks/create', function(Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::get('tasks/edit/{id}', function($id) {
    return view('edit', ['task' => Task::findOrFail($id)]);
})->name('tasks.edit');
Route::put('tasks/edit/{id}', function($id, Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = Task::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task edited successfully!');
})->name('tasks.update');

Route::get('tasks/{id}', function($id) {
    return view('show', ['task' => Task::findOrFail($id)]); // findOrFail: if no record is find call the following: abort(Response::HTTP_NOT_FOUND); (404)
})->name('tasks.show');

Route::fallback(function() { // Fallback route for any request that is not a valid route
    return redirect()->route('tasks.index');
});
@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @if (isset($task))
            @method('PUT')
        @else
            @method('POST')
        @endif
        @csrf
        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required value="{{ $task->title ?? old('title') }}"
                @class(['border-red-500' => $errors->has('title')])>
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description">Description</label>
            <textarea type="text" name="description" id="description" rows="5" required @class(['border-red-500' => $errors->has('description')])>{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">Long description</label>
            <textarea type="text" name="long_description" id="long_description" rows="7" required
                @class(['border-red-500' => $errors->has('long_description')])>{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button class="btn" type="submit">{{ isset($task) ? 'Edit' : 'Add' }} Task</button>
        </div>
    </form>
    <a class="link" href="{{ route('tasks.index') }}">
        <p>Go Back</p>
    </a>
@endsection

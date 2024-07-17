@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Incomplete</span>
        @endif
    </div>
    <ul>
        <li class="mb-4 text-slate-700">{{ $task->description }}</li>
        @if ($task->long_description)
            <li class="mb-4 text-slate-700">{{ $task->long_description }}</li>
        @endif
        <li class="mb-4 text-sm text-slate-500">{{ $task->created_at->diffForHumans() }} -
            {{ $task->updated_at->diffForHumans() }}</li>
    </ul>
    <div class="flex gap-2 mb-4">
        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
            @method('PUT')
            @csrf
            <button class="btn" type="submit">Mark as {{ $task->completed ? 'incomplete' : 'completed' }}</button>
        </form>
        <a class="btn" href="{{ route('tasks.edit', ['task' => $task]) }}">
            Edit
        </a>
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn" type="submit">Delete</button>
        </form>
    </div>
    <nav class="mb-4">
        <a class="link" href="{{ route('tasks.index') }}">
            <p>Go Back</p>
        </a>
    </nav>
@endsection

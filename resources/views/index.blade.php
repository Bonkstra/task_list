@extends('layouts.app')

@section('title', 'List of tasks')

@section('content')
    <nav class="mb-4">
        <a class="link" href="{{ route('tasks.create') }}">
            <p>Add Task</p>
        </a>
    </nav>
    @forelse($tasks as $task)
        <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed])>
            <p>{{ $task->title }}</p>
        </a>
    @empty
        <p>There are no tasks</p>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection

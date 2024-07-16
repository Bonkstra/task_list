@extends('layouts.app') 

@section('title', 'List of tasks')

@section('content')
	<div>
		<a href="{{ route('tasks.create') }}"><p>Add Task</p></a>
	</div>
	@forelse($tasks as $task)
		<a href="{{ route('tasks.show', ['task' => $task->id]) }}"><h3>{{ $task->title }}</h3></a>
	@empty
		<p>There are no tasks</p>
	@endforelse

	@if($tasks->count())
		<nav>
			{{ $tasks->links() }}
		</nav>
	@endif
@endsection
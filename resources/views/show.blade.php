@extends('layouts.app') 

@section('title', ($task->completed) ? "Completed: " . $task->title : "Incomplete: " . $task->title)

@section('content')
	<ul>
		<li>{{ $task->description }}</li>
		@if($task->long_description)
			<li>{{ $task->long_description }}</li>
		@endif
		<li>{{ $task->created_at }}</li>
		<li>{{ $task->updated_at }}</li>
	</ul>
	<div>
		<form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
			@method('PUT')
			@csrf
			<button type="submit">Mark as {{ $task->completed ? 'incomplete' : 'completed' }}</button>
		</form>
	</div>	
	<div>
		<form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
			@method('DELETE')
			@csrf
			<button type="submit">Delete</button>
		</form>
	</div>
	<div>
		<a href="{{ route('tasks.edit', ['task' => $task]) }}"><p>Edit</p></a>
		<a href="{{ route('tasks.index') }}"><p>Back</p></a>
	</div>
@endsection
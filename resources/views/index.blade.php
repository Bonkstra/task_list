@extends('layouts.app') 

@section('title', 'List of tasks')

@section('content')
	@forelse($tasks as $task)
		<a href="{{ route('tasks.show', ['id' => $task->id]) }}"><h3>{{ $task->title }}</h3></a>
		<ul>
			<li>{{ $task->description }}</li>
		</ul>
	@empty
		<p>There are no tasks</p>
	@endforelse
@endsection
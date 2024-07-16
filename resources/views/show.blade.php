@extends('layouts.app') 

@section('title', $task->title)

@section('content')
	<ul>
		<li>{{ $task->description }}</li>
		@if($task->long_description)
			<li>{{ $task->long_description }}</li>
		@endif
		<li>{{ $task->created_at }}</li>
		<li>{{ $task->updated_at }}</li>
		<li>{{ $task->updated_at }}</li>
	</ul>
	<a href="{{ route('tasks.index') }}"><p>Back</p></a>
@endsection
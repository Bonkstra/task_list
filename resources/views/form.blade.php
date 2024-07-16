@extends('layouts.app') 

@section('title', (isset($task)) ? 'Edit Task' : 'Add Task')
@section('styles')
	<style type="text/css">
		.error-message {
			color: red;
			font-size: 0.8rem;
		}
	</style>
@endsection

@section('content')
	<form method="POST" action="{{ (isset($task)) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
		@if(isset($task))
			@method('PUT')
		@else
			@method('POST')
		@endif
		@csrf
		<div>
			<label for="title">Title</label>
			<input type="text" name="title" id="title" required value="{{ $task->title ?? old('title') }}">
			@error('title')
				<p class="error-message">{{ $message }}</p>
			@enderror

			<label for="description">Description</label	>
			<textarea type="text" name="description" id="description" rows="5" required>{{ $task->description ?? old('description') }}</textarea>
			@error('description')
				<p class="error-message">{{ $message }}</p>
			@enderror

			<label for="long_description">Long description</label	>
			<textarea type="text" name="long_description" id="long_description" rows="7" required>{{ $task->long_description ?? old('long_description') }}</textarea>
			@error('long_description')
				<p class="error-message">{{ $message }}</p>
			@enderror
		</div>
		<div>
			<button type="submit">{{ (isset($task)) ? 'Edit' : 'Add' }} Task</button>
		</div>
	</form>
	<a href="{{ route('tasks.index') }}"><p>Back</p></a>
@endsection
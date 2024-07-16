@extends('layouts.app') 

@section('title', "Edit Task")

@section('styles')
	<style type="text/css">
		.error-message {
			color: red;
			font-size: 0.8rem;
		}
	</style>
@endsection

@section('content')
	<form method="POST" action="{{ route('tasks.update', ['task' => $task]) }}">
		@method('PUT')
		@csrf
		<div>
			<label for="title">Title</label>
			<input type="text" name="title" id="title" required value="{{ (old('title')) ? old('title') : $task->title }}">
			@error('title')
				<p class="error-message">{{ $message }}</p>
			@enderror

			<label for="description">Description</label	>
			<textarea type="text" name="description" id="description" rows="5" required>{{ (old('description')) ? old('description') : $task->description }}</textarea>
			@error('description')
				<p class="error-message">{{ $message }}</p>
			@enderror

			<label for="long_description">Long description</label	>
			<textarea type="text" name="long_description" id="long_description" rows="7" required>{{ (old('long_description')) ? old('long_description') : $task->long_description }}</textarea>
			@error('long_description')
				<p class="error-message">{{ $message }}</p>
			@enderror
		</div>
		<div>
			<button type="submit">Edit Task</button>
		</div>
	</form>
	<a href="{{ route('tasks.index') }}"><p>Back</p></a>
@endsection
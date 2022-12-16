@extends('layout')

@section('title')
    Create Tasks
@endsection

@section('content')
    <div class="px-5">
        <h1 class="font-bold text-3xl">Create Task</h1>
        <form action="/tasks" method="POST">
            @csrf
            <label class="block" for="title">Title</label>
            <input class="border border-dark w-100 @error('title') border border-red-700 @enderror" type="text" name="title" id="title" required value="{{ old('title') ? old('title') : '' }}"><br>
            @error('title')
                <small class="text-red-700">{{ $message }}</small>
            @enderror

            <label class="block" for="body">Body</label>
            <textarea class="border border-dark w-100 @error('body') border border-red-700 @enderror" name="body" id="body" cols="30" rows="10" required>{{ old('body') ? old('body') : '' }}</textarea><br>
            @error('body')
                <small class="text-red-700">{{ $message }}</small>
            @enderror

            <button class="text-white bg-red-800 px-4 py-2 float-right" type="submit">Submit</button>
        </form>
    </div>
@endsection

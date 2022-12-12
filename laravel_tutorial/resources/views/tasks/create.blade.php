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
            <input class="border border-dark w-100" type="text" name="title" id="title"><br>

            <label class="block" for="body">Body</label>
            <textarea class="border border-dark w-100" name="body" id="body" cols="30" rows="10"></textarea><br>

            <button class="text-white bg-red-800 px-4 py-2 float-right" type="submit">Submit</button>
        </form>
    </div>
@endsection

@extends('layout')

@section('title')
    Create Tasks
@endsection

@section('content')
    <h1 class="font-bold text-3xl">Create Task</h1>
    <form action="/tasks" method="POST">
        <label class="block" for="title">Title</label>
        <input class="border border-dark" type="text" name="title" id="title"><br>

        <label class="block" for="body">Body</label>
        <textarea class="border border-dark" name="body" id="body" cols="30" rows="10"></textarea><br>

        <button class="bg-success" type="submit">Submit</button>
    </form>
@endsection

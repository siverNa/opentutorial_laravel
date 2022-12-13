@extends('layout')

@section('title')
    Task Detail
@endsection

@section('content')
    <div class="px-5">
        <div class="flex">
            <h1 class="font-bold text-3xl tflex-1">Task</h1>
            <a href="/tasks/{{ $task->id }}/edit">
                <button class="tpx-4 tpy-2 tflex-initial text-white hover:bg-green-500" style="background-color: green">수정하기</button>
            </a>
        </div>
        Title: {{ $task->title }} <small class="float-right">Created at: {{ $task->created_at }}</small> <br>
        <small class="float-right">Updated at: {{ $task->updated_at }}</small><br>
        Body
        <div class="border p-3">{{ $task->body }}</div>
    </div>
@endsection

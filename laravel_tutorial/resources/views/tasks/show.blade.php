@extends('layout')

@section('title')
    Task Detail
@endsection

@section('content')
    <div class="px-5">
        <div class="flex">
            <h1 class="font-bold text-3xl tflex-1">Task</h1>
            <div class="tflex-initial">
                <a href="/tasks/{{ $task->id }}/edit">
                    <button class="tpx-4 tpy-2 text-white hover:bg-green-500" style="background-color: green">수정하기</button>
                </a>
                <form class="float-right" action="/tasks/{{ $task->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="tpx-4 tpy-2 text-white hover:bg-red-500" style="background-color: rgb(219, 129, 129)">삭제하기</button>
                </form>
            </div>
        </div>
        Title: {{ $task->title }} <small class="float-right">Created at: {{ $task->created_at }}</small> <br>
        <small class="float-right">Updated at: {{ $task->updated_at }}</small><br>
        Body
        <div class="border p-3">{{ $task->body }}</div>
    </div>
@endsection

@extends('layout')

@section('title')
    Tasks
@endsection

@section('content')
    <div class="px-5">
        <div class="flex">
            <h1 class="font-bold text-3xl tflex-1">Tasks List</h1>
            <a href="/tasks/create">
                <button class="text-white float-right tpx-4 tpy-2" style="background-color: green">Task 생성</button>
            </a>
        </div>
        <ul>
            @foreach ($tasks as $task)
                <a href="/tasks/{{ $task->id }}">
                    <li class="border my-3 p-3">
                        Title : {{ $task->title }}
                        <small class="float-right">
                            Created at {{ $task->created_at }}
                        </small>
                    </li>
                </a>
            @endforeach
        </ul>
    </div>
@endsection

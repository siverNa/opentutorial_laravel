@extends('layout')

@section('content')
    <h1>project list</h1>
    @foreach ($projects as $project)
        Title : {{ $project->title }}<br>
        Description : {{ $project->description }}<br>
    @endforeach
@endsection

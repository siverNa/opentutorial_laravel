<!-- 양식을 해당 blade.php 에서 가져온다는 뜻 -->
@extends('layout')

<!-- @yield('title') 에 들어갈 내용을 작성 가능 -->
@section('title')
	welcome
@endsection

@section('content')
	welcome
	<ul>
		@foreach ($books as $book)
			<li>{{ $book }}</li>
		@endforeach
	</ul>
@endsection

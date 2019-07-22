@extends('layouts.app')
@section('content')
	<div class='container'>
		@foreach($messages as $message)
			{{ $message->content }}
		@endforeach
	</div>
@endsection
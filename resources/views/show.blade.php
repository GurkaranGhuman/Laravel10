@extends('layouts.app')

@section('title')
<h1>{{$task->title}}</h1>
<p>{{ $task->description }}</p>
@endsection

@section('content')
@if($task->long_description)
<p>{{$task->long_description}}</p>
@endif

<p>{{ $task->created_at }}</p>
<p>{{ $task->updated_at }}</p>
@endsection
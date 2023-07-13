@extends('layouts.app')
@section('title', $task->title)
@section('content')
    <p>description: {{ $task->description }}</p>
    @if($task->long_description)
        <p>long_description: {{ $task->long_description }}</p>
    @endif
    <p>created_at: {{ $task->created_at }}</p>
    <p>updated_at: {{ $task->updated_at }}</p>
@endsection

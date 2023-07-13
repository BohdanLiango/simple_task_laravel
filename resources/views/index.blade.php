@extends('layouts.app')
@section('title', 'The list of tasks')
@section('content')
    @isset($tasks)
        @forelse($tasks as $item)
            <div><a href="{{ route('tasks.show', ['id' => $item->id]) }}">{{ $item->title }}</a></div>
        @empty
            There is not tasks
        @endforelse
    @endisset
@endsection



@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.index') }}" class="font-medium text-gray-700 underline decoration-pink-500">Back to the
            list!</a>
    </nav>
<p>{{ $task->description }}</p>
    <p class="mb-4 text-slate-700">
        @if ($task->long_description)
    </p>
    <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    @if ($task->is_completed)
    <span class="text-green-500 font-medium">Completed</span>
    @else
    <span class="text-red-500 font-medium">Not Completed</span>
    @endif



    <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} | Updated {{ $task->updated_at->diffForHumans() }}</p>


    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="rounded-md px-2 py-1 text-center font-medium-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-yellow-400">Edit</a>

        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit" class="rounded-md px-2 py-1 text-center font-medium-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-yellow-300">
                Mark as {{ $task->is_completed ? 'not Completed' : 'completed' }}</button>
        </form>


        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            {{-- <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');"> --}}
            @csrf
            @method('DELETE')
            <button type="submit" class="rounded-md px-2 py-1 text-center font-medium-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-red-500">Delete</button>
        </form>
    @endsection

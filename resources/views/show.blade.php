@extends('layouts.app')

@section('title', $task->title)

@section('content')

    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif
    <p>{{ $task->description }}</p>



    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>


<div class="flex gap-2">
    <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Edit</a>

</div>

<div class="flex gap-2">
    <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="post">
        @csrf
        @method('PUT')
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
            Mark as {{ $task->is_completed ? 'not Completed' : 'completed' }}</button>
    </form>
</div>

    <div class="flex gap-2">

        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST" >
             {{-- <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');"> --}}
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
        </form>
@endsection

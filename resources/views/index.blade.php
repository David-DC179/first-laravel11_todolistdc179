@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
<nav class="mb-4">
    <a href="{{ route('tasks.create') }}" class="font-medium text-gray-700 underline decoration-pink-500">Create Task</a>
</nav>

    thre is are tasks <br>
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', [$task->id]) }}"
                @class(['text-red-700' => $task->is_completed, 'line-through' => $task->is_completed ])>{{ $task->title }}</a>
        </div>

    @empty
        <div>
            there is no tasks

        </div>
    @endforelse

    @if ($tasks->count())
    <nav class="mt-4">
         {{ $tasks->links() }}
    </nav>


    @endif



@endsection

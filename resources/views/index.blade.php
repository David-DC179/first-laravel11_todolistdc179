@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
<div>
    <a href="{{ route('tasks.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Create Task</a>
</div>

    thre is are tasks <br>
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', [$task->id]) }}">{{ $task->title }}</a>
        </div>

    @empty
        <div>
            there is no tasks

        </div>
    @endforelse

    @if ($tasks->count())
    <nav>
         {{ $tasks->links() }}
    </nav>


    @endif



@endsection

@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')



@section('content')

    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST">
        @csrf
        @if (isset($task))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="title" class="block uppercase text-slate-700 mb-2">Title</label>
            <input type="text"
                class=" appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
            @error('title') border border-red-500 @enderror"
                id="title" name="title" value="{{ $task->title ?? old('title') }}">

            {{-- <input type="text" class=" appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none" id="title" name="title" value="{{ $task->title ?? old('title') }}"> --}}
            @error('title')
                <p class="text-red-500 text-sm ">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="block uppercase text-slate-700 mb-2">Description</label>
            <textarea type="text"
                class=" appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
                @error('description') border border-red-500 @enderror"
                id="description" name="description" rows="5">
            {{ $task->description ?? old('description') }}
        </textarea>
            @error('description')
                <p class="text-red-500 text-sm ">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="long_description" class="block uppercase text-slate-700 mb-2">Long Description</label>
            <textarea type="text"
                class=" appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
                 @error('long_description') border border-red-500 @enderror"
                id="long_description" name="long_description" rows="8">{{ $task->long_description ?? old('long_description') }} </textarea>
            @error('long_description')
                <p class="text-red-500 text-sm ">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center gap-2">



            <button type="submit"
                class="rounded-md px-2 py-1 text-center font-medium-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-green-400">
                @isset($task)
                    Update Task
                @else
                    Submit Task
                @endisset
            </button>
            @isset($task)
            <a href="{{ route('tasks.show', [$task->id]) }}"
                class="rounded-md px-2 py-1 text-center font-medium-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-red-400">
                Cancel edit
            </a>
            @else

                 <a href="{{ route('tasks.index') }}"
                class="rounded-md px-2 py-1 text-center font-medium-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-red-400">
                Cancel
            </a>
            @endisset


        </div>

    </form>

@endsection

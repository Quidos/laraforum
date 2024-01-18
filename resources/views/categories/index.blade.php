@extends('layouts.main')
@section('content')
<div class="flex">
    <div class="m-1 p-2 border rounded w-5/6 bg-white">
        @foreach ($categories as $category)
            <div>
                <a class="p-3 bg-gray-300 block" href="{{ route('threads', $category->id) }}">{{ $category->name }}</a>
                @foreach ($category->threads as $thread)
                    <div class="m-2 ml-4">
                        <a class="text-blue-500 hover:text-blue-900" href="{{ route('threads.show', $thread->id) }}">{{ $thread->title }}</a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="m-1 p-3 w-1/6 bg-white h-min">
        <div>Total users: {{ $noUsers }}</div>
        <div class="mt-2">
        Latest threads:
        @foreach ($latestThreads as $thread)
            <a class="text-blue-500 hover:text-blue-900 block p-1"
            href="{{ route('threads.show', $thread->id) }}">{{ $thread->title }}</a>
        @endforeach
        </div>
    </div>
</div>
@endsection

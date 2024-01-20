@extends('layouts.main')
@section('content')
<div class="flex">
    <div class="m-1 p-2 border rounded w-5/6 bg-white">
        @foreach ($categories as $category)
            <div>
                <a class="p-3 bg-gray-300 block" href="{{ route('threads', $category->id) }}">{{ $category->name }}</a>
                <div class="mt-2 mb-4">
                    @foreach ($category->threads as $thread)
                        <div class="">
                            <a class=""
                            href="{{ route('threads.show', $thread->id) }}">
                                <div class="flex p-2 border rounded border-gray-300 hover:bg-gray-100">
                                    <div class="text-blue-500 hover:text-blue-900 flex-grow">
                                        {{ $thread->title }}
                                    </div>
                                    <div class="mr-4">
                                        Posts: {{ $thread->posts->count() }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <div class="m-1 p-3 w-1/6 bg-white h-min">
        <div>Total users: {{ $noUsers }}</div>
        <div class="mt-2">
        Latest threads:
        @foreach ($latestThreads as $thread)
            <a class="text-blue-500 hover:text-blue-900 block"
            href="{{ route('threads.show', $thread->id) }}">
                <div class="p-2 border rounded border-gray-300">
                    {{ $thread->title }}
                </div>
            </a>
        @endforeach
        </div>
    </div>
</div>
@endsection

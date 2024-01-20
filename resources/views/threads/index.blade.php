@extends('layouts.main')
@section('content')
<div class="bg-white p-2">
    <div class="p-3 bg-gray-300 block">{{ $category->name }}</div>
    @auth
        <div class="my-3">
            <a class="p-2 bg-gray-400 hover:bg-gray-600 text-white rounded"
             href="{{ route('threads.create', $category->id) }}">New Thread</a>
        </div>
    @endauth
    <div class="p-1 flex flex-col">
    @foreach ($threads as $thread)
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
    @endforeach
    </div>
    <div id="pagination">
    {{ $threads->links('pagination::bootstrap-4') }}
</div>

</div>
@endsection

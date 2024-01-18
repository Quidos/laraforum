@extends('layouts.main')
@section('content')
<div class="bg-white p-2">
    <div class="p-3 bg-gray-300 block">{{ $category->name }}</div>
    @auth
        <div class="my-3">
            <a class="p-2 bg-gray-400 hover:bg-gray-600 text-white rounded" href="{{ route('threads.create', $category->id) }}">New Thread</a>
        </div>
    @endauth
    <div class="m-1 p-1 border flex flex-col">
    @foreach ($threads as $thread)
        <a class="text-blue-500 hover:text-blue-900 block p-1" href="{{ route('threads.show', $thread->id) }}">
            {{ $thread->title }}
        </a>
    @endforeach
    </div>
    <div id="pagination">
    {{ $threads->links('pagination::bootstrap-4') }}
</div>

</div>
@endsection

@extends('layouts.main')
@section('content')
<div class="bg-white p-2">
    <div class="ml-2 font-bold">{{ $thread->title }}</div>
    <div class="m-2">
        @foreach ($posts as $post)
        <div class="flex m-2 min-h-32">
            <div class="w-40">
                <a class="text-blue-500 hover:text-blue-900" href="{{ route('user.show', $post->user->name) }}">{{ $post->user->name }}</a>
            </div>
            <div class="grow">
                    {{ $post->content }}
            </div>
            @can('delete', $post)
                <form class="" action="{{ route('posts.delete', [$thread->id, $post->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <input class="p-1 bg-gray-400 hover:bg-gray-600 cursor-pointer" type="submit" value="Delete">
                </form>
            @endcan
        </div>
        <div class="bg-gray-300 h-0.5"></div>
        @endforeach
        <form class="mt-2 flex flex-col" action="{{ route('posts.store', $thread->id) }}" method="post">
            @csrf
            <textarea class="border rounded p-1"
            name="content" id="content" placeholder="Post content..." cols="30" rows="5"></textarea>
            <input class="p-1 bg-blue-600 hover:bg-blue-900 cursor-pointer w-min text-white rounded"
             type="submit" value="Create a post">
        </form>
    </div>
</div>
@push('scripts')
<script>
    console.log('test')
</script>
@endpush
@endsection

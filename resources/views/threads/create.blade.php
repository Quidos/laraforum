@extends('layouts.main')
@section('content')
<div class="p-2 bg-white">
    <form class="flex flex-col" action="{{ route('thread.store', $category->id) }}" method="post">
        @csrf
        <input class="m-1 p-1 outline outline-1 rounded" type="text" name="title" id="title" placeholder="Thread title...">
        <textarea class="m-1 p-1 outline outline-1 rounded" name="content" id="content" cols="30" rows="10" placeholder="Content..."></textarea>
        <input type="submit" value="Create thread">
    </form>
</div>
@endsection

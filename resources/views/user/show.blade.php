@extends('layouts.main')
@section('content')
<div class="p-2 bg-white">
    <div class="text-lg font-bold">{{ $user->name }}</div>
    <div>
        @if (!Auth::user()->friendExists($user))
            <form action="{{ route('friendships.store', $user->id) }}" method="post">
                @csrf
                <input class="cursor-pointer" type="submit" value="Add friend">
            </form>
        @endif
    </div>
    <div class="mt-8">
        <div>User's threads:</div>
        @foreach ($threads as $thread)
            <div>
                <a class="text-blue-500 hover:text-blue-900 block p-1"
                 href="{{ route('threads.show', $thread->id) }}">{{ $thread->title }}</a>
            </div>
        @endforeach
    </div>
</div>
@endsection

@extends('layouts.main')
@section('content')
<div class="p-2 bg-white flex">
    <div class="w-60">
    <div class="text-lg font-bold">{{ $user->name }}</div>
        @auth
        <div class="pt-2">
            @if (Auth::user()->id == $user->id)
                <div></div>
            @elseif (Auth::user()->pendingFriendsToExists($user))
                <div>Friend request sent</div>
                <form action="{{ route('friendships.cancel', $user->id) }}" method="post">
                    @csrf
                    <input type="submit" value="Cancel">
                </form>

            @elseif(Auth::user()->pendingFriendsFromExists($user))
                <div>Friend request received</div>
                <form action="{{ route('friendships.accept', $user->id) }}" method="post">
                    @csrf
                    <input type="submit" value="Accept">
                </form>
                <form action="{{ route('friendships.decline', $user->id) }}" method="post">
                    @csrf
                    <input type="submit" value="Decline">
                </form>

            @elseif (Auth::user()->friendExists($user))
                <a class="p-1 rounded bg-blue-600 hover:bg-blue-900 cursor-pointer text-white"
                 href="{{ route('messages', $user->id) }}">Message</a>
                <form action="{{ route('friendships.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <input class="p-1 rounded hover:bg-gray-300 cursor-pointer border border-gray-300"
                     type="submit" value="Unfriend">
                </form>

            @else
                <form action="{{ route('friendships.store', $user->id) }}" method="post">
                    @csrf
                    <input class="cursor-pointer" type="submit" value="Add friend">
                </form>
            @endif
        </div>
        @endauth
    </div>
    <div class="w-full mr-5">
        <div>User's threads:</div>
        @foreach ($threads as $thread)
            <div>
                <a class="text-blue-500 hover:text-blue-900 block"
                 href="{{ route('threads.show', $thread->id) }}">
                    <div class="p-2 border rounded border-gray-300 w-full hover:bg-gray-300">
                        {{ $thread->title }}
                    </div>
                </a>
            </div>
        @endforeach
        <div class="mt-2">
            {{ $threads->links() }}
        </div>
    </div>
</div>
@endsection

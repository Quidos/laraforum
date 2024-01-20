@extends('layouts.main')
@section('content')
<div class="p-2 bg-white flex">
    <div class="flex flex-col w-1/4">
        <div class="m-2">
            <div class="font-bold">Friend Requests:</div>
                @foreach ($pending as $user)
                <div class="flex items-center p-2 border rounded border-gray-300 w-60">
                    <a class="text-blue-400 flex-grow"
                     href="{{ route('user.show', ['user'=>$user->name]) }}">{{ $user->name }}</a>
                    <form class="ml-2" action="{{ route('friendships.accept', $user->id) }}" method="post">
                        @csrf
                        <input class="p-1 rounded bg-blue-600 hover:bg-blue-900 cursor-pointer text-white"
                         type="submit" value="Accept">
                    </form>
                    <form class="ml-2"
                     action="{{ route('friendships.decline', $user->id) }}" method="post">
                        @csrf
                        <input class="p-1 rounded hover:bg-gray-300 cursor-pointer border border-gray-300""
                         type="submit" value="Decline">
                    </form>
                </div>
                @endforeach
        </div>
        <div class="m-2">
            <div class="font-bold">Friends:</div>
            @foreach ($acceptedFriends as $user)
                <div>
                    <a class="text-blue-400 hover:text-blue-600"
                     href="{{ route('messages', ['user'=>$user->id]) }}">
                     <div class="flex p-2 border rounded border-gray-300 w-60 hover:bg-gray-300">
                        {{ $user->name }}
                     </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="hidden">{{ $chatUser->name }}</div>
    @if (Auth::user()->id != $chatUser->id)
        <x-chat :messages="$messages" :chatUser="$chatUser" />
    @else
        <div class="flex justify-center w-full items-center">Select a friend to start chatting!</div>
    @endif
</div>

@endsection

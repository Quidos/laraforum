@extends('layouts.main')
@section('content')
<div class="p-2 bg-white flex">
    <div class="flex flex-col w-1/4">
        <div>
            <div>Friend Requests:</div>
                @foreach ($pending as $user)
                <div class="flex">
                    <a class="text-blue-400" href="{{ route('user.show', ['user'=>$user->name]) }}">{{ $user->name }}</a>
                    <form action="{{ route('friendships.acccept', $user->id) }}" method="post">
                        @csrf
                        <input type="submit" value="Accept">
                    </form>
                    <form action="{{ route('friendships.decline', $user->id) }}" method="post">
                        @csrf
                        <input type="submit" value="Decline">
                    </form>
                </div>
                @endforeach
        </div>
        <div>
            <div>Friends:</div>
            @foreach ($acceptedFriends as $user)
                <div class="flex">
                    <a class="text-blue-400" href="{{ route('user.show', ['user'=>$user->name]) }}">{{ $user->name }}</a>
                </div>
                @endforeach
        </div>
    </div>
    <div class="h-screen">
        Messages
    </div>
</div>

@endsection

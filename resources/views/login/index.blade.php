@extends('layouts.main')
@section('content')
<div class="mt-40 flex justify-center">
    <form class="flex flex-col bg-white p-10 border rounded" action="{{ route('login') }}" method="post">
        @csrf
        <input class="p-2" type="text" name="name" id="name" placeholder="name">
        @error('name')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
        <input class="p-2 mt-1" type="password" name="password" id="password" placeholder="password">
        <input class="cursor-pointer bg-gray-400 text-white border rounded mt-1 hover:bg-gray-600" type="submit" value="Log in">
    </form>
</div>
@endsection

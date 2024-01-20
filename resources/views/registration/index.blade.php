@extends('layouts.main')
@section('content')
<div class="mt-40 flex justify-center">
    <form class="flex flex-col bg-white p-10 border rounded" action="{{ route('registration') }}" method="post">
        @csrf
        <input class="p-2" type="text" name="name" id="name" placeholder="name" autofocus>
        @error('name')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
        <input class="p-2" type="email" name="email" id="email" placeholder="email">
        <input class="p-2 mt-1" type="password" name="password" id="password" placeholder="password">
        <input class="cursor-pointer bg-gray-400 text-white border rounded mt-1 hover:bg-gray-600" type="submit" value="Register">
    </form>
</div>

@endsection

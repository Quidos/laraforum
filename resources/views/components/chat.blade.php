<div class="w-full p-5">
    <a class="font-bold text-blue-400 hover:text-blue-600" href="{{ route('user.show', $chatUser->name) }}">{{ $chatUser->name }}</a>
    <div class="flex flex-col-reverse overflow-auto max-h-96 p-5">
        @foreach ($messages as $message)
            @if ($message->sender_id == Auth::user()->id)
            <div class="flex ml-auto items-center">
                <div class="text-sm">{{ $message->updated_at->diffForHumans() }}</div>
                <div class=" bg-blue-400 w-fit p-5 m-2 rounded-lg">
                    <div>{{ $message->content }}</div>
                </div>
            </div>
            @else
            <div class="flex items-center">
                <div class=" bg-gray-300 w-fit p-5 m-2 rounded-lg">
                    <div>{{ $message->content }}</div>
                </div>
                <div class="text-sm">{{ $message->updated_at->diffForHumans() }}</div>
            </div>
            @endif
        @endforeach
    </div>
    <form class="w-full flex flex-col items-start m-4 mr-8" action="{{ route('messages.store', $chatUser->id) }}" method="post">
        @csrf
        <input type="text" class="w-full border rounded p-2 border-slate-400 pb-12" autofocus
         name="content" id="content"  placeholder="Your message..."></textarea>
        <input class="px-4 py-2 rounded text-white my-2 bg-blue-600 hover:bg-blue-900 cursor-pointer"
         type="submit" value="Send">
    </form>
</div>

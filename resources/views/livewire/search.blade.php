<div>
    <input wire:model="query" type="text" name="query" id="query" placeholder="Search...">
    <ul>
        @foreach ($threads as $thread)
            <li>
                {{ $thread->title }}
            </li>
        @endforeach
    </ul>
</div>

<?php

namespace App\Livewire;

use App\Models\Thread;
use Livewire\Component;

class Search extends Component
{
    public $query = '';
    public function render()
    {
        $threads = Thread::where('title', 'like', '%' . $this->query . '%')->get();
        return view('livewire.search', compact('threads'));
    }
}

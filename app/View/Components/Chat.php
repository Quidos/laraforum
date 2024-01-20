<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Chat extends Component
{
    /**
     * Create a new component instance.
     */

     public $messages;
     public $chatUser;

    public function __construct(
        $messages,
        $chatUser
    )
    {
        $this->messages = $messages;
        $this->chatUser = $chatUser;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.chat');
    }
}

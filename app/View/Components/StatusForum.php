<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusForum extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(protected string $status)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $color = 'blue';
        $color = $this->status === 'C' ? 'green' : $color;
        $color = $this->status === 'P' ? 'red' : $color;
        $textStatus = getStatusForum($this->status);

        return view('components.status-forum', compact('textStatus', 'color'));
    }
}

<?php

namespace App\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class Index extends Component
{
    public $events;

    public function mount()
    {
        $today = now();
        // Get yesterday's date
        $yesterday = $today->subDays(1);
        $this->events = Event::where('start_date', '>=', $yesterday)->orderBy('start_date', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.events.index')
            ->title('Upcoming events at ' . env('CHURCH_NAME'));
    }
}

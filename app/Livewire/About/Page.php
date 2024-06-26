<?php

namespace App\Livewire\About;

use Livewire\Component;
use App\Models\AboutDetail;
use App\Models\AboutSection;

class Page extends Component
{

    public $details;
    public $sections;

    public function mount()
    {
        $this->details = AboutDetail::firstOrFail();
        $this->sections = AboutSection::all();
    }

    public function render()
    {
       
        return view('livewire.about.page')
        ->title('About Bible Baptist Church in Mattoon, IL');
    }
}

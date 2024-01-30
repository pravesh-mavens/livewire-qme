<?php

namespace App\Livewire\Quote;

use Livewire\Component;

class Customize extends Component
{
    
    public $isOpen = false;

    protected $listeners = ['toggleSlideOver'];

    public function render()
    {
        return view('livewire.quote.customize');
    }

    #[On('toggleSlideOver')]
    public function toggleSlideOver()
    {
        $this->isOpen = !$this->isOpen;
    }
}

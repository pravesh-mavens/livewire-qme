<?php

namespace App\Livewire\Quote;

use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class Customize extends Component
{
    
    public $isOpen = false;
    public $loading = false;

    #[Reactive]
    public $productSelection;

    public $productArr;
    public $openSection = null;
    public $defaultProductImg;

    protected $listeners = ['toggleSlideOver', 'productSelection'];

    public function mount(){
        $this->defaultProductImg = Storage::disk('public')->url('default-images/index.jpeg');
    }

    public function render()
    {
        return view('livewire.quote.customize');
    }

    #[On('toggleSlideOver')]
    public function toggleSlideOver($product)
    {
        $this->openSection = null;
        $this->productArr = $product;
        $this->isOpen = !$this->isOpen;
    }

    public function rendered(){
        $this->loading = false;
        $this->dispatch('nestedComponentLoaded', $this->loading);
    }

    public function toggleSection($index)
    {
        $this->openSection = $this->openSection === $index ? null : $index;
    }

    #[on('productSelection')]
    public function productSelection($updatedData){
        $this->productSelection = $updatedData;
    }
}

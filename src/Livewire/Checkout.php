<?php

namespace Naykel\Orderit\Livewire;

use Livewire\Component;

class Checkout extends Component
{

    public $total;

    protected $listeners = [
        'cartUpdated' => 'test',
        'refresh' => '$refresh',
    ];

    public function mount()
    {
        $this->total = session('cartTotal');
    }

    public function test()
    {
        $this->total = session('cartTotal');
        $this->emitSelf('refresh');
    }


    public function render()
    {
        return view('orderit::checkout.checkout')->layout('gotime::layouts.app');
    }
}

<?php

namespace Naykel\Orderit\Livewire;

use Livewire\Component;

class AddToCartButton extends Component
{

    public int $qty = 1;
    public int $currentQty = 0; // current qty in cart
    public int $productId;

    public function hydrate(): void
    {
        $this->currentQty = cart()->getCurrentQty($this->productId);
    }

    /**
     * add product to cart
     */
    public function add(): void
    {

        $qty = $this->currentQty + (int) $this->qty;

        if ($qty < 1) {
            return;
        }

        cart()->add($this->productId, $qty);

        $this->qty = 1; // reset qty

        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('orderit::cart.add-to-cart-button');
    }
}

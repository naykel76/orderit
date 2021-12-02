<?php

namespace Naykel\Orderit\Livewire;

use Naykel\Orderit\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Component;

class Cart extends Component
{
    public array $cart = [];
    public array $products = [];
    public int $total = 0;
    public $showCart = true;

    protected $listeners = [
        'toggleCart' => 'toggle',
        'cartUpdated' => 'hydrate',
    ];

    /**
     * Hydrate component
     * @return void
     */
    public function hydrate(): void
    {
        $this->cart = cart()->all();

        $this->products = tap(
            $this->products(),
            fn (Collection $products) => $this->total = $products->sum('total')
        )->toArray();
    }

    /**
     * Get cart products.
     *
     * @return Collection
     */
    public function products(): Collection
    {

        if (empty($this->cart)) {
            return new Collection;
        }

        return Product::whereIn('id', array_keys($this->cart))
            ->get()
            ->map(function (Product $product) {
                return (object)[
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    // 'formatted_price' => $product->formatted_price,
                    'qty' => $qty = $this->cart[$product->id],
                    'total' => $product->price * $qty,
                ];
            });
    }


    public function remove(int $id): void
    {
        cart()->remove($id);
        $this->update();
    }

    public function increase(int $id): void
    {
        cart()->add($id, $this->cart[$id] + 1);
        $this->update();
    }

    public function decrease(int $id): void
    {
        if (($qty = $this->cart[$id] - 1) < 1) {
            $this->remove($id);
        } else {
            cart()->add($id, $qty);
            $this->update();
        }
    }

    private function update(): void
    {
        $this->emit('cartUpdated');
    }

    /**
     * Toggle the cart visibility.
     * @return void
     */
    public function toggle(): void
    {
        $this->showCart = !$this->showCart;
    }

    public function render()
    {
        return view('orderit::cart.cart');
    }
}

<div>

    @if($showCart)

        <div class="bx maxw600 mb">

            <div class="bx-title">Cart Items</div>

            <div class="bx-content">

                @forelse($products as $product)

                    <hr class="my-1">

                    <div class="flex space-between ">

                        <div>
                            {{ $product->name }} <br>
                            ${{ $product->price }}
                        </div>

                        <div>

                            <x:gotime::icon wire:click="decrease({{ $product->id }})" icon="minus-round" />
                            {{ $product->qty }}
                            <x:gotime::icon wire:click="increase({{ $product->id }})" icon="plus-round" />
                            <button wire:click="remove({{ $product->id }})" class="link txt-lower">remove</button>
                        </div>

                    </div>

                @empty
                    <p>No products in cart.</p>
                @endforelse
            </div>

            <div class="bx-footer tar">
                <strong>Total:</strong> ${{ $this->total }}
                <button type="button" class="btn success"> Checkout </button>
            </div>

        </div>

    @endif

</div>

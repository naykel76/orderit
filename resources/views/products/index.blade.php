<x-gotime-app-layout layout="{{ config('naykel.template') }}">

    <livewire:cart-button />


    <h1>List of products</h1>

    <div class="grid cols-4">

        @forelse($products as $product)

            <div class="product">

                <div class="bx">

                    <div id="product-thumbnail" class="bx-header nbdr nbg tac np">

                        <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}">

                    </div>

                    <div class="bx-content">

                        <a href="{{ route('product.show', $product->id) }}">
                            <h3>${{ $product->price }}</h3>
                            {{ $product->name }}
                        </a>

                    </div>

                    <div class="bx-footer">

                        <livewire:add-to-cart-button :productId="$product->id" />

                    </div>

                </div>

            </div>

        @empty

            <p>There are no products available.</p>

        @endforelse
    </div>

</x-gotime-app-layout>


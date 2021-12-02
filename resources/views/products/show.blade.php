<x-gotime-app-layout layout="{{ config('naykel.template') }}">

    <livewire:cart-button />

    <livewire:cart />

    <div class="bx ">

        <div class="grid cols-2">

            <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}">

            <div class="px bdr-l">

                <div class="my">
                    <h1>{{ $product->name }}</h1>
                    <h3>${{ $product->price }}</h3>
                </div>

                <livewire:add-to-cart-button :productId="$product->id" />

                <p> {{ $product->description }} </p>

            </div>

        </div>

    </div>

</x-gotime-app-layout>

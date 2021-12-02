<div>

    <div class="flex">

        <x-gotime-input wire:model="qty" for="qty" :inline=true class="maxw100 tac mr" />

        <button wire:click="add" class="btn primary">

            <x:gotime::icon icon="cart" />

            <span>Add To Cart</span>

        </button>

    </div>

</div>

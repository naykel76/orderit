<?php

namespace Naykel\Orderit;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;
use Naykel\Orderit\Livewire\AddToCartButton;
use Naykel\Orderit\Livewire\Cart;
use Naykel\Orderit\Livewire\CartButton;
use Naykel\Orderit\Repositories\Session\CartRepository;
use Naykel\Orderit\Repositories\Contracts\CartRepositoryContract;

class OrderitServiceProvider extends ServiceProvider
{
    public $singletons = [
        CartRepositoryContract::class => CartRepository::class,
    ];

    public function register()
    {
        // Be sure to import Livewire components up the top
        $this->app->afterResolving(BladeCompiler::class, function () {
            Livewire::component('add-to-cart-button', AddToCartButton::class);
            Livewire::component('cart', Cart::class);
            Livewire::component('cart-button', CartButton::class);
        });
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'orderit');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        // $this->commands([InstallCommand::class,]);
    }
}

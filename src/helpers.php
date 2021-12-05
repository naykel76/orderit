<?php

use Naykel\Orderit\Repositories\Contracts\CartRepositoryContract;

if (!function_exists('cart')) {
    function cart()
    {
        return app(CartRepositoryContract::class);
    }
}

if (!function_exists('dollarsToCents')) {
    function dollarsToCents(int $number)
    {
        return number_format(($number / 100), 2);
    }
}

if (!function_exists('centsToDollars')) {
    function centsToDollars(int $number)
    {
        return number_format(($number * 100), 2);
    }
}

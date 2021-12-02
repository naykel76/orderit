<?php

namespace Naykel\Orderit\Repositories\Contracts;

interface CartRepositoryContract
{

    /**
     * Get all products in the cart.
     *
     * @return array
     */
    public function all(): array;

    /**
     * Add product to cart.
     *
     * @param int $id
     * @param int $qty
     * @return void
     */
    public function add(int $id, int $qty): void;


    /**
     * Get product's current quantity.
     *
     * @param int $id
     * @return int
     */
    public function getCurrentQty(int $id): int;

    /**
     * Remove item from cart.
     * @param int $id
     * @return void
     */
    public function remove(int $id): void;
}

<?php

namespace Naykel\Orderit\Repositories\Session;

use Naykel\Orderit\Repositories\Contracts\CartRepositoryContract;
use Illuminate\Contracts\Session\Session;

class CartRepository implements CartRepositoryContract
{

    public function __construct(private Session $session)
    {
    }

    /**
     * @inheritDoc
     */
    public function all(): array
    {
        return $this->session->get('cart', []);
    }

    /**
     * @inheritDoc
     */
    public function add(int $id, int $qty): void
    {
        $this->session->put($this->product($id), $qty);
    }

    /**
     * Get product details.
     * @param int $id
     * @return string
     */
    private function product(int $id): string
    {
        return 'cart.' . $id;  // === ['cart' => [productId => qty]] === ['cart' => [87, 2]]
    }

    /**
     * @inheritDoc
     */
    public function getCurrentQty(int $id): int
    {
        return $this->session->get($this->product($id), 0);
    }

    /**
     * @inheritDoc
     */
    public function remove(int $id): void
    {
        $this->session->remove($this->product($id));
    }
}

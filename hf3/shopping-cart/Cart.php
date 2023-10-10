<?php


class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    // TODO Generate getters and setters of properties

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        //TODO Implement method
        // foreach ($this->items as $item) {
        //     if ($item->getProduct === $product) {
        //         $item->increaseQuantity($quantity);
        //     }else{
        //         $items[] = $product;
        //     }
        // }
        foreach ($this->items as $item) {
            if ($item->getProduct() === $product) {
                $item->setQuantity(min($item->getQuantity() + $quantity, $product->getAvailableQuantity()));
                return $item;
            }
        }
        $cartItem = new CartItem($product, $quantity);
        $this->items[] = $cartItem;
        return $cartItem;

    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        //TODO Implement method
        foreach ($this->items as $key => $item) {
            if ($item->getProduct() === $product) {
                unset($this->items[$key]);
                return;
            }
        }
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        //TODO Implement method
        $totalQuantity = 0;
        foreach ($this->items as $item) {
            $totalQuantity += $item->getQuantity();
        }
        return $totalQuantity;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        //TODO Implement method
        $totalSum = 0;
        foreach ($this->items as $item) {
            $db=$item->getProduct()->getAvailableQuantity();
            $price=$item->getProduct()->getPrice();
            // echo "<br>db $db <br>";
            // echo "<br>price $price <br>";
            $totalSum += $db * $price;
        }
        return $totalSum;
    }
}
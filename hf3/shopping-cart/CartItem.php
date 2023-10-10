<?php


class CartItem
{
    private Product $product;
    private int $quantity;

    // TODO Generate constructor with all properties of the class
    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }
    // TODO Generate getters and setters of properties

    public function getProduct(): Product
    {
        return $this->product;
    }

    // public function setProduct($product): void{
    //     $this->product = $product;
    // }

    public function getQuantity(): int{
        return $this->quantity;
    }

    public function setQuantity($quantity): void{
        $this->quantity = max(1, min($quantity, $this->product->getAvailableQuantity()));
    }

    public function increaseQuantity()
    {
        //TODO $quantity must be increased by one.
        // Bonus: $quantity must not become more than whatever is Product::$availableQuantity
        if ($this->product->getAvailableQuantity() > $this->quantity) {
            $this->quantity += 1;
        }
    }

    public function decreaseQuantity()
    {
        //TODO $quantity must be increased by one.
        // Bonus: Quantity must not become less than 1
        if ($this->quantity > 1) {
            $this->quantity -= 1;
        }
    }
}
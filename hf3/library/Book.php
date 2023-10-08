<?php


class Book
{
    private string $title;
    public float $price;
    public ?Author $author;

    public function __construct($title, $price, ?Author $author = null)
    {
        $this->title = $title;
        $this->price = $price;
        $this->author = $author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setAuthor(?Author $author): void
    {
        $this->author = $author;
    }

    public function __toString(): string
    {
        return "$this->title: $this->price: $this->author";
    }

    // TODO Generate getters and setters of properties
    // TODO Generate constructor for all attributes. $author argument of the constructor can be optional
}
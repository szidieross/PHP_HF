<?php


class Author
{
    public string $name;
    public $books = [];

    // TODO Generate getters and setters of properties
    // TODO Generate constructor for all attributes. $books argument of the constructor can be optional

    public function __construct(string $name, array $books=[])
    {
        $this->name = $name;
        $this->books=$books;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $title
     * @param float  $price
     * @return \Book
     */
    public function addBook(string $title, float $price): Book
    {
        // TODO Create instance of the book. Add into $books array and return it
        $book = new Book($title, $price);
        $this->books[] = $book;
        // echo $book;
        return $book;
    }

    public function getBooks(): array
    {
        var_dump($this->books);
        return $this->books;
    }

    public function __toString(): string{
        return "$this->name";
    }
}
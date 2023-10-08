<?php
require_once "AbstractLibrary.php";
require_once "Author.php";

class Library extends AbstractLibrary
{
    public $authors = array();

    // TODO Implement all the methods declared in AbstractLibrary class
    public function addAuthor(string $authorName): Author
    {
        $author = new Author($authorName);
        /**
         * Method accepts author name and Book. Finds author in $authors array and adds book to this array.
         * The method must set $book's $author property with the found author also.
         * This method is equivalent of Author::addBook
         *
         * @param      $authorName
         * @param Book $book
         */
        return $author;
    }

    public function addBookForAuthor($authorName, Book $book)
    {
        /**
         * Method returns books for given author
         *
         * @param $authorName
         */

    }

    public function getBooksForAuthor($authorName)
    {
        /**
         * Method searches for book and returns instance of Book
         *
         * @param string $bookName
         * @return Book
         */

    }

    public function search(string $bookName): Book
    {
        /**
         * This method must print every author and for each author all its books in the following format
         * AuthorName
         * ----------------------
         * BookName - price
         * Book2Name - price
         * ...
         *
         * AnotherAuthorName
         * ----------------------
         * AnotherBookName - price
         * ...
         */

    }

    public function print()
    {

    }
}
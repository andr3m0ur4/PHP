<?php

    class Book
    {
        private $title;
        private $author;

        public function __construct($title, $author)
        {
            $this->title = $title;
            $this->author = $author;
        }

        public function getTitle()
        {
            return $this->title;
        }

        public function getAuthor()
        {
            return $this->author;
        }
    }

    class BookList
    {
        private $books;
        private $currentIndex;

        public function __construct()
        {
            $this->currentIndex = 0;
        }

        public function addBook(Book $book)
        {
            $this->books[] = $book;
        }

        public function count()
        {
            return count($this->books);
        }

        public function removeBook(Book $book)
        {
            foreach ($this->books as $key => $value) {
                if (($value->getTitle() . $value->getAuthor()) == ($book->getTitle() . $book->getAuthor())) {
                    unset($this->books[$key]);
                }
            }

            $this->books = array_values($this->books);
        }

        public function current()
        {
            return $this->books[$this->currentIndex];
        }

        public function next()
        {
            $this->currentIndex++;
        }

        public function key()
        {
            return $this->currentIndex;
        }

        public function reset()
        {
            $this->currentIndex = 0;
        }

        public function valid()
        {
            return isset($this->books[$this->currentIndex]) ? true : false;
        }
    }

    $book1 = new Book('Livro Teste', 'Fulano');
    $book2 = new Book('Livro Mágico', 'Ciclano');
    $book3 = new Book('Livro Crônicas de Alguém', 'Beltrano');

    $booklist = new BookList();
    $booklist->addBook($book1);
    $booklist->addBook($book2);
    $booklist->addBook($book3);

    /* echo "TOTAL: {$booklist->count()} <hr>";

    $booklist->removeBook($book2);
    echo "TOTAL: {$booklist->count()} <hr>"; */

    /* $book1 = $booklist->current();
    echo "Livro: {$book1->getTitle()} - {$book1->getAuthor()} <hr>";

    $booklist->next();

    $book2 = $booklist->current();
    echo "Livro: {$book2->getTitle()} - {$book2->getAuthor()} <hr>";

    $booklist->reset();

    $book3 = $booklist->current();
    echo "Livro: {$book3->getTitle()} - {$book3->getAuthor()} <hr>"; */

    while ($booklist->valid()) {
        $livro = $booklist->current();

        echo "LIVRO: {$livro->getTitle()} - {$livro->getAuthor()} <br>";

        $booklist->next();
    }

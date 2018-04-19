<?php
include_once 'models/book.php';
include_once 'config/database.php';

class Repo {

private $conn;

public function __construct($db)
{
    $this->conn = $db;
}

public function getAll()
{
    $query = "SELECT authors.name, books.bookId, authors.authorId, books.title, books.year FROM books LEFT JOIN authors ON authors.authorId=books.authorId ORDER BY bookId DESC";
    $result = $this->conn->prepare($query);
    $result->execute();
    $books = [];
    while ($row = $result->fetch(PDO::FETCH_OBJ)) {
        $obj = new Book();
        $obj
            ->setBookId($row->bookId)
            ->setAuthor($row->name)
            ->setTitle($row->title)
            ->setYear($row->year);
        $books[] = $obj;
    }
    return $books;
}

public function showBook($id){
    $query = "SELECT `bookId`, `title`, `authors`.`name`, `year`  FROM `books` LEFT JOIN `authors` ON `books`.`authorId` = `authors`.`authorId` WHERE bookId = :bookId";
    $result = $this->conn->prepare($query);
  

    $result->execute([':bookId' => $id]);
		if ($result->rowCount() == 0)
			return null;
		$row = $result->fetch(PDO::FETCH_OBJ);
		$obj = new Book();
		$obj
			->setBookId($row->bookId)
			->setAuthor($row->name)
			->setTitle($row->title)
			->setYear($row->year);
		return $obj;
}

}

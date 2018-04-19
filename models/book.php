<?php

class Book
{
	public $bookId, $author, $title, $year;

	public function getBookId()
	{
		return $this->bookId;
	}

	public function setBookId($bookId)
	{
		$this->bookId = $bookId;
		return $this;
	}

	public function getAuthor()
	{
		return $this->author;
	}

	public function setAuthor($author)
	{
		$this->author = $author;
		return $this;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = $title;
		return $this;
	}

	public function getYear()
	{
		return $this->year;
	}

	public function setYear($year)
	{
		$this->year = $year;
		return $this;
	}
}



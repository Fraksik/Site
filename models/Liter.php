<?php

namespace fraksik\models;


class Liter
{
	public $author;
	public $book;

	public function __construct($author, $book)
	{
		$this->author = $author;
		$this->book = $book;
	}
}
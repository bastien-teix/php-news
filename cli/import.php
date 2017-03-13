<?php

include __DIR__.'/../vendor/autoload.php';

$pdo = new PDO('sqlite:./database.sqlite');

$stmt = $pdo -> prepare ("INSERT INTO article (title, description, link, author) VALUES (:title, :description, :link, :author) ");

$feed = Zend\Feed\Reader\Reader::import('http://www.topito.com/feed');

foreach ($feed as $item) {
	$stmt -> execute ([
		'title' => $item -> getTitle(),
		'description' => $item -> getDescription(),
		'link' => $item -> getLink(),
		'author' => $item -> getAuthor(0)['name']
		]);
}
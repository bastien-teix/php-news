<?php

//phpinfo();

$pdo = new PDO('sqlite:./database.sqlite');  

$idArticle = $_GET['idArticle'];

if (isset($idArticle)){

	$delete = $pdo->prepare('DELETE FROM article WHERE id = :idArticle');

	$delete->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);

	$delete->execute();

	$count = $delete->rowCount();

	if($count==0){
		http_response_code(404);
		include('404.php'); // provide your own HTML for the error page
		die();
	}

}

$stmt = $pdo->prepare('SELECT * FROM article');

$stmt->execute();

$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($articles);

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="web/css/main.css"/>
	<link rel="stylesheet" href="web/css/bootstrap.css"/>
</head>
	<body class="container">
	<div class="row">
		<?php foreach($articles as $article): ?>
			<div class="col-sm-4">
				<div class="col">
					<a href="?idArticle=<?php echo($article['id']) ?>"><span class="btn glyphicon glyphicon-trash" data-id="<?php echo($article['id']); ?>"></span></a>
					<h1> <?php echo $article['title']; ?> </h1>
					<h2> <?php echo $article['author']; ?> </h2>
					<p> <?php echo $article['description']; ?> </p>
					<a href="<?php echo $article['link']; ?>" class="info"> 
					<span class="glyphicon glyphicon-info-sign"></span> En savoir plus...
					</a>
				</div>
			</div>
		<?php endforeach ?>
	</div>
	<script src="web/js/app.js" type="text/javascript"></script>
 	</body>
</html>
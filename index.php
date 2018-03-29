<?php

include_once('includes/db.php');
include_once('includes/article.php');

$article = new Article;
$articles = $article->fetch_all();

echo md5('admintestcms');

?>

<html>
	<head>
		<meta charset="utf-8">
		<title>CMS Tutorial</title>
		<link rel="stylesheet" href="assets/style.css" />
	</head>
	<body>
		<div class="container">
<a href="index.php" id="logo">CMS TEST Eddy</a>
		<ol>
			<?php foreach ($articles as $article) { ?>
			<li><a href="article.php?id=<?php echo $article['article_id']; ?>">
				<?php echo $article['article_title']; ?>
				</a>
				-<small>
					Créer le <?php echo date('d/m/y \à\ H:m:s', $article['article_timestamp']); ?>
				</small>
			</li>
			<?php } ?>
		</ol>
		<br/>
		<small><a href="admin">Admin</a></small>
		</div>
	</body>
</html>

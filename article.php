<?php

include_once('includes/db.php');
include_once('includes/article.php');

$article = new Article;

if (isset($_GET['id'])) {
    $id = $_GET['id']; // Affiche l'article
    $data = $article->fetch_data($id);

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
      <h4>
        <?php echo $data['article_title']; ?></h4>
        <small>
          Créer le <?php echo date ('d/m/y \à\ H:m:s'); ?>
        </small>

        <p><?php echo $data['article_content']; ?></p>

        <a href="index.php">&larr; Retour</a>
    		</div>
    	</body>
    </html>
<?php
} else {
    header('Location: index.php');
    exit();
}
?>

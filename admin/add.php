<?php

session_start();

include_once('../includes/db.php');


if (isset($_SESSION['logged_in'])) {
  if (isset($_POST['title'], $_POST['content'])) {
      $title = $_POST['title'];
      $content =  nl2br($_POST['content']);

      if (empty($title) or empty($content)) { // Verifie que les champs ne sont pas vide
          $error = 'Tout les champs doivent être remplis !';
        } else { // Si ils ne sont pas vide on les rentre dans la DB

                      $query = $pdo->prepare('INSERT INTO articles (article_title, article_content, article_timestamp) VALUES (?, ?, ?)');

                      $query->bindValue(1, $title);
                      $query->bindValue(2, $content);
                      $query->bindValue(3, time());

                      $query->execute();

                      header('Location: index.php');

                  }
              }

    ?>
    <html>
      <head>
        <meta charset="utf-8">
        <title>CMS Tutorial</title>
        <link rel="stylesheet" href="../assets/style.css" />
      </head>
      <body>
        <div class="container">
          <a href="index.php" id="logo">CMS TEST Eddy</a>
        </br>

            <h4>Ajoutez un article</h4>

            <?php if (isset($error)) { ?>
                <small style="color:#aa0000;"><?php echo $error;?></small>
              </br></br>
            <?php } ?>

            <form action="add.php" method="post" autocomplete="off">
              <input type="text" name="title" placeholder="Titre"></br></br>
              <textarea rows="15" cols="50" placeholder="Régigez votre article..." name="content"></textarea></br></br>
              <input type="submit" value="Valider">
            </form>
        </div>
      </body>
    </html> <?php

} else { // Redirige sur l'index
    header('Location: index.php');
}


?>

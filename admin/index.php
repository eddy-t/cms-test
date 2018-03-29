<?php

session_start();

include_once('../includes/db.php');

if (isset($_SESSION['logged_in'])) { // Affiche l'index
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

          <ol>
            <li><a href="add.php">Ajouter un Article</a></li>
            <li><a href="delete.php">Supprimer un Article</a></li>
            <li><a href="logout.php">Deconnexion</a></li>
          </ol>
      </div>
    </body>
  </html>

    <?php
} else { // Affiche la page de login
    if (isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if (empty($username) or empty($password)) {
            $error = 'Veuillez remplir tout les champs.';
          } else {
              $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

              $query->bindValue(1, $username);
              $query->bindValue(2, $password);

              $query->execute();

              $num = $query->rowCount();

              if ($num === 1) {
                  // Login correct
                  $_SESSION['logged_in'] = true;
                  header('Location: index.php');
                  exit();
              } else {
                // Login incorrect
                $error = 'Mauvais login/mot de passe !';
              }
            }
          }
          ?>
    <html>
    	<head>
    		<title>CMS Tutorial</title>
    		<link rel="stylesheet" href="../assets/style.css" />
    	</head>
    	<body>
    		<div class="container">
          <a href="index.php" id="logo">CMS TEST Eddy</a>
        </br></br>
          <?php if (isset($error)) { ?>
              <small style="color:#aa0000;"><?php echo $error;?></small>
            </br></br>
          <?php } ?>

          <form action="index.php" method="post" autocomplete="off">
            <input type="text" name="username" placeholder="Nom d'utilisateur">
            <input type="password" name="password" placeholder="Mot de passe">
            <input type="submit" value="Connexion">
          </form>
    		</div>
    	</body>
    </html>
    <?php
  }
  ?>

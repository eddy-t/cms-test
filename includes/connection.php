

<html><head><meta charset="utf-8"></head></html>

<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=cms_test', 'root', 'arinfo');
} catch (PDOException $e) {
  exit('Erreur de base de données !!');
}

?>

<?php

try {
  $pdo = new PDO('mysql:host=localhost;dbname=cms_test', 'root', 'mysqltest');
} catch (PDOException $e) {
  exit('Database error.');
}




?>

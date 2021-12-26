<?php
$username = 'root';
$password = '';
$database = 'bios';

try {
  $conn = new PDO('mysql:host=localhost; dbname='.$database, $username, $password);
} catch (Exception $e) {
  die($e->getMessage());
}
?>

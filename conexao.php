<?php
try {
  $conn = new PDO('mysql:host=localhost;dbname=livro_de_ocorrencia', 'root', '');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>
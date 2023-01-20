<?php
const DB_HOST = 'localhost';
const DB_NAME = 'livro_ocorrencia';
const DB_USER = 'alerta';
const DB_PASS = 'Galerta#2021';
try {
  $conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
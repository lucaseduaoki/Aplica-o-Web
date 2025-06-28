<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("dao/FilmeDAO.php");
require_once("util/conexao.php");

if(!isset($_GET['id'])){
    echo "ID do livro não informado!";
    echo "<a href='index.php'>Voltar</a>";
    exit;
}

$id = $_GET['id'];

$filmeDao = new FilmeDAO;
$filmeDao -> excluirFilmes($id);

header("location:index.php");

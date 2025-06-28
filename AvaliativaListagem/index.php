<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("util/conexao.php");
require_once("dao/FilmeDAO.php");
require_once("modelo/Filme.php");

$con = Conexao::getConexao(
);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="estilo/style.css">

    <title>Cinema IFPR</title>

</head>
<body>
     <header class="bg-dark text-white py-3 shadow-sm">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                
                <!-- Logo e Nome -->
                
                <a href="index.php" class="nav-link text-white">
                    <div class="d-flex">
                        <img src="imagens/if.png" alt="Logo IFPR" class="logo-img me-0">
                        <h1 class="logoname">Cinema</h1>
                    </div>
                </a>

                <nav>
                    <ul class="nav">
                        
                        <li class="nav-item ms-3" id="searchBarContainer" style="display: none;">
                            <input type="text" id="searchInput" class="form-control" placeholder="Buscar filme...">
                        </li>

                        <li class="nav-item ms-3">
                            <button class="btn btn-outline-light p-1" id="searchToggle" title="Buscar"">
                                <i class="bi bi-search"></i>
                            </button>
                        </li>

                        <li class="nav-item">
                            <a href="tabelas.php" class="nav-link text-white">Listar por Tabela</a>
                        </li>
                        <li class="nav-item">
                            <a href="inserir.php" class="nav-link text-white">Inserir Filme</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">Login/Cadastro</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="langDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Idioma
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li> Português (BR)</li>
                                <li> English (EN)</li>
                                <li> Español (ES)</li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="principal-content my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4 text-center">LISTAGEM FILMES</h2>
            </div>
        </div>
        <div class="container-cards row">
            <?php
                $filmeDAO = new FilmeDAO;
                $listaFilmes = $filmeDAO->listarFilmes();

                if (count($listaFilmes) === 0) {
            ?>
                    <p class='mb-4 text-center'>Nenhum filme adicionado ainda...</p>
            <?php
                }

                else{
                    foreach($listaFilmes as $filme){
                        echo "<div class='col-md-4 mb-4'>";
                            echo "<div class='card'>";
                                echo "<img src='" . $filme->getImagem() . " ' alt='Imagem do filme'/>";
                                echo "<div class='card-body'>";
                                    echo "<h5 style='text-align: center !important'>" . $filme->getTitulo() . "</h5>";
                                    echo "<strong>Diretor:</strong> " . $filme->getDiretor() . "</br>";
                                    echo "<strong>Ano:</strong> " . $filme->getAno() . "</br>";
                                    echo "<strong>Gênero:</strong> " . $filme->getGenero() . "</br>";
                                    echo "<strong>Classificação:</strong> " . $filme->getClassificacao() . "</br>";
                                    echo "<strong>Duração:</strong> " . $filme->getDuracao() . "min</br>";
                                    echo "<strong>Descrição:</strong> " . $filme->getDescricao() . "</br>";
                                echo "</div>";
                                echo "<div class='options-card'>";
                                    echo "<a href='excluir.php?id=" . $filme->getId() . "'><button type='button' class='btn btn-danger' onclick='return confirmarExclusao()'>Excluir</button></a>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    }
                }
            ?>
        </div>
    </div>
    <script src="JavaScript/script.js"></script>
</body>
</html>

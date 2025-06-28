<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("util/conexao.php"); 
require_once("dao/FilmeDAO.php");
require_once("modelo/Filme.php");

$con = Conexao::getConexao();

$filmeDAO = new FilmeDAO();
$listaFilmes = $filmeDAO->listarFilmes(); 

$msgErro = $msgErro ?? ''; 

?>

<!DOCTYPE html>
<html lang="pt-br">
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
                
                <a href="index.php" class="nav-link text-white">
                    <div class="d-flex">
                        <img src="imagens/if.png" alt="Logo IFPR" class="logo-img me-0" style="height: 40px;">
                        <h1 class="logoname">Cinema</h1>
                    </div>
                </a>

                <nav>
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link text-white">Listagem Filmes</a>
                        </li>
                        <li class="nav-item">
                            <a href="inserir.php" class="nav-link text-white">Cadastrar Filme</a> </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">Login/Cadastro</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="langDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Idioma
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>Português (BR)</li>
                                <li>English (EN)</li>
                                <li>Español (ES)</li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="container mt-5">
        <h2 class="text-center mb-4">LISTAGEM POR TABELA</h1>

        <?php if (count($listaFilmes) === 0): ?>
            <p class="mb-4 text-center">Nenhum filme adicionado ainda...</p>
        <?php else: ?>
            <div class="tabela"> <table class="tabela tabela-bordered tabela-striped tabela-hover tabela-estilo">
                    <th>
                        <tr>
                            <th>ID</th>
                            <th>Imagem</th>
                            <th>Título</th>
                            <th>Gênero</th>
                            <th>Ano</th>
                            <th>Diretor</th>
                            <th>Duração</th>
                            <th>Classificação</th>
                            <th>Descrição</th>
                            <th>Ações</th>
                        </tr>
                    </th>
                    <tbody>
                        <?php foreach ($listaFilmes as $filme): ?>
                            <tr>
                                <td><?= $filme->getId()?></d>
                                <td>
                                    <img src="<?= $filme->getImagem()?>" class="imagem">
                                </td>
                                <td><?= $filme->getTitulo() ?></td>
                                <td><?= $filme->getGenero() ?></td>
                                <td><?= $filme->getAno() ?></td>
                                <td><?= $filme->getDiretor() ?></td>
                                <td><?= $filme->getDuracao() ?> min</td>
                                <td><?= $filme->getClassificacao() ?></td>
                                <td><?= $filme->getDescricao() ?></td>
                                <td class="button">
                                    <a href="excluir.php?id=<?= $filme->getId() ?>" class="btn btn-danger btn-sm" onclick="return confirmarExclusao()">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="JavaScript/script.js"></script> 
</body>
</html>

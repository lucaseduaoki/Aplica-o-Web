<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("util/conexao.php"); // Certifique-se que o caminho está correto
require_once("dao/FilmeDAO.php");
require_once("modelo/Filme.php");

$con = Conexao::getConexao();

$titulo = $_POST["titulo"] ?? '';
$genero = $_POST["genero"] ?? '';
$ano = $_POST["ano"] ?? '';
$diretor = $_POST["diretor"] ?? '';
$descricao = $_POST["descricao"] ?? '';
$duracao = $_POST["duracao"] ?? '';
$classificacao = $_POST["classificacao"] ?? '';
$imagem = $_POST["imagem"] ?? '';
$msgErro = "";

if(isset($_POST["titulo"])) {
    $erros_php = array();

    // --- Validações de Título ---
    if ($titulo === '') { 
        array_push($erros_php, 'O título é obrigatório!');
    } else if (strlen($titulo) < 3 || strlen($titulo) > 50) {
        array_push($erros_php, 'O título deve ter entre 3 e 50 caracteres.');
    } else {
        $sql = "SELECT id FROM filmes WHERE titulo = ?"; 
        $stm = $con->prepare($sql);
        $stm->execute([$titulo]);
        $result = $stm->fetchAll();

        if (count($result) > 0) {
            array_push($erros_php, "Já existe um filme com este título!");
        }
    }

    
    if ($genero === '') {
        array_push($erros_php, 'Selecione o gênero!');
    }

    
    if ($ano === '') { 
        array_push($erros_php, 'O ano é obrigatório!');
    } else if (!is_numeric($ano) || $ano < 1888 || $ano > (date("Y") + 5)) {
        array_push($erros_php, 'Informe um ano válido (entre 1888 e o ano atual + 5).');
    }

   
    if ($diretor === '') {
        array_push($erros_php, 'O nome do diretor é obrigatório!');
    } else if (strlen($diretor) < 3 || strlen($diretor) > 100) {
        array_push($erros_php, 'O nome do diretor deve ter entre 3 e 100 caracteres.');
    }

    
    if ($descricao === '') {
        array_push($erros_php, 'A descrição é obrigatória!');
    } else if (strlen($descricao) < 10 || strlen($descricao) > 500) {
        array_push($erros_php, 'A descrição deve ter entre 10 e 500 caracteres.');
    }

    
    if ($duracao === '') {
        array_push($erros_php, 'A duração é obrigatória!');
    } else if (!is_numeric($duracao) || $duracao <= 0 || $duracao > 600) { // Duração em minutos (ex: 0 a 600 min)
        array_push($erros_php, 'A duração deve ser um número inteiro positivo (máx. 600 min).');
    }

    
    if ($classificacao === '') {
        array_push($erros_php, 'Selecione a classificação indicativa!');
    }

    // --- Validações de Imagem (URL) ---
    if ($imagem === '') {
        array_push($erros_php, 'A URL da imagem é obrigatória!');
    } 

    if (count($erros_php) == 0) {
        $filme = new Filme($titulo, $genero, $ano, $diretor, $descricao, $duracao, $classificacao, $imagem);
        $filmeDAO = new FilmeDAO;
        $filmeDAO->inserirFilmes($filme);
        
        header("location:index.php");
        exit();
    } else {
        $msgErro = implode("<br>", $erros_php);
    }
}

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
                        <li class="nav-item">
                            <a href="tabelas.php" class="nav-link text-white">Listar por Tabela</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link text-white">Listagem Filmes</a>
                        </li>
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

    <form method="POST" class="container mt-5" enctype="multipart/form-data">

    <h2 class="mb-4 text-center">CADASTRAR FILME</h2>

    <div id="divErro" class="alert alert-danger" role="alert" style="display: <?= $msgErro === '' ? 'none' : 'block'; ?>">
        <?= $msgErro ?>
    </div>

    <div class="mb-4">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" name="titulo" id="titulo" value="<?= $titulo ?>">
        <div id="erroTitulo" class="text-danger"></div>
    </div>

    <div class="mb-4">
        <label for="genero" class="form-label">Gênero</label>
        <select class="form-select" name="genero" id="genero" >
            <option value="">--- Selecione ---</option>
            <option value="Ação" <?= ($genero == "Ação") ? "selected" : "" ?>>Ação</option>
            <option value="Aventura" <?= ($genero == "Aventura") ? "selected" : "" ?>>Aventura</option>
            <option value="Comédia" <?= ($genero == "Comédia") ? "selected" : "" ?>>Comédia</option>
            <option value="Drama" <?= ($genero == "Drama") ? "selected" : "" ?>>Drama</option>
            <option value="Fantasia" <?= ($genero == "Fantasia") ? "selected" : "" ?>>Fantasia</option>
            <option value="Ficção Científica" <?= ($genero == "Ficção Científica") ? "selected" : "" ?>>Ficção Científica</option>
            <option value="Romance" <?= ($genero == "Romance") ? "selected" : "" ?>>Romance</option>
            <option value="Suspense/Thriller" <?= ($genero == "Suspense/Thriller") ? "selected" : "" ?>>Suspense/Thriller</option>
            <option value="Terror" <?= ($genero == "Terror") ? "selected" : "" ?>>Terror</option>
        </select>
        <div id="erroGenero" class="text-danger"></div>
    </div>

    <div class="mb-4">
        <label for="ano" class="form-label">Ano</label>
        <input type="number" class="form-control" name="ano" id="ano" value="<?= $ano ?>">
        <div id="erroAno" class="text-danger"></div>
    </div>

    <div class="mb-4">
        <label for="diretor" class="form-label">Diretor</label>
        <input type="text" class="form-control" name="diretor" id="diretor" value="<?= $diretor ?>">
        <div id="erroDiretor" class="text-danger"></div>
    </div>

    <div class="mb-4">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" name="descricao" id="descricao" rows="3"><?= $descricao ?></textarea>
        <div id="erroDescricao" class="text-danger"></div>
    </div>

    <div class="mb-4">
        <label for="duracao" class="form-label">Duração (minutos)</label>
        <input type="number" class="form-control" name="duracao" id="duracao" value="<?= $duracao ?>">
        <div id="erroDuracao" class="text-danger"></div>
    </div>

    <div class="mb-4">
        <label for="classificacao" class="form-label">Classificação Indicativa</label>
        <select class="form-select" name="classificacao" id="classificacao">
            <option value="">--- Selecione ---</option>
            <option value="L" <?= ($classificacao == "L") ? "selected" : "" ?>>Livre</option>
            <option value="10" <?= ($classificacao == "10") ? "selected" : "" ?>>10 anos</option>
            <option value="12" <?= ($classificacao == "12") ? "selected" : "" ?>>12 anos</option>
            <option value="14" <?= ($classificacao == "14") ? "selected" : "" ?>>14 anos</option>
            <option value="16" <?= ($classificacao == "16") ? "selected" : "" ?>>16 anos</option>
            <option value="18" <?= ($classificacao == "18") ? "selected" : "" ?>>18 anos</option>
        </select>
        <div id="erroClassificacao" class="text-danger"></div>
    </div>

    <div class="mb-4">
        <label for="imagem" class="form-label">Imagem do Filme</label>
        <input type="text" class="form-control" name="imagem" id="imagem" accept="image/*"> 
        <div id="erroImagem" class="text-danger"></div>
    </div>

    <div class="d-grid mb-5">
        <button type="submit" class="btn btn-primary">Gravar Filme</button>
    </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="JavaScript/validacao.js"></script>
</body>
</html>

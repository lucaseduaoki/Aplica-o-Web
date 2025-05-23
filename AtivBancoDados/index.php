<?php
    require_once("util/Conexao.php");
    $con = Conexao::getConexao();
    //* print_r($con); => Teste de conexão com o BDD.

        // 1'1. Buscar os livros já salvos na base de dados.
        $sql = "SELECT * FROM livros";
        $stm = $con->prepare($sql);
        $stm->execute();

        $livros = $stm->fetchAll(); //PDO::FETCH_ASSOC => Array associativo.
        //* echo "<pre>" . print_r($livros, true) . "</pre>"; => Ver se os dados estão sendo levados corretamente.

        // 1'2. Verificar se o usuário já clicou no 'Gravar'.
    if(isset($_POST["titulo"])) {
        echo "<h4>Já clicou no 'Gravar'!</h4>";

        // 2. Obter os valores digitados pelo usuário.
        $titulo = $_POST["titulo"];
        $genero = $_POST["genero"];
        $qtd_pag = $_POST["paginas"];
        //* echo $titulo . " - " . $genero . " - " . $qtdPag; => Teste pra ver se os valores estão sendo obtidos.

        // 3. Inserir as informações na base de dados.
        $sql = "INSERT INTO livros (titulo, genero, qtd_paginas)
                VALUES (?, ?, ?)";
        $stm = $con->prepare($sql);
        $stm->execute(array($titulo, $genero, $qtd_pag));

        // 4. Redirecionar para a mesma página a fim de limpar o buffer do navergador.
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Livros</title>
    </head>
    <body>
        <h1>Listagem dos Livros</h1>
        <table border="1"> <!-- 'border' é um comando ultrapassadom, mas não está incorreto. -->
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Gênero</th>
                <th>Páginas</th>
            </tr>

            <?php foreach ($livros as $l): ?>
                <tr>
                    <td> <?php echo $l["id"] ?></td>
                    <td> <?php echo $l["titulo"] ?></td>
                    <td> <?php echo $l["genero"] ?></td>
                    <td> <?php echo $l["qtd_paginas"] ?></td>
                </tr>
            <?php endforeach ?>

            
        </table>

        <h1>Formulário</h1>
            <form action="" method="POST">
                <div style="margin-bottom: 10px;">
                    <label for="titulo">Título: </label>
                    <input type="text" name="titulo" id="paginas"/>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="paginas">Páginas: </label>
                    <input type="text" name="paginas" id="paginas"/>
                </div>

                <div style="margin-bottom: 10px;">
                    <label for="genero">Gênero: </label>
                    <select name="genero" id="genero">
                        <option value="">Selecione</option>
                        <option value="D">Drama</option>
                        <option value="F">Ficção</option>
                        <option value="R">Romance</option>
                        <option value="O">Outro</option>
                    </select>
                </div>

                <button style="margin-bottom: 10px;" type="submit">Gravar</button>
            </form>
    </body>
    </html>

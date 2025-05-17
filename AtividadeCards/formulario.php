<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Tênis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


<style>
     body {
        background-image: url('imagesSneakers.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
     
    h2{
        color: white;
    }

    label{
        color: white;
    }
</style>

</head>
<body class="bg-light">

    <div class="container mt-5">
        <form action="execucao.php" method="POST" class="card p-4 shadow-sm" style="background-color: black; border-radius: 15px">
            <h2 class="text-center mb-4">INFORMAÇÕES DO TÊNIS</h2>
            
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Tênis</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>

            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <textarea class="form-control" id="marca" name="marca" rows="1" required></textarea>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <textarea class="form-control" id="preco" name="preco" rows="1" required></textarea>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="imagem" class="form-label">URL da Imagem</label>
                <input type="url" class="form-control" id="image" name="image" required>
            </div>

            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Gerar Card</button>
        </form>
    </div>
</body>
</html>

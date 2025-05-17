<?php

require_once("modelo/Card.php");

$nome = $_POST['nome'];
$marca = $_POST['marca'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$image = $_POST['image'];

$tenis = new Card($nome, $marca, $preco, $descricao, $image);
$tenis->setNome($nome)
      ->setMarca($marca)
      ->setPreco($preco)
      ->setDescricao($descricao)
      ->setImage($image);

echo "<!DOCTYPE html>";
echo "<html lang='pt-br'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<title>Card do Tênis</title>";
echo "<style>
        body {
            background-image: url('imagesSneakers.png');
            font-family: Arial, sans-serif;
            background-image: ;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            border: 3px solid black;
            width: 400px;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 15px;
            text-align: left;
        }
        .card img {
            width: 100%;
            height: auto;
            border-radius: 6px;
            margin-top: 10px;
            border: 1px solid black;
        }
        .card strong {
            color: #555;
            margin-top: 30px;
        }
      </style>";
echo "</head>";
echo "<body>";

if ($nome != '' && $marca != '' && $preco != '' && $descricao != '' && $image != '') {
    echo "<div class='card'>";
        echo "<h1>  DADOS DO TÊNIS</h1>";
        echo "<strong>Nome:</strong> " . $tenis->getNome() . "<br>";
        echo "<strong>Marca:</strong> " . $tenis->getMarca() . "<br>";
        echo "<strong>Preço:</strong> R$ " . $tenis->getPreco() . "<br><br>";
        echo "<strong>Descrição:</strong> " . $tenis->getDescricao() . "<br><br>";
        echo "<img src='" . $tenis->getImage() . "' alt='Imagem do tênis'/>";
    echo "</div>";
} else {
    echo "<p style='color: red;'>Todos os campos são obrigatórios!</p>";
}

echo "</body>";
echo "</html>";

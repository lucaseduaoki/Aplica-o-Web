<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo da Adivinhação</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000;
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .acertou {
            font-size: 2em;
            color: green;
        }

        .erro {
            font-size: 2em;
            color: red;
        }

        .imagem-jogador {
            width: 100%;
            max-width: 300px;
            height: auto;
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            color: white;
            background-color: #333;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 1.2em;
        }

        a:hover {
            background-color: #f0c000;
        }
    </style>
</head>
<body>

<?php

    require_once("modelo/Palpite.php");


    $dadosPersonagens = [
        ["Pelé", "https://www.fflch.usp.br/sites/fflch.usp.br/files/inline-images/PEL%C3%89%20CAPA.jpg", "Rei do Futebol, tricampeão mundial pelo Brasil."],
        ["Maradona", "https://s2-gshow.glbimg.com/mc0YodfFisnnx0vxdJrL2LhDFNU=/0x0:1080x1080/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_e84042ef78cb4708aeebdf1c68c6cbd6/internal_photos/bs/2020/5/N/VjZzDMQseTspSWEdEGlA/maradona.jpg", "Famoso pela 'Mão de Deus' e por driblar meio time."],
        ["Zidane", "https://tmssl.akamaized.net/images/foto/galerie/zidane-zinedine-2002-2003-real-madrid-0017010026hjpg-1684150213-107080.jpg", "Meia francês careca, fez história no Real Madrid e na França."],
        ["Cristiano Ronaldo", "https://startse-uploader.s3.us-east-2.amazonaws.com/medium_Texto_do_seu_paragrafo_3_5d9584fd88.jpg", "Português que brilha com gols de cabeça e muita velocidade."],
        ["Messi", "https://www.cnnbrasil.com.br/wp-content/uploads/sites/12/2024/10/messi-argentina-e1729106596791.jpg?w=1024", "Pulga atômica argentina, dono de 8 Bolas de Ouro."],
        ["Ronaldinho", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGw7L8Up7cS_2wCVXN3aIuoyHVEcJ57anrEg&s", "Sorriso no rosto, drible desconcertante, e magia nos pés."],
        ["Ronaldo Fenômeno", "https://terceirotempo.uol.com.br/imagens/57/70/w500_h140_qfl_fto_15770.webp", "Atacante brasileiro que brilhou em 2002 com dois gols na final."],
        ["Paolo Maldini", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfjqobdo59BBqahiSISna0kxxNG36_tnC0fQ&s", "Lendário zagueiro e lateral italiano, símbolo eterno do Milan."],
        ["Kaká", "https://assets.goal.com/images/v3/blt16f9c20d6e97c294/22cf375a33d2b78acee811e057ff5ff3bb75da27.jpg?auto=webp&format=pjpg&width=3840&quality=60", "Meia elegante brasileiro, venceu a Bola de Ouro em 2007 e brilhou no Milan."],
        ["Neymar", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiLwZE23iQg75Wu3qNOKeWoWGE6TlIdvSusw&s", "Craque brasileiro moderno, ousado nos dribles e gols."]
    ];

    $palpites = [];
    foreach ($dadosPersonagens as $dado) {
        $palpites[] = new Palpite($dado[0], $dado[1], $dado[2]);
    }


    $correto = rand(0, 9);

    if (!isset($_GET['palpite'])) {
        echo "<h2>⚠ Você precisa informar um palpite (1 a 10) na URL.</h2>";
        exit;
    }

    $palpiteUsuario = intval($_GET['palpite']) - 1; 
    $acertou = $palpiteUsuario === $correto;
    
    if ($acertou) {
        echo '<div class="acertou">';
        echo '<h2>Parabéns! Você acertou!</h2>';
        echo '<h3>O jogador é: <strong>' . $palpites[$correto]->getNome() . '</strong></h3>';
        echo '<img class="imagem-jogador" src="' . $palpites[$correto]->getImage() . '" alt="Imagem do Jogador">';
        echo '</div>';
    } else {
        echo '<div class="erro">';
        echo '<h2>Você errou!</h2>';
        echo '<h3>Dica do correto: ' . $palpites[$correto]->getDica() . '</h3>';
        echo '</div>';
    }
    
    echo '<a href="index.php">Tentar Novamente</a>';

    ?>

</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<style>
    .dropdown {
        position: relative;
        display: inline-block;
        width: 300px;
    }

    .dropText {
        display: none;
        position: absolute;
        background-color: lightgray;
        min-width: 120px;
    }

    .dropText span {
        padding: 12px 25px;
        display: block;
    }

    .dropText span img {
        margin-right: 10px;
    }

    .dropText span:hover {
        background-color: lightcyan;
    }

    .dropdown:hover .dropText {
        display: block;
    }
</style>
</head>
<body>
    <?php

        require_once("model/Link.php");

        $botao1 = [
                    new Link("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTKM5YAkuuvruYVaJ09QeS5-ZDg-v9xkjZ9CQ&s", "São Paulo"),
                    new Link("https://upload.wikimedia.org/wikipedia/commons/2/22/Logo_Flamengo_crest_1980-2018.png", "Flamengo"),
                    new Link("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQY4qHyCLA1O9zLd8dXhMkF2DKqgsnsfis8rg&s", "Santos")
                ];

        $botao2 = [
                    new Link("https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Los_Angeles_Lakers_logo.svg/2560px-Los_Angeles_Lakers_logo.svg.png", "Los Angeles Lakers"),
                    new Link("https://upload.wikimedia.org/wikipedia/pt/f/f5/Boston_Celtics.png", "Boston Celtics"),
                    new Link("https://upload.wikimedia.org/wikipedia/pt/d/da/Golden_State_Warriors.png", "Golden State Warriors")
                ];

        $botao3 = [
                    new Link("https://uploads.tracklist.com.br/wp-content/uploads/2020/02/theweeknd.jpg", "The Weeknd"),
                    new Link("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUfqw2T87WInO-oMvNDBCAsUo60kWK-X6tzA&s", "Drake"),
                    new Link("https://cdn-images.dzcdn.net/images/artist/b90097972a60d9d8598a79a786be1a3a/1900x1900-000000-80-0-0.jpg", "Playboi Carti")
                ];

        $botao4 = [
                    new Link("https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Mercedes-Logo.svg/1200px-Mercedes-Logo.svg.png", "Merceds-Benz"),
                    new Link("https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/BMW.svg/2048px-BMW.svg.png", "BMW"),
                    new Link("https://upload.wikimedia.org/wikipedia/commons/thumb/7/7f/Audi_logo_detail.svg/2560px-Audi_logo_detail.svg.png", "Audi")
                ];

        function desenhaBotao($links, $nome){
            echo'<div class="dropdown">';
                echo'<button class="dropbtn"> '. $nome .'</button>';
                echo'<div class="dropText">';

                foreach($links as $l){   
                    echo'<span><img src=" '.$l->getLinkImg().' " width="20" height="20"> '. $l->getInfo() . '</span>';
                }

                echo'</div>';
            echo'</div>';
        }

        desenhaBotao($botao1, "Times de futebol");
        desenhaBotao($botao2, "Times de basquete");
        desenhaBotao($botao3, "Cantores");
        desenhaBotao($botao4, "Marcas de carro");
    ?>
</body>
</html>

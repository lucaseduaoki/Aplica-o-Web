<?php

require_once("modelo/Pessoa.php");

$tipo = $_GET['tipo'];
$nome = $_GET['nome'];
$idade = $_GET['idade'];
$sobrenome = $_GET['sobrenome'];

if(isset($tipo) and isset($nome) and isset($idade) and isset($sobrenome)){
    if($tipo == "C"){
        $pessoa = new Pessoa($nome, $sobrenome, $idade);
        echo $pessoa;
    }
    elseif($tipo == "A"){
        $pessoa = ["nome" => $nome,
                   "sobrenome" => $sobrenome,
                   "idade" => $idade];   
        foreach($pessoa as $p){
            echo $p;
        }   
    }

else{
    echo "Preencha todos os campos";
}

}

?>

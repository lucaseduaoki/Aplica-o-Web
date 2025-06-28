<?php

require_once("util/conexao.php");
require_once("modelo/Filme.php");

class FilmeDAO{

    private $con;

    public function __construct(){
        $this->con = Conexao::getConexao();
    }

    public function inserirFilmes(Filme $filme){
        $sql = "INSERT INTO Filmes (titulo, genero, ano, diretor, descricao, duracao, classificacao, imagem) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([
            $filme->getTitulo(),
            $filme->getGenero(),
            $filme->getAno(),
            $filme->getDiretor(),
            $filme->getDescricao(),
            $filme->getDuracao(),
            $filme->getClassificacao(),
            $filme->getImagem()
        ]);

    }

    public function listarFilmes(){
        $stmt = $this->con->query("SELECT * FROM Filmes");
        $cinema = [];
        
        while($dados = $stmt -> fetch()){
            $cinema[] = new Filme(
                $dados['titulo'], $dados['genero'], $dados['ano'],
                $dados['diretor'], $dados['descricao'], $dados['duracao'],
                $dados['classificacao'], $dados['imagem'], $dados['ID']
            );   
        }
        return $cinema;
    }

    public function excluirFilmes($id)  {
        $sql = "DELETE FROM Filmes WHERE id = ?";
        $con = Conexao::getConexao();
        $stm = $con->prepare($sql);
        $stm->execute([$id]);
    }
}

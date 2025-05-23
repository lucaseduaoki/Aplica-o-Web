<?php

class Conexao {
    // Static serve para chamar a partir da classe, sem necessidade de objeto. Usa-se "::" ao invés da setinha "->".
    private static $conn = null;

    public static function getConexao() {
        if(self::$conn == null) {
            $opcoes = array(
                //Define o charset da conexão
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                //Define o tipo do erro como exceção
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                //Define o tipo do retorno das consultas
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );
            
            self::$conn = new PDO("mysql:host=localhost;dbname=db_biblioteca", "root", "L5A2E31J8", $opcoes);
        }

        return self::$conn;
    }
}

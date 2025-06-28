<?php

class Filme{
    
	private $id;
    private $titulo;
    private $genero;
    private $ano;
    private $diretor;
    private $descricao; 
    private $duracao;
    private $classificacao;
    private $imagem;

    public function __construct($titulo, $genero, $ano, $diretor, $descricao, $duracao, $classificacao, $imagem, $id = null) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->ano = $ano;
        $this->diretor = $diretor;
        $this->descricao = $descricao;
        $this->duracao = $duracao;
        $this->classificacao = $classificacao;
        $this->imagem = $imagem;
    }
    
	/**
	 * Get the value of id
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 */
	public function setId($id): self
	{
		$this->id = $id;

		return $this;
	}

    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo($titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of genero
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     */
    public function setGenero($genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of ano
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set the value of ano
     */
    public function setAno($ano): self
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get the value of diretor
     */
    public function getDiretor()
    {
        return $this->diretor;
    }

    /**
     * Set the value of diretor
     */
    public function setDiretor($diretor): self
    {
        $this->diretor = $diretor;

        return $this;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     */
    public function setDescricao($descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of duracao
     */
    public function getDuracao()
    {
        return $this->duracao;
    }

    /**
     * Set the value of duracao
     */
    public function setDuracao($duracao): self
    {
        $this->duracao = $duracao;

        return $this;
    }

    /**
     * Get the value of classificacao
     */
    public function getClassificacao()
    {
        return $this->classificacao;
    }

    /**
     * Set the value of classificacao
     */
    public function setClassificacao($classificacao): self
    {
        $this->classificacao = $classificacao;

        return $this;
    }

    /**
     * Get the value of imagem
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Set the value of imagem
     */
    public function setImagem($imagem): self
    {
        $this->imagem = $imagem;

        return $this;
    }
}

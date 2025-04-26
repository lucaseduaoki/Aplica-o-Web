<?php

class Palpite{
    public $nome;
    public $image;
    public $dica;

    public function __construct($nome, $image, $dica){
        $this->nome = $nome;
        $this->image = $image;
        $this->dica = $dica;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     */
    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of dica
     */
    public function getDica()
    {
        return $this->dica;
    }

    /**
     * Set the value of dica
     */
    public function setDica($dica): self
    {
        $this->dica = $dica;

        return $this;
    }
}

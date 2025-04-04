<?php

class Link{

    private $linkImg;
    private $info;

    public function __construct($linkImg, $info) {
        $this->linkImg = $linkImg;
        $this->info = $info;
    }

    /**
     * Get the value of linkImg
     */
    public function getLinkImg()
    {
        return $this->linkImg;
    }

    /**
     * Set the value of linkImg
     */
    public function setLinkImg($linkImg): self
    {
        $this->linkImg = $linkImg;

        return $this;
    }

    /**
     * Get the value of info
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set the value of info
     */
    public function setInfo($info): self
    {
        $this->info = $info;

        return $this;
    }
}



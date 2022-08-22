<?php

namespace App\Models;

class PublicationClass
{
    private $id_publication;
    private $content_publication;
    private $img_publication;
    private $id_user;

    /**
     * Get the value of id_publication
     */ 
    public function getId_publication()
    {
        return $this->id_publication;
    }

    /**
     * Set the value of id_publication
     *
     * @return  self
     */ 
    public function setId_publication($id_publication)
    {
        $this->id_publication = $id_publication;

        return $this;
    }

    /**
     * Get the value of content_publication
     */ 
    public function getContent_publication()
    {
        return $this->content_publication;
    }

    /**
     * Set the value of content_publication
     *
     * @return  self
     */ 
    public function setContent_publication($content_publication)
    {
        $this->content_publication = $content_publication;

        return $this;
    }

    /**
     * Get the value of img_publication
     */ 
    public function getImg_publication()
    {
        return $this->img_publication;
    }

    /**
     * Set the value of img_publication
     *
     * @return  self
     */ 
    public function setImg_publication($img_publication)
    {
        $this->img_publication = $img_publication;

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }
}
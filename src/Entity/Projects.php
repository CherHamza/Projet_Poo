<?php
namespace hamza\poo\Entity;

use DateTime;

class Projects extends Model{
    private int $id;

    private string $title;

    private string $description;

    private DateTime $dateCreationProject;



    /**
     * Get the value of id
     */ 
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of dateCreationProject
     */ 
    public function getDateCreationProject(): ?DateTime
    {
        return $this->dateCreationProject;
    }

    /**
     * Set the value of dateCreationProject
     *
     * @return  self
     */ 
    public function setDateCreationProject($dateCreationProject): self
    {
        $this->dateCreationProject = $dateCreationProject;

        return $this;
    }  
}
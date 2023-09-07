<?php
namespace hamza\poo\Entity;

use DateTime;

class Users extends Model{
    private int $id;
    private string $name;
    private string $pwd;
    private string $email;
    private DateTime $dateCreation;


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
     * Get the value of name
     */ 
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of pwd
     */ 
    public function getPwd(): ?string
    {
        return $this->pwd;
    }

    /**
     * Set the value of pwd
     *
     * @return  self
     */ 
    public function setPwd($pwd): self
    {
        $this->pwd = $pwd;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of dateCreation
     */ 
    public function getDateCreation(): ?DateTime
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of dateCreation
     *
     * @return  self
     */ 
    public function setDateCreation($dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }
    
}

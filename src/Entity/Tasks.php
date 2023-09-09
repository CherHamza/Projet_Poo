<?php

namespace hamza\poo\Entity;

use DateTime;

class Tasks extends Model {
    private int $id;
    private string $title;
    private string $description;
    private int $id_user;
    private int $id_status;
    private int $id_priority;
    private int $id_project;

    private DateTime $dateCreationTask;


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
     * Get the value of title_tasks
     */ 
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the value of title_tasks
     *
     * @return  self
     */ 
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of tasks_description
     */ 
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set the value of tasks_description
     *
     * @return  self
     */ 
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user(): ?int
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of id_status
     */ 
    public function getId_status(): ?int
    {
        return $this->id_status;
    }

    /**
     * Set the value of id_status
     *
     * @return  self
     */ 
    public function setId_status($id_status): self
    {
        $this->id_status = $id_status;

        return $this;
    }

    /**
     * Get the value of id_priority
     */ 
    public function getId_priority(): ?int
    {
        return $this->id_priority;
    }

    /**
     * Set the value of id_priority
     *
     * @return  self
     */ 
    public function setId_priority($id_priority): self
    {
        $this->id_priority = $id_priority;

        return $this;
    }

    /**
     * Get the value of id_project
     */ 
    public function getId_project(): ?int
    {
        return $this->id_project;
    }

    /**
     * Set the value of id_project
     *
     * @return  self
     */ 
    public function setId_project($id_project): self
    {
        $this->id_project = $id_project;

        return $this;
    }

    /**
     * Get the value of dateCreationTask
     */ 
    public function getDateCreationTask(): ?DateTime
    {
        return $this->dateCreationTask;
    }

    /**
     * Set the value of dateCreationTask
     *
     * @return  self
     */ 
    public function setDateCreationTask($dateCreationTask): self
    {
        $this->dateCreationTask = $dateCreationTask;

        return $this;
    }
}
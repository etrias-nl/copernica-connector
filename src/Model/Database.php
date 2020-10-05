<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Model;

class Database
{
    protected ?string $id = null;
    protected ?string $name = null;
    protected ?CollectionsResponse $collections = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection[]|CollectionsResponse
     */
    public function getCollections(): CollectionsResponse
    {
        return $this->collections ?? new CollectionsResponse();
    }

    public function setCollections(?CollectionsResponse $collections): self
    {
        $this->collections = $collections;

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Model;

class Profile
{
    protected ?string $id = null;
    protected array $fields = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @return mixed
     */
    public function getField(string $key)
    {
        return $this->fields[$key] ?? null;
    }

    public function setFields(array $fields): self
    {
        $this->fields = $fields;

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Model;

class CreateProfileRequest
{
    protected ?string $databaseId = null;
    protected array $fields = [];
    protected array $interests = [];

    public function getDatabaseId(): ?string
    {
        return $this->databaseId;
    }

    public function setDatabaseId(?string $databaseId): self
    {
        $this->databaseId = $databaseId;

        return $this;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function setFields(array $fields): self
    {
        $this->fields = $fields;

        return $this;
    }

    public function getInterests(): array
    {
        return $this->interests;
    }

    public function setInterests(array $interests): self
    {
        $this->interests = $interests;

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Model;

class ProfilesRequest
{
    use CollectionRequestTrait;

    protected ?string $databaseId = null;
    protected array $fields = [];
    protected ?string $orderBy = null;
    protected ?bool $dataOnly = null;

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

    public function getOrderBy(): ?string
    {
        return $this->orderBy;
    }

    public function setOrderBy(?string $orderBy): self
    {
        $this->orderBy = $orderBy;

        return $this;
    }

    public function isDataOnly(): ?bool
    {
        return $this->dataOnly;
    }

    public function setDataOnly(?bool $dataOnly): self
    {
        $this->dataOnly = $dataOnly;

        return $this;
    }
}

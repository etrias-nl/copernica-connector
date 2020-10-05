<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Model;

class UpdateSubProfileFieldsRequest
{
    protected ?string $subProfileId = null;
    protected array $fields = [];

    public function getSubProfileId(): ?string
    {
        return $this->subProfileId;
    }

    public function setSubProfileId(?string $subProfileId): self
    {
        $this->subProfileId = $subProfileId;

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
}

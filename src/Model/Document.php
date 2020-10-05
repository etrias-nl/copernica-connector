<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Model;

class Document
{
    protected ?string $id = null;
    protected ?string $templateId = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTemplateId(): ?string
    {
        return $this->templateId;
    }

    public function setTemplateId(?string $templateId): self
    {
        $this->templateId = $templateId;

        return $this;
    }
}

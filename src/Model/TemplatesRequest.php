<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Model;

class TemplatesRequest
{
    use CollectionRequestTrait;

    protected ?bool $archived = null;
    protected ?\DateTimeInterface $modifiedFromDate = null;
    protected ?\DateTimeInterface $modifiedToDate = null;

    public function isArchived(): ?bool
    {
        return $this->archived;
    }

    public function setArchived(?bool $archived): self
    {
        $this->archived = $archived;

        return $this;
    }

    public function getModifiedFromDate(): ?\DateTimeInterface
    {
        return $this->modifiedFromDate;
    }

    public function setModifiedFromDate(?\DateTimeInterface $modifiedFromDate): self
    {
        $this->modifiedFromDate = $modifiedFromDate;

        return $this;
    }

    public function getModifiedToDate(): ?\DateTimeInterface
    {
        return $this->modifiedToDate;
    }

    public function setModifiedToDate(?\DateTimeInterface $modifiedToDate): self
    {
        $this->modifiedToDate = $modifiedToDate;

        return $this;
    }
}

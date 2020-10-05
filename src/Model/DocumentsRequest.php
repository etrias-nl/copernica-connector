<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Model;

class DocumentsRequest
{
    use CollectionRequestTrait;

    protected bool $source = false;

    public function isSource(): bool
    {
        return $this->source;
    }

    public function setSource(bool $source): self
    {
        $this->source = $source;

        return $this;
    }
}

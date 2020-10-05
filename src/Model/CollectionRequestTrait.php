<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Model;

trait CollectionRequestTrait
{
    protected int $start = 0;
    protected int $limit = 1000;
    protected bool $total = false;

    public function getStart(): int
    {
        return $this->start;
    }

    public function setStart(int $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function isTotal(): bool
    {
        return $this->total;
    }

    public function setTotal(bool $total): self
    {
        $this->total = $total;

        return $this;
    }
}

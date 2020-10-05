<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Model;

trait CollectionResponseTrait
{
    protected int $start = 0;
    protected int $limit = 0;
    protected int $count = 0;
    protected int $total = 0;
    protected array $data = [];

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

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function count(): int
    {
        return $this->count;
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->data);
    }
}

<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Model;

class DatabasesResponse implements \Countable, \IteratorAggregate
{
    use CollectionResponseTrait;
}

<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Model;

class CollectionsResponse implements \Countable, \IteratorAggregate
{
    use CollectionResponseTrait;
}

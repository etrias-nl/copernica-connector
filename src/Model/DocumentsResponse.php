<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Model;

class DocumentsResponse implements \Countable, \IteratorAggregate
{
    use CollectionResponseTrait;
}

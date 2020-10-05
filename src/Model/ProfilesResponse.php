<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Model;

class ProfilesResponse implements \Countable, \IteratorAggregate
{
    use CollectionResponseTrait;
}

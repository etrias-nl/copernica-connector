<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Api;

use Etrias\CopernicaConnector\Model\Database;
use Etrias\CopernicaConnector\Model\DatabasesRequest;
use Etrias\CopernicaConnector\Model\DatabasesResponse;
use GuzzleHttp\Psr7\Uri;

class DatabaseApi extends AbstractApi
{
    /**
     * @return Database[]
     */
    public function all(DatabasesRequest $request = null)
    {
        if (null === $request) {
            $request = new DatabasesRequest();
        }

        $uri = $this->createUri('/databases', [], [
            'total' => $request->isTotal(),
            'limit' => $request->getLimit(),
        ]);
        $start = $request->getStart();

        do {
            $uri = Uri::withQueryValue($uri, 'start', $start);
            /** @var DatabasesResponse $result */
            $result = $this->deserialize($this->getJson($uri), DatabasesResponse::class);
            $data = $result->getData();

            yield from $data;

            if (!$data || $result->getCount() < $result->getLimit()) {
                break;
            }

            $start += $request->getLimit();
        } while (true);
    }
}

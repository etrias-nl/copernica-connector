<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Api;

use Etrias\CopernicaConnector\Model\Document;
use Etrias\CopernicaConnector\Model\DocumentsRequest;
use Etrias\CopernicaConnector\Model\DocumentsResponse;
use GuzzleHttp\Psr7\Uri;

class DocumentApi extends AbstractApi
{
    /**
     * @return Document[]
     */
    public function all(?DocumentsRequest $request = null): iterable
    {
        if (null === $request) {
            $request = new DocumentsRequest();
        }

        $uri = $this->createUri('/publisher/documents', [], [
            'total' => $request->isTotal(),
            'limit' => $request->getLimit(),
            'source' => $request->isSource(),
        ]);
        $start = $request->getStart();

        do {
            $uri = Uri::withQueryValue($uri, 'start', $start);
            /** @var DocumentsResponse $result */
            $result = $this->deserialize($this->getJson($uri), DocumentsResponse::class);
            $data = $result->getData();

            yield from $data;

            if (!$data || $result->getCount() < $result->getLimit()) {
                break;
            }

            $start += $request->getLimit();
        } while (true);
    }
}

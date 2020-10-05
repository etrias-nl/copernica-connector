<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\Api;

use Etrias\CopernicaConnector\Model\Template;
use Etrias\CopernicaConnector\Model\TemplatesRequest;
use Etrias\CopernicaConnector\Model\TemplatesResponse;
use GuzzleHttp\Psr7\Uri;

class TemplateApi extends AbstractApi
{
    /**
     * @return Template[]
     */
    public function all(?TemplatesRequest $request = null)
    {
        if (null === $request) {
            $request = new TemplatesRequest();
        }

        $uri = $this->createUri('/publisher/templates', [], [
            'total' => $request->isTotal(),
            'limit' => $request->getLimit(),
            'archived' => $request->isArchived(),
            'modifiedfromdate' => $request->getModifiedFromDate(),
            'modifiedtodate' => $request->getModifiedToDate(),
        ]);
        $start = $request->getStart();

        do {
            $uri = Uri::withQueryValue($uri, 'start', $start);
            /** @var TemplatesResponse $result */
            $result = $this->deserialize($this->getJson($uri), TemplatesResponse::class);
            $data = $result->getData();

            yield from $data;

            if (!$data || $result->getCount() < $result->getLimit()) {
                break;
            }

            $start += $request->getLimit();
        } while (true);
    }
}

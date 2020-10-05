<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\HttpClient\Plugin;

use Etrias\CopernicaConnector\Exception\CopernicaException;
use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ErrorHandler implements Plugin
{
    /**
     * {@inheritdoc}
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        return $next($request)->then(function (ResponseInterface $response) {
            $status = $response->getStatusCode();

            if ($status >= 400) {
                $body = (string) $response->getBody();

                if (!preg_match('/\bjson\b/i', $response->getHeaderLine('Content-Type'))) {
                    throw new CopernicaException($body);
                }

                try {
                    $data = \GuzzleHttp\json_decode($body, true);
                } catch (\Throwable $e) {
                    $data = [];
                }

                throw new CopernicaException($data['error']['message'] ?? $body);
            }

            return $response;
        });
    }
}

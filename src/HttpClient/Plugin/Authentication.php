<?php

declare(strict_types=1);

namespace Etrias\CopernicaConnector\HttpClient\Plugin;

use GuzzleHttp\Psr7\Uri;
use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Psr\Http\Message\RequestInterface;

class Authentication implements Plugin
{
    protected const ACCESS_TOKEN_PARAM = 'access_token';

    protected string $accessToken;

    public function __construct(
        string $accessToken
    ) {
        $this->accessToken = $accessToken;
    }

    /**
     * {@inheritdoc}
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        $uri = Uri::withQueryValue($request->getUri(), self::ACCESS_TOKEN_PARAM, $this->accessToken);

        return $next($request->withUri($uri));
    }
}

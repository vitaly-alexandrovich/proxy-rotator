<?php
namespace ProxyRotator;

use HttpClient\Client as HttpClient;
use ProxyRotator\Responses\ProxyDetectionResponse;
use ProxyRotator\Responses\RotatingProxyResponse;

/**
 * Class Client
 * @package ProxyRotator
 */
class Client
{
    const ROTATING_PROXY_ENDPOINT = 'http://falcon.proxyrotator.com:51337/';
    const PROXY_LIST_ENDPOINT = 'http://falcon.proxyrotator.com:51337/proxy-list/';
    const PROXY_DETECTION_ENDPOINT = 'http://falcon.proxyrotator.com:51337/detector/';

    /**
     * @var string
     */
    private $apiKey;

    /**
     * Client constructor.
     * @param $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param array $parameters
     * @return RotatingProxyResponse
     */
    public function rotatingProxy($parameters = [])
    {
        $parameters['apiKey'] = $this->apiKey;

        $response = (new HttpClient())
            ->get(self::createUri(static::ROTATING_PROXY_ENDPOINT, $parameters))
            ->getBody();

        return RotatingProxyResponse::fromJson($response);
    }

    /**
     * @return array
     */
    public function proxyList()
    {
        $parameters = [
            'apiKey' => $this->apiKey
        ];

        $response = (new HttpClient())
            ->get(self::createUri(static::PROXY_LIST_ENDPOINT, $parameters))
            ->getBody();

        return array_map(
            function ($proxy) {
                return trim($proxy);
            },
            explode("\n", $response)
        );
    }

    /**
     * @param $ip
     * @return ProxyDetectionResponse
     */
    public function proxyDetection($ip)
    {
        $parameters = [
            'apiKey' => $this->apiKey,
            'ip' => $ip
        ];

        $response = (new HttpClient())
            ->get(self::createUri(static::PROXY_DETECTION_ENDPOINT, $parameters))
            ->getBody();

        return ProxyDetectionResponse::fromJson($response);
    }

    /**
     * @param $endpoint
     * @param $parameters
     * @return string
     */
    private static function createUri($endpoint, $parameters)
    {
        return $endpoint . '?' . http_build_query($parameters);
    }
}
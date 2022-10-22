<?php

namespace Omnipro\Base\Model;

use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\Serialize\SerializerInterface;
use Omnipro\Base\Api\ClientInterface;
use Omnipro\Base\Model\Config;
use Psr\Log\LoggerInterface;

/**
 * Client Implementation with Curl
 * 
 * @author Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro>
 */
class CurlRestClient implements ClientInterface
{

    private const HTTP_METHOD_POST = 'POST';
    private const HTTP_METHOD_GET = 'GET';

    /**
     * @var Curl
     */
    private $curl;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var Config
     */
    private $config;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Constructor
     *
     * @param Curl $curl
     * @param SerializerInterface $serializer
     * @param Config $config
     * @param LoggerInterface $logger
     */
    public function __construct(
        Curl $curl,
        SerializerInterface $serializer,
        Config $config,
        LoggerInterface $logger
    ) {
        $this->curl = $curl;
        $this->serializer = $serializer;
        $this->config = $config;
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function doGet($url, $headers): array
    {
        $this->curl->setOptions($this->getCurlOptions($headers, self::HTTP_METHOD_GET));
        $this->curl->get($url);

        $response = $this->serializer->unserialize($this->curl->getBody());
        $this->doDebug($url, [], $response, self::HTTP_METHOD_GET);

        return is_array($response) ? $response : [$response];
    }

    /**
     * @inheritDoc
     */
    public function doPost($url, $headers, $body): array
    {
        $this->curl->setOptions($this->getCurlOptions($headers));
        $this->curl->post($url, $body);

        $response = $this->serializer->unserialize($this->curl->getBody());
        $this->doDebug($url, $body, $response);

        return is_array($response) ? $response : [$response];
    }

    /**
     * Do Debug request
     *
     * @param string $url
     * @param string|array $request
     * @param string|int|float|bool|array|null $response
     * @param string $method
     * @return void
     */
    private function doDebug($url, $request, $response, $method = self::HTTP_METHOD_POST)
    {
        if ($this->config->isDebugRequestsEnable()) {
            $this->logger->debug('[Omnipro\Base\Model\RestClient::doDebug] - Curl Operation', [
                'url' => $url,
                'method' => $method,
                'request' => $request,
                'response' => $response
            ]);
        }
    }

    /**
     * Get curl options for request
     *
     * @param string[] $headers
     * @param string $method
     * @return array
     */
    private function getCurlOptions($headers, $method = self::HTTP_METHOD_POST): array
    {
        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $this->transformHeaders($headers)
        ];

        return $options;
    }

    /**
     * Transform the headers to curl options
     * Example Content-Type:application/json
     *
     * @param string[] $headers
     * @return string[]
     */
    private function transformHeaders($headers): array
    {
        $result = [];
        foreach ($headers as $key => $value) {
            $result[] = $key . ':' . $value;
        }
        return $result;
    }
}

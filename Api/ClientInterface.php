<?php

namespace Omnipro\Base\Api;

/**
 * Client Interface
 * 
 * @author Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro>
 */
interface ClientInterface
{
    /**
     * Do get request
     *
     * @param string $url
     * @param array $headers
     * @return array
     */
    public function doGet($url, $headers): array;

    /**
     * Do post request
     *
     * @param string $url
     * @param array $headers
     * @param array|string $body
     * @return array
     */
    public function doPost($url, $headers, $body): array;
}

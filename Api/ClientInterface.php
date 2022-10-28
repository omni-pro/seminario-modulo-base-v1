<?php

namespace Omnipro\Base\Api;

/**
 * Client Interface for HTTP Client
 *
 * @author Daniel Antonio Moreno Ramirez <daniel.moreno@omni.pro>
 * @author Leonardo <leonardo>
 */
interface ClientInterface
{
    /**
     * Do get request
     *
     * @param string $url
     * @param string[] $headers
     * @return string[]
     */
    public function doGet($url, $headers = null): array;

    /**
     * Do post request
     *
     * @param string $url
     * @param string[] $headers
     * @param string[]|string $body
     * @return string[]
     */
    public function doPost($url, $headers, $body): array;
}

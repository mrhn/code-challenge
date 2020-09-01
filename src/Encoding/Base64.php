<?php

namespace Mrhn\CodeChallenge\Encoding;

/**
 * Class Base64
 * @package Mrhn\CodeChallenge
 *
 * Based on the online post https://base64.guru/developers/php/examples/base64url
 */
class Base64
{
    public function urlEncode(string $data): ?string
    {
        $b64 = base64_encode($data);

        if ($b64 === false) {
            return null;
        }

        $url = strtr($b64, '+/', '-_');

        return rtrim($url, '=');
    }
}
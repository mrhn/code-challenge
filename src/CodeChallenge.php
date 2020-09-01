<?php

namespace Mrhn\CodeChallenge;

/**
 * Class CodeChallenge
 * @package Mrhn\CodeChallenge
 *
 * Based on the medium article https://medium.com/zenchef-tech-and-product/how-to-generate-a-pkce-challenge-with-php-fbee1fa29379
 */
class CodeChallenge
{
    private Verifier $verifier;

    private ?string $challenge;

    public function __construct(Verifier $verifier)
    {
        $this->verifier = $verifier;
    }

    public function generate(): self
    {
        $base64 = new Base64();
        $hash = hash('sha256', $this->verifier->getVerifier());

        $this->challenge = $base64->urlEncode(pack('H*', $hash));

        return $this;
    }

    public function getChallenge(): string
    {
        return $this->challenge;
    }
}
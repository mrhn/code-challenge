<?php

namespace Tests;

use Mrhn\CodeChallenge\Verifier;
use Mrhn\CodeChallenge\VerifierFactory;
use PHPUnit\Framework\TestCase;

class VerifierTest extends TestCase
{
    public function test_can_create_verifier_from_verifier_code(): void
    {
        $verifierCode = '--6t5HeyDNhPx8C9MYOEFWAgj9q9Ijhg7at-WtGGmrgIVB';
        $verifierLength = strlen($verifierCode);

        $verifier = new Verifier($verifierLength, $verifierCode);

        $this->assertEquals($verifierLength, $verifier->getLength());
        $this->assertEquals($verifierCode, $verifier->getVerifier());
    }

    public function test_can_create_verifier_from_verifier_code_override_length(): void
    {
        $verifierCode = '--6t5HeyDNhPx8C9MYOEFWAgj9q9Ijhg7at-WtGGmrgIVB';
        $verifierLength = strlen($verifierCode);

        $verifier = new Verifier(6942, $verifierCode);

        $this->assertEquals($verifierLength, $verifier->getLength());
        $this->assertEquals($verifierCode, $verifier->getVerifier());
    }

    public function test_can_generate_random_verifier(): void
    {
        $verifierLength = 64;
        $verifier = (new VerifierFactory())->create($verifierLength);

        srand(6942);
        $this->assertEquals($verifierLength, strlen($verifier->getVerifier()));
        $this->assertTrue((bool) preg_match('/[A-Za-z0-9-._~]{43,128}/', $verifier->getVerifier()));
    }
}
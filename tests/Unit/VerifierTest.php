<?php

namespace Tests\Unit;

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
        $this->assertEquals($verifierCode, $verifier->getValue());
    }

    public function test_can_create_verifier_from_verifier_code_override_length(): void
    {
        $verifierCode = '--6t5HeyDNhPx8C9MYOEFWAgj9q9Ijhg7at-WtGGmrgIVB';
        $verifierLength = strlen($verifierCode);

        $verifier = new Verifier(6942, $verifierCode);

        $this->assertEquals($verifierLength, $verifier->getLength());
        $this->assertEquals($verifierCode, $verifier->getValue());
    }
}
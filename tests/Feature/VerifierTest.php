<?php

namespace Tests\Feature;

use Mrhn\CodeChallenge\Verifier;
use Mrhn\CodeChallenge\VerifierFactory;
use PHPUnit\Framework\TestCase;

class VerifierTest extends TestCase
{
    public function test_can_generate_random_verifier(): void
    {
        $verifierLength = 64;
        $verifier = (new VerifierFactory())->create($verifierLength);

        srand(6942);
        $this->assertEquals($verifierLength, strlen($verifier->getValue()));
        $this->assertTrue((bool) preg_match('/[A-Za-z0-9-._~]{43,128}/', $verifier->getValue()));
    }
}
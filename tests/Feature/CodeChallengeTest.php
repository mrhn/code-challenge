<?php

namespace Tests;

use Mrhn\CodeChallenge\CodeChallenge;
use Mrhn\CodeChallenge\CodeChallengeFactory;
use Mrhn\CodeChallenge\Verifier;
use Mrhn\CodeChallenge\VerifierFactory;
use PHPUnit\Framework\TestCase;

class CodeChallengeTest extends TestCase
{
    public function test_can_generate_code_challenge_from_verifier(): void
    {
        $challenge = 'wAYGGEPHpGhaG1gZTmyJ8M1Ly7JlGuoUVWBBVJ4OxTU';

        $verifierCode = '--6t5HeyDNhPx8C9MYOEFWAgj9q9Ijhg7at-WtGGmrgIVB';

        $codeChallenge = (new CodeChallengeFactory())->createFromVerifier($verifierCode);

        $this->assertEquals($challenge, $codeChallenge->getValue());
    }

    public function test_can_generate_code_challenge(): void
    {
        $codeChallenge = (new CodeChallengeFactory())->create();

        $this->assertEquals(64, strlen($codeChallenge->getVerifier()->getValue()));
        $this->assertNotEquals($codeChallenge->getVerifier()->getValue(), $codeChallenge->getValue());
    }
}
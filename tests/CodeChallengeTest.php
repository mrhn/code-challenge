<?php

namespace Tests;

use Mrhn\CodeChallenge\CodeChallenge;
use Mrhn\CodeChallenge\Verifier;
use Mrhn\CodeChallenge\VerifierFactory;
use PHPUnit\Framework\TestCase;

class CodeChallengeTest extends TestCase
{
    public function test_can_generate_code_challenge(): void
    {
        $challenge = 'wAYGGEPHpGhaG1gZTmyJ8M1Ly7JlGuoUVWBBVJ4OxTU';

        $verifierCode = '--6t5HeyDNhPx8C9MYOEFWAgj9q9Ijhg7at-WtGGmrgIVB';
        $verifier = (new VerifierFactory())->createFromVerifier($verifierCode);

        $codeChallenge = (new CodeChallenge($verifier))->generate();

        $this->assertEquals($challenge, $codeChallenge->getChallenge());
    }
}
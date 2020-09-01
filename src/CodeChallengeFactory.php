<?php

namespace Mrhn\CodeChallenge;

/**
 * Class CodeChallenge
 * @package Mrhn\CodeChallengeFactory
 */
class CodeChallengeFactory
{
    public function create()
    {
        $verifier = (new VerifierFactory())->create();

        return (new CodeChallenge($verifier))->generate();
    }

    public function createFromVerifier(string $verifier)
    {
        $verifier = (new VerifierFactory())->createFromVerifier($verifier);

        return (new CodeChallenge($verifier))->generate();
    }
}
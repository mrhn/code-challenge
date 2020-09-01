<?php

namespace Mrhn\CodeChallenge;

class CodeChallenge
{
    private string $verifier;

    private string $challenge;

    public function __construct()
    {

    }

    public function getVerifier(): string
    {
        return $this->verifier;
    }

    public function getChallenge(): string
    {
        return $this->challenge;
    }

    public function calculateChallenge(): void
    {

    }
}
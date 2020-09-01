<?php

namespace Mrhn\CodeChallenge;

class Verifier
{
    private ?string $verifier;

    private int $length;

    private array $validChars = [];

    public function __construct(int $length, string $verifier = null)
    {
        $this->verifier = $verifier;
        $this->length = $verifier ? strlen($verifier) : $length;
    }

    public function generate()
    {
        $verifier = '';

        $validCharsLength = count($this->validChars);

        foreach (range(1, $this->length) as $index) {
            $verifier .= $this->validChars[rand(0, $validCharsLength - 1)];
        }

        $this->verifier = $verifier;
    }

    public function getVerifier(): ?string
    {
        return $this->verifier;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setValidChars(array $validChars): self
    {
        $this->validChars = $validChars;

        return $this;
    }
}
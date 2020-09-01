<?php

namespace Mrhn\CodeChallenge;

class VerifierFactory
{
    public const DEFAULT_VERIFIER_LENGTH = 64;

    private array $validChars;

    public const SPECIAL_CHARS = [
        '-',
        '.',
        '_',
        '~',
    ];

    public function create(int $length = self::DEFAULT_VERIFIER_LENGTH): Verifier
    {
        $verifier = new Verifier($length);

        $this->generate($verifier);

        return $verifier;
    }

    public function createFromVerifier(string $verifier): Verifier
    {
        $verifier = new Verifier(0, $verifier);

        return $verifier;
    }

    private function generate(Verifier $verifier): void
    {
        $verifier->setValidChars($this->getValidChars());

        $verifier->generate();
    }

    private function getValidChars(): array
    {
        if (! isset($this->validChars)) {
            $this->setValidChars();
        }

        return $this->validChars;
    }

    private function setValidChars(): void
    {
        $validChars = [];

        foreach (range('a', 'z') as $char) {
            $validChars[] = $char;
        }

        foreach (range('A', 'Z') as $char) {
            $validChars[] = $char;
        }

        foreach (range(0, 9) as $number) {
            $validChars[] = (string) $number;
        }

        foreach (self::SPECIAL_CHARS as $char) {
            $validChars[] = $char;
        }

        $this->validChars = $validChars;
    }
}
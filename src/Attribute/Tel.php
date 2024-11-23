<?php

declare(strict_types=1);

namespace Nnahito\Phattribute\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Tel
{
    public function __construct(
        private string $format = 'default',
        public string $message = 'Invalid tel number format'
    ) {}

    public function validate(string $value): bool
    {
        $pattern = match($this->format) {
            'default' => '/^(\+81|0)([0-9]{9,13}|[0-9]{1,4}-[0-9]{1,4}-[0-9]{4})$/',
            'hyphen' => '/^(\+81|0)[0-9]{1,4}-[0-9]{1,4}-[0-9]{4}$/',
            'no-hyphen' => '/^(\+81|0)[0-9]{9,13}$/',
            default => throw new \InvalidArgumentException("Unknown format: {$this->format}")
        };

        return preg_match($pattern, $value) === 1;
    }
}

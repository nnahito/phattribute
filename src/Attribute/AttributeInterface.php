<?php

declare(strict_types=1);

namespace Nnahito\Phattribute\Attribute;

interface AttributeInterface
{
    public function validate(string $value): bool;
}

<?php

declare(strict_types=1);

namespace Nnahito\Phattribute;

use Nnahito\Phattribute\attribute\Tel;
use ReflectionClass;

trait Phattribute
{
    public function __set($name, $value)
    {
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties();

        foreach ($properties as $property) {
            if ($property->getName() === $name) {
                $attributes = $property->getAttributes(Tel::class);
                if (!empty($attributes)) {
                    $attribute = $attributes[0]->newInstance();
                    if (!$attribute->validate($value)) {
                        throw new \InvalidArgumentException($attribute->message);
                    }
                }
            }
        }

        $this->$name = $value;
    }
}

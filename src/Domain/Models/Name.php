<?php
namespace Masamitsu\AutoUpdate\Domain\Models;

class Name
{
    protected $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }
}

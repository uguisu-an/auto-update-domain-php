<?php
namespace Masamitsu\AutoUpdate\Domain\Models;

class Url
{
    protected $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }
}

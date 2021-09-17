<?php
namespace Iimasamitsu\AutoUpdate\Domain\Models;

class Name
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

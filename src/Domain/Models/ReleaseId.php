<?php
namespace Masamitsu\AutoUpdate\Domain\Models;

use Stringable;

class ReleaseId implements Stringable
{
    protected $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }
}

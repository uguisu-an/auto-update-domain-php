<?php
namespace Masamitsu\AutoUpdate\Domain\Models;

use Stringable;

/**
 * パッケージの識別子
 */
class PackageId implements Stringable
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

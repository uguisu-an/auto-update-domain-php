<?php
namespace Masamitsu\AutoUpdate\Domain\Models;

use Stringable;

/**
 * パッケージ名
 */
class PackageId implements Stringable
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function equals(PackageId $other): bool
    {
        return $this->name === $other->name;
    }

    public function __toString()
    {
        return $this->name;
    }
}

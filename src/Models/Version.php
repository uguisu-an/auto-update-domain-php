<?php
namespace Iimasamitsu\AutoUpdate\Domain\Models;

/**
 * バージョン
 */
class Version
{
    protected $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function equals(Version $other): bool
    {
        return version_compare($this->value, $other->value, "=");
    }

    public function isNewerThan(Version $other): bool
    {
        return version_compare($this->value, $other->value, ">");
    }

    public function isOlderThan(Version $other): bool
    {
        return version_compare($this->value, $other->value, "<");
    }
}

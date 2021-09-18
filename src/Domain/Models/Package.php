<?php
namespace Masamitsu\AutoUpdate\Domain\Models;

/**
 * パッケージ
 */
class Package
{
    protected $name;

    public function __construct(PackageId $name)
    {
        $this->name = $name;
    }

    public function toArray()
    {
        return [
            'name' => (string) $this->name,
        ];
    }
}

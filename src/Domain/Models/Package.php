<?php
namespace Masamitsu\AutoUpdate\Domain\Models;

/**
 * パッケージ
 */
class Package
{
    protected $id;

    public function __construct(PackageId $id)
    {
        $this->id = $id;
    }
}

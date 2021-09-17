<?php
namespace Iimasamitsu\AutoUpdate\Domain\Models;

/**
 * パッケージ
 */
class Package
{
    protected $id;

    protected $name;

    protected $releases;

    public function __construct(
        PackageId $id,
        Name $name,
        Releases $releases = new Releases()
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->releases = $releases;
    }
}

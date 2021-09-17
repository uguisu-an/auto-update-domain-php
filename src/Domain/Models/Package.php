<?php
namespace Masamitsu\AutoUpdate\Domain\Models;

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

    public function latestRelease(): ?Release
    {
        return $this->releases->latest();
    }

    public function currentRelease(Version $version): ?Release
    {
        return $this->releases->get($version);
    }
}

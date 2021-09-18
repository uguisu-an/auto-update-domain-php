<?php
namespace Masamitsu\AutoUpdate\Domain\Models;

/**
 * パッケージ
 */
class Package
{
    protected $id;

    protected $releases;

    public function __construct(PackageId $id, Releases $releases = new Releases())
    {
        $this->id = $id;
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

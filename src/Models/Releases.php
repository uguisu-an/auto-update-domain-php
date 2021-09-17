<?php
namespace Iimasamitsu\AutoUpdate\Domain\Models;

class Releases
{
    protected $releases;

    public function __construct(Release ...$releases)
    {
        $this->releases = $releases;
    }

    public function add(Release $release): void
    {
        // 同じバージョンのリリースは追加できない
    }

    public function remove(ReleaseId $releaseId): void
    {
    }

    public function latestRelease(Version $currentVersion = null): ?Release
    {
    }

    public function releaseOf(Version $currentVersion): ?Release
    {
    }
}

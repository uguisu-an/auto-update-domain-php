<?php
namespace Masamitsu\AutoUpdate\Domain\Models;

class Releases
{
    protected $releases = [];

    public function __construct(Release ...$releases)
    {
        foreach ($releases as $release) {
            $this->add($release);
        }
    }

    public function add(Release $release): void
    {
        $this->releases[$release->version()] = $release;
    }

    public function remove(ReleaseId $releaseId): void
    {
    }

    public function latest(): ?Release
    {
        if (empty($this->releases)) {
            return null;
        }
        return $this->descending()[0];
    }

    private function descending()
    {
        $releases = array_values($this->releases);
        usort($releases, function (Release $a, Release $b) {
            return $b->isNewerThan($a->version());
        });
        return $releases;
    }

    public function get(Version $currentVersion): ?Release
    {
    }
}

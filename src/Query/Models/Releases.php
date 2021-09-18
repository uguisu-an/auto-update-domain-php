<?php
namespace Masamitsu\AutoUpdate\Query\Models;

class Releases
{
    protected $releases = [];

    public function __construct(Release ...$releases)
    {
        foreach ($releases as $release) {
            $this->releases[$release->version] = $release;
        }
    }

    public function get(string $version): ?Release
    {
        if (!array_key_exists($version, $this->releases)) {
            return null;
        }
        return $this->releases[$version];
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
            return version_compare($b->version, $a->version);
        });
        return $releases;
    }
}

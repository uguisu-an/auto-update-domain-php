<?php
namespace Masamitsu\AutoUpdate\Query\Models;

use DateTimeInterface;

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

    public function latestAt(DateTimeInterface $date): ?Release
    {
        $releases = array_values($this->availableAt($date));
        if (empty($releases)) {
            return null;
        }
        Release::sort($releases);
        return $releases[0];
    }

    private function availableAt(DateTimeInterface $date)
    {
        return array_filter($this->releases, function (Release $release) use ($date) {
            return $release->isAvailableAt($date);
        });
    }
}

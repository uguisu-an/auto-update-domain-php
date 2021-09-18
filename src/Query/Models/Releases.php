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

    /**
     * 指定したバージョンのリリースを取得する
     */
    public function get(string $version): ?Release
    {
        if (!array_key_exists($version, $this->releases)) {
            return null;
        }
        return $this->releases[$version];
    }

    /**
     * 最新のリリースを取得する
     */
    public function latestAt(DateTimeInterface $date): ?Release
    {
        $releases = array_values($this->availableAt($date));
        if (empty($releases)) {
            return null;
        }
        Release::sort($releases);
        return $releases[0];
    }

    /**
     * 配列に変換する
     *
     * @return \Masamitsu\AutoUpdate\Query\Models\Release[]
     */
    public function toArray()
    {
        return array_values($this->releases);
    }

    /**
     * 有効なリリースを取得する
     *
     * @return \Masamitsu\AutoUpdate\Query\Models\Release[]
     */
    public function availableAt(DateTimeInterface $date): array
    {
        return array_filter($this->toArray(), function (Release $release) use ($date) {
            return $release->isAvailableAt($date);
        });
    }

    /**
     * 指定したバージョンよりも古いリリースを取得する
     *
     * @return \Masamitsu\AutoUpdate\Query\Models\Release[]
     */
    public function olderThan(string $version): array
    {
        return array_filter($this->toArray(), function (Release $release) use ($version) {
            return $release->isOlderThan($version);
        });
    }
}

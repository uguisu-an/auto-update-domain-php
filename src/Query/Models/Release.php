<?php
namespace Masamitsu\AutoUpdate\Query\Models;

use DateTimeInterface;

class Release
{
    public $packageId;

    public $version;

    public $url;

    public $note;

    public $publishDate;

    public $expireDate;

    public function __construct(
        string $packageId,
        string $version,
        string $url,
        string $note,
        DateTimeInterface $publishDate,
        DateTimeInterface $expireDate
    ) {
        $this->packageId = $packageId;
        $this->version = $version;
        $this->url = $url;
        $this->note = $note;
        $this->publishDate = $publishDate;
        $this->expireDate = $expireDate;
    }

    public function isPublishedAt(DateTimeInterface $date): bool
    {
        return $date >= $this->publishDate;
    }

    public function isExpiredAt(DateTimeInterface $date): bool
    {
        return $date >= $this->expireDate;
    }

    public function isAvailableAt(DateTimeInterface $date): bool
    {
        return $this->isPublishedAt($date) && !$this->isExpiredAt($date);
    }

    public function isNewerThan(string $version)
    {
        return version_compare($this->version, $version, '>');
    }

    public function toArray()
    {
        return [
            'package_id' => $this->packageId,
            'version' => $this->version,
            'url' => $this->url,
            'note' => $this->note,
            'release_date' => $this->publishDate,
        ];
    }
}

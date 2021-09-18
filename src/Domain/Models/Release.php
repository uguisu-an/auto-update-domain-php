<?php
namespace Masamitsu\AutoUpdate\Domain\Models;

use DateTimeInterface;

/**
 * リリース
 */
class Release
{
    protected $version;

    protected $url;

    protected $note;

    protected $publishDate;

    protected $expireDate;

    public function __construct(
        Version $version,
        Url $url,
        string $note = null,
        DateTimeInterface $publishDate = null,
        DateTimeInterface $expireDate = null
    ) {
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

    public function publish(DateTimeInterface $date): void
    {
        $this->publishDate = $date;
    }

    public function expire(DateTimeInterface $date): void
    {
        $this->expireDate = $date;
    }

    public function version()
    {
    }

    public function isNewerThan(Version $version)
    {
        return $this->version->isNewerThan($version);
    }

    public function toArray()
    {
        return [
            'version' => $this->version,
            'url' => $this->url,
            'publish_date' => $this->publishDate,
            'expire_date' => $this->expireDate,
        ];
    }
}

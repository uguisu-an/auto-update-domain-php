<?php
namespace Iimasamitsu\AutoUpdate\Domain\Models;

use DateTimeInterface;

/**
 * リリース
 */
class Release
{
    protected $id;

    protected $version;

    protected $url;

    protected $publishDate;

    protected $expireDate;

    public function __construct(
        ReleaseId $id,
        Version $version,
        Url $url,
        DateTimeInterface $publishDate = null,
        DateTimeInterface $expireDate = null
    ) {
        $this->id = $id;
        $this->version = $version;
        $this->url = $url;
        $this->publishDate = $publishDate;
        $this->expireDate = $expireDate;
    }

    public function isPublished(): bool
    {
    }

    public function isExpired(): bool
    {
    }

    public function isAvailable(): bool
    {
    }

    public function publish(DateTimeInterface $date): void
    {
    }

    public function expire(DateTimeInterface $date): void
    {
    }
}

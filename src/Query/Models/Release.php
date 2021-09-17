<?php

class Release
{
    public $version;

    public $url;

    public $publishDate;

    public $expireDate;

    public $packageId;

    public function __construct(
        string $packageId,
        string $version,
        string $url,
        DateTimeInterface $publishDate,
        DateTimeInterface $expireDate
    ) {
        $this->version = $version;
        $this->url = $url;
        $this->publishDate = $publishDate;
        $this->expireDate = $expireDate;
        $this->packageId = $packageId;
    }
}

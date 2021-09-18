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
        PackageVersion $version,
        // TODO URL型にする
        string $url,
        string $note = null,
        DateTimeInterface $publishDate = null,
        DateTimeInterface $expireDate = null
    ) {
        $this->version = $version;
        $this->setUrl($url);
        $this->setNote($note);
        $this->publishDate = $publishDate;
        $this->expireDate = $expireDate;
    }

    public function id()
    {
        return $this->version;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    public function publish(DateTimeInterface $date): void
    {
        $this->publishDate = $date;
    }

    public function expire(DateTimeInterface $date): void
    {
        $this->expireDate = $date;
    }

    public function toArray()
    {
        return [
            'package_id' => (string) $this->version->packageId(),
            'version' => (string) $this->version->version(),
            'url' => $this->url,
            'note' => $this->note,
            'publish_date' => $this->publishDate,
            'expire_date' => $this->expireDate,
        ];
    }
}

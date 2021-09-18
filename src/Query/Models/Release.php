<?php
namespace Masamitsu\AutoUpdate\Query\Models;

class Release
{
    protected $version;

    protected $url;

    protected $note;

    protected $publishDate;

    protected $expireDate;

    public function __construct($version, $url, $note, $publishDate, $expireDate)
    {
        $this->version = $version;
        $this->url = $url;
        $this->note = $note;
        $this->publishDate = $publishDate;
        $this->expireDate = $expireDate;
    }
}

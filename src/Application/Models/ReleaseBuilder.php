<?php
namespace Masamitsu\AutoUpdate\Application\Models;

use Masamitsu\AutoUpdate\Domain\Models\Url;
use Masamitsu\AutoUpdate\Domain\Models\Version;
use Release;

class ReleaseBuilder
{
    public $version;

    public $url;

    public $note;

    public function __construct(string $version, string $url, string $note = null)
    {
        $this->url = $url;
        $this->note = $note;
        $this->version = $version;
    }

    public function create(): Release
    {
        return new Release(new Version($this->version), new Url($this->url), $this->note);
    }
}

<?php
namespace Masamitsu\AutoUpdate\Query\Models;

class Package
{
    public $name;

    public $releases;

    public function __construct(string $name, Releases $releases)
    {
        $this->name = $name;
        $this->releases = $releases;
    }

    public function latestVersion()
    {
        return $this->releases->latest();
    }

    public function currentVersion(string $version)
    {
        return $this->releases->get($version);
    }
}

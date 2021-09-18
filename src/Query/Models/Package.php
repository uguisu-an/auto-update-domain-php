<?php
namespace Masamitsu\AutoUpdate\Query\Models;

use DateTimeInterface;

class Package
{
    public $name;

    public $releases;

    public function __construct(string $name, Releases $releases)
    {
        $this->name = $name;
        $this->releases = $releases;
    }

    public function latestVersion(DateTimeInterface $date)
    {
        return $this->releases->latestAt($date);
    }

    public function currentVersion(string $version)
    {
        return $this->releases->get($version);
    }
}

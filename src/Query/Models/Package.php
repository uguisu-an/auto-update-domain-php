<?php

class Package
{
    public $id;

    public $name;

    public $releases;

    public function __construct($id, $name, $releases)
    {
        $this->id = $id;
        $this->name = $name;
        $this->releases = $releases;
    }

    public function getLatestRelease(): ?Release
    {
    }

    public function getRelease(string $version): ?Release;
}
